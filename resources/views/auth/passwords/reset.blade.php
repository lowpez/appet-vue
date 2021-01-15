@extends('layouts.app')

@section('content')
    <main>
        <div class="d-flex align-items-center min-vh-100 py-11 mx-auto" style="max-width: 468px;">
            <div class="container">
                <div class="card">
                    <div class="card-body p-sm-9">
                        <form>
                            <h1 class="mb-3 fs-lg">Me olvide</h1>
                            <p class="mb-5">Ingresa tu mail para recuperar tu password.</p>
                            <label class="sr-only" for="email">Direccion de correo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <svg class="gi gi-email-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 4H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3zm0 2l-6.5 4.47a1 1 0 0 1-1 0L5 6z"></path>
                                    </svg>
                                </div>
                                <input class="form-control form-control-lg" id="email" type="email" placeholder="Email Address" required="">
                            </div>
                            <button class="btn btn-block btn-lg btn-primary" type="submit">Recuperar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
