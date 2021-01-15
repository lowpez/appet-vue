@extends('layouts.app')

@section('content')

@endsection
@push('script')
   <script>
           const app = new Vue({
              name: 'Notificaciones',
              el: '#app',
              props: {
                mensaje_success: {
                    type:  String,
                    default: ""
                },
                mensaje_error: {
                    type:  String,
                    default: ""
                },
                boton: {
                    type:  String,
                    default: ""
                }
            },
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
           });
    </script>
@endpush