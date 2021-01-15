<template>
    <div class="modal fade" id="newAvatar" tabindex="-1" role="dialog" aria-labelledby="newAvatarLabel" :aria-hidden="activar_modal"><!-- / MODAL -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fs-xs" id="newAvatarLabel"></h2>
                    <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                        <svg class="gi gi-close fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form>



                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-block btn-lg btn-primary" type="submit">Listo</button>
                </div>
            </div>
        </div>
    </div><!-- / MODAL -->
</template>

<script>
    export default {
        name: "ModelComponent",
        data(){
            return {
                 activar_modal:false
            }
        }
    }
</script>

<style scoped>

</style>
