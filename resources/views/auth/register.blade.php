@extends('front.layout.app')
@push('styles')
    <style>

        #busqueda{
            display: none;
        }
    </style>

@endpush
@section('content')
    <main>
        <div class="d-flex align-items-center min-vh-100 py-11 mx-auto" style="max-width: 468px;">
            <div class="container">
                <div class="card">
                    <div class="card-body p-sm-9">
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <h1 class="mb-5 fs-lg">Registro</h1>
                            <label class="sr-only" for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <svg class="gi gi-person-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z"></path>
                                        <path d="M18 21a1 1 0 0 0 1-1 7 7 0 0 0-14 0 1 1 0 0 0 1 1z"></path>
                                    </svg>
                                </div>
                                <input class="form-control form-control-lg" name="name" id="username" type="text" placeholder="Username" required="">
                            </div>
                            <label class="sr-only" for="username">Telefono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <svg class="gi gi-phone-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 8a3 3 0 0 1 3 3 1 1 0 0 0 2 0 5 5 0 0 0-5-5 1 1 0 0 0 0 2z"/>
                                        <path d="M13 4a7 7 0 0 1 7 7 1 1 0 0 0 2 0 9 9 0 0 0-9-9 1 1 0 0 0 0 2z"/>
                                        <path d="M21.75 15.91a1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a9.91 9.91 0 0 1-4.87-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76 4.34 4.34 0 0 0-.19-.73z"/>
                                    </svg>
                                </div>
                                <input class="form-control form-control-lg" name="phone" id="phone" type="text" placeholder="Telefono" required="">
                            </div>
                            <label class="sr-only" for="email">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <svg class="gi gi-email-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 4H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3zm0 2l-6.5 4.47a1 1 0 0 1-1 0L5 6z"></path>
                                    </svg>
                                </div>
                                <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="Email" required="">
                            </div>
                            <label class="sr-only" for="password">Password</label>
                            <div class="input-group mb-5">
                                <div class="input-group-prepend">
                                    <svg class="gi gi-lock-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="15" r="1"></circle>
                                        <path d="M17 8h-1V6.11a4 4 0 1 0-8 0V8H7a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3zm-7-1.89A2.06 2.06 0 0 1 12 4a2.06 2.06 0 0 1 2 2.11V8h-4zM12 18a3 3 0 1 1 3-3 3 3 0 0 1-3 3z"></path>
                                    </svg>
                                </div>
                                <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password" required="">
                            </div>
                            <button class="btn btn-block btn-lg btn-primary" type="submit">Registrarme</button>
                            <p class="mt-5 text-center">Tienes ya una cuenta? <a class="link-primary" href="{{route('login')}}">Ingresa</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
