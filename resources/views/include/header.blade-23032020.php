    <nav class="navside navside-expand-lg sticky-top order-2 order-lg-0"><!-- SIDEBAR -->
      <div class="container">
        <a class="d-none d-lg-inline link-body" rel="home" href="#" aria-label="first link">
          <i class="gi-animation-hover">
            <img src="{{secure_asset('logo.svg')}}" class="logo img-responsive gi-animation gi-animation-hover-pulse" alt="Logo de Appet CL" />
          </i>
        </a>
        <ul class="nav navside-nav" role="tablist" aria-orientation="vertical">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tabs" href="/home/" role="tab" aria-controls="channels" aria-selected="true" aria-label="first link">
              <i class="gi-animation-hover">
                <svg class="gi gi-message-square-fill gi-animation gi-animation-hover-pulse fs-lg" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 3H5a3 3 0 0 0-3 3v15a1 1 0 0 0 .51.87A1 1 0 0 0 3 22a1 1 0 0 0 .51-.14L8 19.14a1 1 0 0 1 .55-.14H19a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3zM8 12a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm4 0a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm4 0a1 1 0 1 1 1-1 1 1 0 0 1-1 1z"></path>
                </svg>
              </i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tabs" data-info="tooltip" title="{{\App\View::getCountNotificacion(Auth::user()->id)}}" href="/notifications/" role="tab" aria-controls="notifications" aria-selected="false" aria-label="Notificaciones">
              <i class="gi-animation-hover">
                <svg class="gi gi-bell-fill gi-animation gi-animation-hover-pulse fs-lg" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20.52 15.21l-1.8-1.81V8.94a6.86 6.86 0 0 0-5.82-6.88 6.74 6.74 0 0 0-7.62 6.67v4.67l-1.8 1.81A1.64 1.64 0 0 0 4.64 18H8v.34A3.84 3.84 0 0 0 12 22a3.84 3.84 0 0 0 4-3.66V18h3.36a1.64 1.64 0 0 0 1.16-2.79zM14 18.34A1.88 1.88 0 0 1 12 20a1.88 1.88 0 0 1-2-1.66V18h4z"></path>
                </svg>
              </i>
            </a>
          </li>
          <li class="nav-item flex-lg-grow-1">
            <a class="nav-link" data-toggle="tabs" href="/pets/" role="tab" aria-controls="friends" aria-selected="false" aria-label="Mis Mascotas">
              <i class="gi-animation-hover">
                <svg class="gi gi-heart-fill gi-animation gi-animation-hover-pulse fs-lg" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 21a1 1 0 0 1-.71-.29l-7.77-7.78a5.26 5.26 0 0 1 0-7.4 5.24 5.24 0 0 1 7.4 0L12 6.61l1.08-1.08a5.24 5.24 0 0 1 7.4 0 5.26 5.26 0 0 1 0 7.4l-7.77 7.78A1 1 0 0 1 12 21z"></path>
                </svg>
              </i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tabs" href="/settings/" role="tab" aria-controls="settings" aria-selected="false" aria-label="Ajustes de tu Cuenta">
              <i class="gi-animation-hover">
                <svg class="gi gi-settings-fill gi-animation gi-animation-hover-pulse fs-lg" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="1.5"></circle>
                  <path d="M21.89 10.32L21.1 7.8a2.26 2.26 0 0 0-2.88-1.51l-.34.11a1.74 1.74 0 0 1-1.59-.26l-.11-.08a1.76 1.76 0 0 1-.69-1.43v-.28a2.37 2.37 0 0 0-.68-1.68 2.26 2.26 0 0 0-1.6-.67h-2.55a2.32 2.32 0 0 0-2.29 2.33v.24a1.94 1.94 0 0 1-.73 1.51l-.13.1a1.93 1.93 0 0 1-1.78.29 2.14 2.14 0 0 0-1.68.12 2.18 2.18 0 0 0-1.12 1.33l-.82 2.6a2.34 2.34 0 0 0 1.48 2.94h.16a1.83 1.83 0 0 1 1.12 1.22l.06.16a2.06 2.06 0 0 1-.23 1.86 2.37 2.37 0 0 0 .49 3.3l2.07 1.57a2.25 2.25 0 0 0 1.35.43A2 2 0 0 0 9 22a2.25 2.25 0 0 0 1.47-1l.23-.33a1.8 1.8 0 0 1 1.43-.77 1.75 1.75 0 0 1 1.5.78l.12.17a2.24 2.24 0 0 0 3.22.53L19 19.86a2.38 2.38 0 0 0 .5-3.23l-.26-.38A2 2 0 0 1 19 14.6a1.89 1.89 0 0 1 1.21-1.28l.2-.07a2.36 2.36 0 0 0 1.48-2.93zM12 15.5a3.5 3.5 0 1 1 3.5-3.5 3.5 3.5 0 0 1-3.5 3.5z"></path>
                </svg>
              </i>
            </a>
          </li>
          <li class="nav-item  d-lg-block">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-label="Cerrar Sesion">
              <i class="gi-animation-hover">
                <svg class="gi gi-power-fill gi-animation gi-animation-hover-pulse fs-lg" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <g data-name="Layer 2"><g data-name="power"><rect width="24" height="24" opacity="0"/><path d="M12 13a1 1 0 0 0 1-1V2a1 1 0 0 0-2 0v10a1 1 0 0 0 1 1z"/><path d="M16.59 3.11a1 1 0 0 0-.92 1.78 8 8 0 1 1-7.34 0 1 1 0 1 0-.92-1.78 10 10 0 1 0 9.18 0z"/></g></g>
                </svg>
              </i>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <span class="avatar avatar-md status status-online lead bg-primary rounded-circle">jd</span>
          </li>
        </ul>
      </div>
    </nav><!-- SIDEBAR -->
    <div class="sidebar sidebar-expand-lg order-1 order-lg-0"><!-- CONTENT-->
      <nav class="navbar navbar-expand-lg sticky-top"><!-- MAIN MENU -->
        <div class="container">
          <a rel="home" href="#">
            <svg class="gi gi-github text-white" width="88.73" height="24" viewBox="-0.122 175.062 480.244 129.875" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M92.375 230.65H52.019a1.887 1.887 0 0 0-1.886 1.886v19.731a1.89 1.89 0 0 0 1.886 1.889h15.743v24.513s-3.535 1.206-13.308 1.206c-11.53 0-27.637-4.214-27.637-39.632 0-35.425 16.772-40.087 32.518-40.087 13.63 0 19.502 2.401 23.238 3.556 1.174.36 2.26-.808 2.26-1.851l4.502-19.063c0-.487-.165-1.075-.721-1.474-1.517-1.082-10.774-6.262-34.16-6.262-26.941 0-54.576 11.463-54.576 66.562 0 55.103 31.64 63.313 58.302 63.313 22.076 0 35.468-9.434 35.468-9.434.552-.306.612-1.077.612-1.431v-61.537c0-1.04-.844-1.885-1.885-1.885M300.354 181.664a1.88 1.88 0 0 0-1.873-1.896h-22.724a1.889 1.889 0 0 0-1.882 1.896l.006 43.913h-35.419v-43.913a1.882 1.882 0 0 0-1.875-1.896h-22.722a1.887 1.887 0 0 0-1.877 1.896v118.904c0 1.048.843 1.901 1.877 1.901h22.722c1.039 0 1.875-.854 1.875-1.901v-50.86h35.419l-.062 50.86c0 1.048.844 1.901 1.883 1.901h22.777c1.041 0 1.873-.854 1.875-1.901V181.664M135.254 197.268c0-8.183-6.56-14.795-14.653-14.795-8.085 0-14.65 6.612-14.65 14.795 0 8.173 6.565 14.802 14.65 14.802 8.093 0 14.653-6.629 14.653-14.802M133.629 275.486V220.6a1.89 1.89 0 0 0-1.88-1.895h-22.651c-1.039 0-1.969 1.072-1.969 2.115v78.634c0 2.312 1.44 2.998 3.304 2.998h20.408c2.239 0 2.788-1.1 2.788-3.034v-23.932M386.71 218.884h-22.549c-1.034 0-1.876.852-1.876 1.901v58.302s-5.729 4.192-13.859 4.192c-8.13 0-10.287-3.689-10.287-11.65v-50.844c0-1.049-.841-1.901-1.875-1.901h-22.886c-1.032 0-1.879.852-1.879 1.901v54.693c0 23.646 13.179 29.431 31.31 29.431 14.873 0 26.864-8.216 26.864-8.216s.571 4.329.829 4.843c.259.512.932 1.029 1.659 1.029l14.56-.064c1.032 0 1.879-.854 1.879-1.898l-.008-79.817c0-1.05-.843-1.902-1.882-1.902M439.445 283.207c-7.821-.238-13.126-3.788-13.126-3.788v-37.653s5.233-3.208 11.654-3.782c8.12-.727 15.944 1.726 15.944 21.095.001 20.426-3.53 24.457-14.472 24.128zm8.894-66.993c-12.807 0-21.518 5.714-21.518 5.714v-40.263c0-1.05-.839-1.897-1.875-1.897h-22.787a1.887 1.887 0 0 0-1.878 1.897v118.903c0 1.048.842 1.901 1.881 1.901h15.811c.711 0 1.25-.367 1.648-1.009.393-.639.96-5.482.96-5.482s9.318 8.83 26.957 8.83c20.708 0 32.584-10.504 32.584-47.154 0-36.651-18.967-41.44-31.783-41.44M198.936 218.695h-17.045l-.026-22.519c0-.852-.439-1.278-1.424-1.278h-23.228c-.903 0-1.388.398-1.388 1.265v23.271s-11.64 2.809-12.427 3.037a1.886 1.886 0 0 0-1.361 1.812v14.623c0 1.052.84 1.898 1.879 1.898h11.909v35.178c0 26.13 18.328 28.697 30.696 28.697 5.651 0 12.411-1.814 13.527-2.228.675-.248 1.067-.947 1.067-1.705l.019-16.086c0-1.05-.886-1.897-1.884-1.897-.993 0-3.534.404-6.15.404-8.372 0-11.209-3.893-11.209-8.932l-.001-33.432h17.046c1.039 0 1.88-.847 1.88-1.898v-18.317a1.884 1.884 0 0 0-1.88-1.893"/>
            </svg>
          </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
            <svg class="gi gi-menu fs-lg" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <rect x="3" y="11" width="18" height="2" rx=".95" ry=".95"/>
              <rect x="3" y="16" width="18" height="2" rx=".95" ry=".95"/>
              <rect x="3" y="6" width="18" height="2" rx=".95" ry=".95"/>
            </svg>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Seccion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
              </li>
              <li class="nav-item active dropdown">
                <a class="nav-link" id="navbarDropdownOne" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Unete<svg class="gi gi-arrow-down-fill ml-1 align-text-top" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 17a1.72 1.72 0 0 1-1.33-.64l-4.21-5.1a2.1 2.1 0 0 1-.26-2.21A1.76 1.76 0 0 1 7.79 8h8.42a1.76 1.76 0 0 1 1.59 1.05 2.1 2.1 0 0 1-.26 2.21l-4.21 5.1A1.72 1.72 0 0 1 12 17z"/>
                </svg></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownOne">
                  <a class="dropdown-item active" href="#">Login</a>
                  <a class="dropdown-item" href="#">Register</a>
                  <a class="dropdown-item" href="#">Olvido su password?</a>
                </div>
              </li>
            </ul>
            <form>
              <div class="input-group mb-5 mr-lg-5 mb-lg-0">
                <div class="input-group-prepend">
                  <svg class="gi gi-search fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"/>
                  </svg>
                </div>
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              </div>
            </form>
        <!--<div class="dropdown">
              <button class="btn btn-primary avatar avatar-md lead rounded-circle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">jd</button>
              <div class="dropdown-menu dropdown-menu-right">
                <button class="dropdown-item" type="button">Profile</button>
                <button class="dropdown-item" type="button">Settings</button>
                <button class="dropdown-item" type="button">Logout</button>
              </div>
            </div>-->
          </div>
        </div>
      </nav><!-- / MAIN MENU -->
      <div class="container-fluid py-5 px-0"><!-- MAIN CONTENT -->
        <div class="container not-me">
          <form><!-- SEARCH FORM -->
            <div class="input-group">
              <div class="input-group-prepend">
                <svg class="gi gi-search fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"></path>
                </svg>
              </div>
              <input class="form-control form-control-lg" type="search" placeholder="Ingresa tu tag identificador" aria-label="Busca tu tag aquí">
              <a href="pets/create/" aria-label="Añade una nueva Mascota">
                <button class="btn btn-sm btn-circle create btn-dark" type="button" aria-label="Añade una nueva Mascota" title="Añade una nueva Mascota">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="plus"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"/><path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z"/></g></g></svg>
                </button>
              </a>
            </div>
          </form><!-- SEARCH FORM -->
        </div>