<template>
    <div class="modal fade" id="hello" tabindex="-1" role="dialog" aria-labelledby="newTopicLabel" aria-hidden="true"><!-- MODAL -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fs-xs" id="newTopicLabel">Formulario de Adopción</h2>
                    <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                        <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/>
                        </svg>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <alert v-show="mensaje" :mensaje="mensaje" :texto_mensaje="texto_mensaje" :alert="alert"></alert>
                        <label for="title">E-mail / RUT</label>
                        <input class="form-control form-control-lg mb-5" v-model="rut_email" id="title" type="text" placeholder="Title">
                        <label for="title">Description</label>
                        <p>Enviaras una solicitud que significa un permiso definitivo que cede la tutoria de tu mascota a la persona contactada</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-block btn-lg btn-primary" @click.prevent="enviar_traspaso_mascota()">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- / MODAL -->

</template>

<script>
    import alert from "./alert";
    export default {
        name: "traspaso",
        components:{
            alert
        },
        props:['id'],
        data(){
            return {
                rut_email: '',
                mensaje:false,
                texto_mensaje:'',
                alert:'',
            }
        },
        methods:{
            enviar_traspaso_mascota:function () {
                    axios.post('/traspaso_post',{id:this.id,rut_email: this.rut_email}).then(res => {
                        this.alert= 'success'
                        this.mensaje = true
                        this.texto_mensaje = 'Solicitud de Traspaso de Mascota Enviado!'
                        this.rut_email = ''
                        //$("#hello").modal("hide")
                        console.log('success')
                    }).catch(error => {
                        console.log(error.response)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
