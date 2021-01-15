<template>
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center mb-5"><!--  HEADING -->
        <h1 class="flex-grow-1 mb-5 mr-sm-5 mb-md-0 fs-lg">¿Me veia perdido?</h1>
        <button class="btn btn-lg btn-primary w-md-100"  @click="getUbicacion()">Comparte mi ubicación</button>
    </div><!--  / HEADING -->
</template>

<script>
    export default {
        name: "perdido",
        props:['id_mascota'],
        data() {
            return {
                error: '',
                vista:{
                    lat: '',
                    lon: '',
                    id: null
                },

            }
        },
        methods: {
            getUbicacion: function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(this.showPosition);
                    this.vista.id = this.id_mascota
                    axios.post('/guardar_visto',this.vista).then(res=>{
                        console.log(res.data);
                    }).catch(error=>{
                        console.log(error.response)
                    })
                } else {
                    this.error = "Geolocation is not supported.";

                }
            },
            showPosition: function (position) {
                this.vista.lat = position.coords.latitude;
                this.vista.lon = position.coords.longitude;
            }
        }
    }
</script>

<style scoped>

</style>
