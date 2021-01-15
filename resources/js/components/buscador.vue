<template>
    <form>
        <!-- SEARCH FORM -->
        <div class="input-group">
            <div class="input-group-prepend">
                <svg
                    class="gi gi-search fs-sm"
                    width="1em"
                    height="1em"
                    viewbox="0 0 24 24"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"
                    ></path>
                </svg>
            </div>
            <input
                class="form-control form-control-lg"
                type="search"
                v-model="buscador"
                @keyup.prevent="buscarPorTagid"
                placeholder="Ingresa tu tag identificador"
                aria-label="Busca tu tag aquí"
            />
            <div v-if="buscador.length > 0">
                <div class="prevualizar">
                    <div class="card" v-for="mascotas in pets_buscador">
                        {{ mascotas.name }} - {{ mascotas.tag_id }}
                    </div>
                </div>
            </div>
            <a href="/pets/create/" aria-label="Añade una nueva Mascota">
                <button
                    class="btn btn-sm btn-circle create btn-dark"
                    type="button"
                    aria-label="Añade una nueva Mascota"
                    title="Añade una nueva Mascota"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <g data-name="plus">
                                <rect
                                    width="24"
                                    height="24"
                                    transform="rotate(180 12 12)"
                                    opacity="0"
                                />
                                <path
                                    d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z"
                                />
                            </g>
                        </g>
                    </svg>
                </button>
            </a>
        </div>
    </form>
    <!-- SEARCH FORM -->
</template>

<script>
export default {
    name: "buscador",
    data() {
        return {
            buscador: "",
            pets_buscador: [],
        };
    },
    methods: {
        buscarPorTagid: function () {
            let buscardor = this.buscador;
            axios
                .get("/buscar-tag-id/" + this.buscador)
                .then((resp) => {
                    console.log(resp.data);
                    this.pets_buscador = resp.data;
                })
                .catch((error) => {
                    console.log("mascota no encontrada ...");
                });
        },
    },
};
</script>

<style scoped></style>
