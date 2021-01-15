<template>
    <div :class="'alert alert-dismissible mb-5 text-white font-weight-semi-bold bg-'+alert+' fade show'" role="alert">
        {{texto_mensaje}}
        <button class="btn close" data-dismiss="alert" type="button" aria-label="Close">
            <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/>
            </svg>
        </button>
    </div>
</template>

<script>
    export default {
        name: "alert",
        props:['mensaje','texto_mensaje','alert']
    }
</script>
