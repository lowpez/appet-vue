<template>
    <form id="reply"><!--  COMENTARIOS Y MAS -->
        <ul class="list-unstyled d-flex flex-wrap p-5 rounded-top" style="background-color: hsl(0, 0%, 40%);">
            <li class="mr-5">
                <button class="btn link-body" type="button">
                    <i class="gi-animation-hover">
                        <svg class="gi gi-link-2 gi-animation gi-animation-hover-pulse fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.29 9.29l-4 4a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4-4a1 1 0 0 0-1.42-1.42z"/>
                            <path d="M12.28 17.4L11 18.67a4.2 4.2 0 0 1-5.58.4 4 4 0 0 1-.27-5.93l1.42-1.43a1 1 0 0 0 0-1.42 1 1 0 0 0-1.42 0l-1.27 1.28a6.15 6.15 0 0 0-.67 8.07 6.06 6.06 0 0 0 9.07.6l1.42-1.42a1 1 0 0 0-1.42-1.42z"/>
                            <path d="M19.66 3.22a6.18 6.18 0 0 0-8.13.68L10.45 5a1.09 1.09 0 0 0-.17 1.61 1 1 0 0 0 1.42 0L13 5.3a4.17 4.17 0 0 1 5.57-.4 4 4 0 0 1 .27 5.95l-1.42 1.43a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l1.42-1.42a6.06 6.06 0 0 0-.6-9.06z"/>
                        </svg>
                    </i>
                </button>
            </li>
            <li class="mr-5">
                <button class="btn link-body" type="button">
                    <i class="gi-animation-hover">
                        <svg class="gi gi-image-fill gi-animation gi-animation-hover-pulse fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 3H6a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3zM6 5h12a1 1 0 0 1 1 1v8.36l-3.2-2.73a2.77 2.77 0 0 0-3.52 0L5 17.7V6a1 1 0 0 1 1-1z"/>
                            <circle cx="8" cy="8.5" r="1.5"/>
                        </svg>
                    </i>
                </button>
            </li>
        </ul>
        <textarea class="form-control p-5 rounded-0" v-model="comment" rows="2" placeholder="Reply to this topic..." style="resize: none;" aria-label="biography"></textarea>
        <div class="p-5 pt-0 text-right rounded-bottom" style="background-color: var(--fill-bg);">
            <button class="btn btn-lg btn-primary w-sm-100" @click.prevent="enviar_comentario()">Enviar</button>
        </div>
    </form><!--  / COMENTARIOS Y MAS -->
</template>

<script>
    export default {
        name: "commets",
        props:['id_mascota'],
        data(){
            return{
              comment:'',
            }
        },
        methods:{
            enviar_comentario:function(){
                axios.post('/viewComment',{comment:this.comment,id:this.id_mascota}).then(res=>{
                    console.log(res.data)
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>
