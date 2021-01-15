@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    avatar:'perfil1581463497.png',
                mascotas:{
                    id:0,
                    nombre_mascota:'',
                    password_confirm:''
                },
                pets:[],
                mensaje:false,
                texto_mensaje:'',
                alert:''
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