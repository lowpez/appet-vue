@extends('front.layout.app')
@push('styles')
    <style>
        .sidebar{
            /*background: linear-gradient(90deg, #F5F5F5 50%, #FBB794 50%);*/
            background-image: url('{{secure_asset('css/bg.jpg')}}') !important;
            background-size: cover;
        }
        .card-group {
            background-color: var(--white) /*var(--fill-bg)*/;
            border-radius: var(--border-radius-lg);
        }

        .card-group .card {
            border-radius: 0;
        }

        .card-group-stripped .card:nth-child(even) {
            background-color: var(--dark-400);
        }

        .card-group [aria-expanded="false"] .gi-arrow-ios-downward,
        .card-group [aria-expanded="true"] .gi-arrow-ios-forward {
            display: none;
        }
        h1{/*background-color: #00E1FF; display:table !important;*/ color: #FFF;}
        @media (min-width: 1020px) {
            .container {
                padding: 1em !important;
            }
        }
        @media (max-width: 576px) {
            .container .tag, .p-sm-0{
                padding: 0em !important;
            }
        }
        /*.bg-m, .bg-m h2{ background: #5821A2; color: #FFF !important; }
        .btn-primary{ background: #1FD5AC; }*/
    </style>
@endpush

@section('content')

    @include('pet.model')
    <main>
        <div class="py-11">
            <div class="container tag">
               {{-- <perdido-component :id_mascota="{{$pets->id}}"></perdido-component>--}}
                <geo-component  :id_mascota="{{$pets->id}}" :mensaje_success="'Gracias por Compartir'" :mensaje_error="'error al compartir'" :boton="'ok'"></geo-component>
                <div class="card-group p-sm-0">
                    <div class="p-5 bg-m">
                        <h2 class="lead">Soy {{$pets->name}}</h2>
                    </div>
                    <div class="card rounded-bottom">
                        <div class="  d-flex flex-column justify-content-between bg-neutral" style="height: 504px; background-image: url({{asset('media/uploads/pets/'.$pets->full)}}); background-position: center; background-size: cover;"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3"><!--  AVATAR Y OTROS -->
                                    <div class="d-flex d-lg-block mb-5 mb-lg-0 text-lg-center" >
                                      <span class="avatar avatar-xxxl mr-3 mr-lg-0 mb-lg-3">
                                        <img src="{{asset('media/uploads/users/'.$pets->user->avatar)}}" class="rounded-circle avatar-xxxl" alt="Añade una imagen de tu mascota">
                                     </span>
                                        <div class="mb-lg-3">
                                            <h3 class="fs-xxs lh-lg">
                                                <a href="#">{{$pets->user->name}}</a>
                                            </h3>
                                            @switch($pets->user->pet_type_ptrac)
                                                @case(1)
                                                <p>Dueño de Mascota</p>
                                                @break
                                                @case(2)
                                                <p>Tienda de Mascota</p>
                                                @break
                                                @case(3)
                                                <p>Tienda de Mascota</p>
                                                @break
                                                @case(4)
                                                <p>Tienda de Mascota</p>
                                                @break
                                            @endswitch
                                        </div>
                                        <ul class="list-unstyled d-none d-lg-inline-flex">
                                            <li class="mr-1">
                                                <svg class="gi gi-star-fill fs-xs text-warning" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.56 21a1 1 0 0 1-.46-.11L12 18.22l-5.1 2.67a1 1 0 0 1-1.45-1.06l1-5.63-4.12-4a1 1 0 0 1-.25-1 1 1 0 0 1 .81-.68l5.7-.83 2.51-5.13a1 1 0 0 1 1.8 0l2.54 5.12 5.7.83a1 1 0 0 1 .81.68 1 1 0 0 1-.25 1l-4.12 4 1 5.63a1 1 0 0 1-.4 1 1 1 0 0 1-.62.18z"/>
                                                </svg>
                                            </li>
                                            <li class="mr-1">
                                                <svg class="gi gi-star-fill fs-xs text-warning" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.56 21a1 1 0 0 1-.46-.11L12 18.22l-5.1 2.67a1 1 0 0 1-1.45-1.06l1-5.63-4.12-4a1 1 0 0 1-.25-1 1 1 0 0 1 .81-.68l5.7-.83 2.51-5.13a1 1 0 0 1 1.8 0l2.54 5.12 5.7.83a1 1 0 0 1 .81.68 1 1 0 0 1-.25 1l-4.12 4 1 5.63a1 1 0 0 1-.4 1 1 1 0 0 1-.62.18z"/>
                                                </svg>
                                            </li>
                                            <li class="mr-1">
                                                <svg class="gi gi-star-fill fs-xs text-warning" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.56 21a1 1 0 0 1-.46-.11L12 18.22l-5.1 2.67a1 1 0 0 1-1.45-1.06l1-5.63-4.12-4a1 1 0 0 1-.25-1 1 1 0 0 1 .81-.68l5.7-.83 2.51-5.13a1 1 0 0 1 1.8 0l2.54 5.12 5.7.83a1 1 0 0 1 .81.68 1 1 0 0 1-.25 1l-4.12 4 1 5.63a1 1 0 0 1-.4 1 1 1 0 0 1-.62.18z"/>
                                                </svg>
                                            </li>
                                            <li class="mr-1">
                                                <svg class="gi gi-star-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.56 21a1 1 0 0 1-.46-.11L12 18.22l-5.1 2.67a1 1 0 0 1-1.45-1.06l1-5.63-4.12-4a1 1 0 0 1-.25-1 1 1 0 0 1 .81-.68l5.7-.83 2.51-5.13a1 1 0 0 1 1.8 0l2.54 5.12 5.7.83a1 1 0 0 1 .81.68 1 1 0 0 1-.25 1l-4.12 4 1 5.63a1 1 0 0 1-.4 1 1 1 0 0 1-.62.18z"/>
                                                </svg>
                                            </li>
                                            <li>
                                                <svg class="gi gi-star-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.56 21a1 1 0 0 1-.46-.11L12 18.22l-5.1 2.67a1 1 0 0 1-1.45-1.06l1-5.63-4.12-4a1 1 0 0 1-.25-1 1 1 0 0 1 .81-.68l5.7-.83 2.51-5.13a1 1 0 0 1 1.8 0l2.54 5.12 5.7.83a1 1 0 0 1 .81.68 1 1 0 0 1-.25 1l-4.12 4 1 5.63a1 1 0 0 1-.4 1 1 1 0 0 1-.62.18z"/>
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--  / AVATAR Y OTROS -->
                                <div class="col-lg-9"><!--  PET INFO -->
                                    <div class="d-flex align-items-center mb-5">
                                        <svg class="gi gi-clock-fill mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm4 11h-4a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0v3h3a1 1 0 0 1 0 2z"/>
                                        </svg>
                                        <p class="mr-auto">{{$pets->created_at->format('d M, Y')}}</p>
                                        <button class="btn link-body" data-toggle="modal" data-target="#share" type="button">
                                            <svg class="gi gi-share-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18 15a3 3 0 0 0-2.1.86L8 12.34V12v-.33l7.9-3.53A3 3 0 1 0 15 6v.34L7.1 9.86a3 3 0 1 0 0 4.28l7.9 3.53V18a3 3 0 1 0 3-3z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="mb-2">¡Hola a todos! Mi nombre es {{$pets->name}}. Soy un {{ \App\Pet_type::getEspecie($pets->pet_type) }} {{ \App\Breed::getBreed($pets->breeds)}} y tengo {edad} años. Soy {{$pets->sexo == 'm' ?'el' : 'la'}} regalon{{$pets->sexo == 'm' ?' ' : 'a'}}  de la casa.</p>
                                    <p class="mb-5">Mis papis dicen que {{$pets->description}}. Sobre mi salud soy un poquito polilla{{$pets->condicion_medica}}</p>
                                    <div class="d-flex align-items-center"><!-- ICONOS -->
                                        <a href="https://wa.me/{{$pets->user->phone}}?text=Hola!%20Vi%20a%20tu%20mascota%20<3" aria-label="Llama a mi humano" class="d-flex mr-auto ">
                                            <svg class="gi gi-phone-fill fs-xxl" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g data-name="Layer 2"><g data-name="phone-call"><rect width="24" height="24" opacity="0"/><path d="M13 8a3 3 0 0 1 3 3 1 1 0 0 0 2 0 5 5 0 0 0-5-5 1 1 0 0 0 0 2z"/><path d="M13 4a7 7 0 0 1 7 7 1 1 0 0 0 2 0 9 9 0 0 0-9-9 1 1 0 0 0 0 2z"/><path d="M21.75 15.91a1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a9.91 9.91 0 0 1-4.87-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76 4.34 4.34 0 0 0-.19-.73zM17.4 20A13.41 13.41 0 0 1 4 6.6 2.61 2.61 0 0 1 6.6 4h.33L8 8.64l-.54.28c-.86.45-1.54.81-1.18 1.59a11.85 11.85 0 0 0 7.18 7.21c.84.34 1.17-.29 1.62-1.16l.29-.55L20 17.07v.33a2.61 2.61 0 0 1-2.6 2.6z"/></g></g>
                                            </svg>
                                        </a>
                                        <a href="" aria-label="Historial de vistas">
                                            <svg class="gi gi-github-fill fs-xxl" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g data-name="Layer 2"><g data-name="pin"><rect width="24" height="24" opacity="0"/><path d="M12 2a8 8 0 0 0-8 7.92c0 5.48 7.05 11.58 7.35 11.84a1 1 0 0 0 1.3 0C13 21.5 20 15.4 20 9.92A8 8 0 0 0 12 2zm0 17.65c-1.67-1.59-6-6-6-9.73a6 6 0 0 1 12 0c0 3.7-4.33 8.14-6 9.73z"/><path d="M12 6a3.5 3.5 0 1 0 3.5 3.5A3.5 3.5 0 0 0 12 6zm0 5a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 12 11z"/></g></g>
                                            </svg>
                                        </a>
                                        <a href="" aria-label="Transfiere de dueño" data-toggle="modal" data-target="#hello">
                                            <svg class="gi gi-person-add-fill fs-xxl" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g data-name="Layer 2"><g data-name="Layer 2"><g data-name="person-add"><rect width="24" height="24" opacity="0"/><path d="M21 6h-1V5a1 1 0 0 0-2 0v1h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 2 0V8h1a1 1 0 0 0 0-2z"/><path d="M10 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0-6a2 2 0 1 1-2 2 2 2 0 0 1 2-2z"/><path d="M10 13a7 7 0 0 0-7 7 1 1 0 0 0 2 0 5 5 0 0 1 10 0 1 1 0 0 0 2 0 7 7 0 0 0-7-7z"/></g></g>
                                            </svg>
                                        </a>
                                    </div><!-- ICONOS -->
                                    <hr>
                                    <p class="font-italic">"Space Manbow is a legendary shoot 'em up video game developed and published by Konami for the MSX2." - Luna</p>
                                </div><!--  / PET INFO -->
                            </div>
                            <hr>
                           <comments-component :id_mascota="{{$pets->id}}"></comments-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / SHARE OPTS -->
        <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="shareLabel" aria-hidden="true"><!-- SHARE OPTS -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-5">
                    <div class="d-flex align-items-center mb-5">
                        <h2 class="mr-auto fs-xs" id="shareLabel">Comparte</h2>
                        <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                            <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/>
                            </svg>
                        </button>
                    </div>
                    <ul class="list-unstyled d-flex mb-5 overflow-auto">
                        <li class="mr-5 text-center">
                            <button class="btn btn-lg btn-circle btn-danger mb-3" type="button">
                                <svg class="gi gi-google-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5 14a5.51 5.51 0 0 1-4.5 3.93 6.15 6.15 0 0 1-7-5.45A6 6 0 0 1 12 6a6.12 6.12 0 0 1 2.27.44.5.5 0 0 0 .64-.21l1.44-2.65a.52.52 0 0 0-.23-.7A10 10 0 0 0 2 12.29 10.12 10.12 0 0 0 11.57 22 10 10 0 0 0 22 12.52v-2a.51.51 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h5"/>
                                </svg>
                            </button>
                            <p>Google</p>
                        </li>
                        <li class="mr-5 text-center">
                            <button class="btn btn-lg btn-circle btn-info mb-3" type="button">
                                <svg class="gi gi-twitter-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.08 20A11.07 11.07 0 0 0 19.52 9 8.09 8.09 0 0 0 21 6.16a.44.44 0 0 0-.62-.51 1.88 1.88 0 0 1-2.16-.38 3.89 3.89 0 0 0-5.58-.17A4.13 4.13 0 0 0 11.49 9C8.14 9.2 5.84 7.61 4 5.43a.43.43 0 0 0-.75.24 9.68 9.68 0 0 0 4.6 10.05A6.73 6.73 0 0 1 3.38 18a.45.45 0 0 0-.14.84A11 11 0 0 0 8.08 20"/>
                                </svg>
                            </button>
                            <p>Twitter</p>
                        </li>
                        <li class="mr-5 text-center">
                            <button class="btn btn-lg btn-circle btn-dark mb-3" type="button">
                                <svg class="gi gi-linkedin-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.15 8.4a5.83 5.83 0 0 0-5.85 5.82v5.88a.9.9 0 0 0 .9.9h2.1a.9.9 0 0 0 .9-.9v-5.88a1.94 1.94 0 0 1 2.15-1.93 2 2 0 0 1 1.75 2v5.81a.9.9 0 0 0 .9.9h2.1a.9.9 0 0 0 .9-.9v-5.88a5.83 5.83 0 0 0-5.85-5.82z"/>
                                    <rect x="3" y="9.3" width="4.5" height="11.7" rx=".9" ry=".9"/>
                                    <circle cx="5.25" cy="5.25" r="2.25"/>
                                </svg>
                            </button>
                            <p>LinkedIn</p>
                        </li>
                        <li class="text-center">
                            <button class="btn btn-lg btn-circle btn-primary mb-3" type="button">
                                <svg class="gi gi-facebook-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 3.5a.5.5 0 0 0-.5-.5H14a4.77 4.77 0 0 0-5 4.5v2.7H6.5a.5.5 0 0 0-.5.5v2.6a.5.5 0 0 0 .5.5H9v6.7a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-6.7h2.62a.5.5 0 0 0 .49-.37l.72-2.6a.5.5 0 0 0-.48-.63H13V7.5a1 1 0 0 1 1-.9h2.5a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                            </button>
                            <p>Facebook</p>
                        </li>
                    </ul>
                    <form>
                        <label for="pageLink">Mi Link</label>
                        <div class="input-group">
                            <input class="form-control form-control-lg" id="pageLink" type="text" value="{{env('APP_URL')}}/tag/{{$pets->tag_id}}" readonly>
                            <div class="input-group-append">
                                <button class="btn" type="button">
                                    <svg class="gi gi-copy-fill fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 9h-3V5.67A2.68 2.68 0 0 0 12.33 3H5.67A2.68 2.68 0 0 0 3 5.67v6.66A2.68 2.68 0 0 0 5.67 15H9v3a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3zm-9 3v1H5.67a.67.67 0 0 1-.67-.67V5.67A.67.67 0 0 1 5.67 5h6.66a.67.67 0 0 1 .67.67V9h-1a3 3 0 0 0-3 3z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / SHARE OPTS -->
        <traspaso-component :id="{{$pets->id}}"></traspaso-component>
    </main>
@endsection
