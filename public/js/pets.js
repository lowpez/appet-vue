const app = new Vue({
    name: 'pets',
    el: '#app',
    data: () => ({
        mascota:{
            tag_id:'',
            name:'',
            description:'',
            sexo:'',
            fecha_nac:null,
            condicion_medica:'',
            rnm:'',
            pet_type_ptrac:'',
            pet_type:'',
            breeds:'',
            country:'',
            state:'',
            city:'',
            avatar:'',
            full:'',
            is_active:0,
            is_lost:false,
            is_dangerous:false
        },
        buscador: "",
        pets_buscador: [],
        isLoading:false,
        regiones:[],
        cities:[],
        especies:[],
        razas:[],
        imagen:'/media/uploads/pets/no.jpg',
        croppie:null,
        mensaje:false,
        texto_mensaje:'',
        alert:'',
        errors:[]
    }),
    computed:{
        cargaImagen:function()
        {
            return this.imagen;
        }
    },
    created() {
        this.cargarEspecie()
        this.updateSelect()
    },
    updated () {
        this.updateSelect()
    },
    mounted() {
        this.$on('imgUploaded', function (imageData) {
            this.image = imageData
            this.croppie.destroy()
            this.setUpCroppie(imageData)
        })
        //this.image = this.imgUrl
        this.setUpCroppie()
    },
    methods:{
        updateSelect:function()
        {
            $(this.$refs.especie).selectpicker('refresh');
            $(this.$refs.breeds).selectpicker('refresh');
        },

        cargarState:function(){
            axios.get('/state').then(res=>{
                this.regiones = res.data
            })
        },
        cargarCities:function(){
            let id = this.usuario.state
            axios.get('/cities/'+id).then(res=>{
                this.cities = res.data
            })
        },

        cargarEspecie:function(){
            axios.get('/especies').then(res=>{
                this.especies = res.data
            })
        },

        cargarRaza:function(){
            let id = this.mascota.pet_type
            axios.get('/raza/'+id).then(res=>{
                this.razas = res.data
            })
        },
        crearPet:function () {
            axios.post('/pets',this.mascota).then(res => {
                this.alert= 'success'
                this.mensaje = true
                this.texto_mensaje = 'Mascota Agregada Exitosamente'
                $("#confirm-add-pet").modal("show")
                this.resetPet()
            }).catch(error=>{
                this.alert= 'danger'
                this.mensaje = true
                this.texto_mensaje = 'Error al Guardar'
                console.log(error.response.data.errors)
                this.errors.push(error.response.data.errors);
                console.log(this.errors.length)
            })
        },
        resetPet:function () {
            this.mascota.tag_id=''
            this.mascota.name=''
            this.mascota.description=''
            this.mascota.condicion_medica=''
            this.mascota.rnm=''
            this.mascota.pet_type=''
            this.mascota.breeds=''
            this.mascota.country=''
            this.mascota.state=''
            this.mascota.city=''
            this.mascota.avatar=''
            this.mascota.full=''
            this.mascota.is_active=0
            this.mascota.is_lost=false
            this.mascota.is_dangerous=false
        },
        chooseFiles() {
            this.imagen = document.getElementById("fileUpload").click()
            //this.setUpFileUploader( this.imagen)

        },
        uploadFile () {
            /* this.canUpload = false
             this.button = {
                 name: 'Uploading...',
                 class: 'fa-refresh fa-spin'
             }*/
            this.isLoading = true
            this.mascota.full = this.imagen
            this.croppie.result({
                type: 'canvas',
                size: 'viewport'
            }).then((response) => {
                this.imagen = response
                console.log(this.image)
                this.mascota.avatar= this.imagen
                this.isLoading = false
                console.log('hola me estoy aqui')
                $("#newAvatar").modal("hide")
                /* axios.put('/user/perfil/imagen', {img: this.image,id:this.usuario.id})
                     .then((response) => {
                         console.log(response.data)
                     })*/
            })
        },
        setUpCroppie () {
            let el = document.getElementById('croppie')
            this.croppie = new Croppie(el, {
                viewport: { width: 320, height: 320, type: 'circle' },
                boundary: { width: 320, height: 320 },
                original:{width:1200,height: null},
                showZoomer: true,
                enableOrientation: true
            })
            this.croppie.bind({
                url: this.imagen
            })
        },
        setUpFileUploader (e) {
            let files = e.target.files[0]

            //this.imagen =  files
            //console.log(this.imagen)
            this.createImage(files)
        },
        createImage (file) {
            let image = new Image()
            let reader = new FileReader()
            let vm = this

            reader.onload = (e) => {
                vm.imagen = e.target.result
                vm.$emit('imgUploaded', e.target.result)
            }
            reader.readAsDataURL(file)
            this.modalVisible = true
        },

        modalConfirm(){
            $("#confirm-add-pet").modal("hide")
        }

    }
});
