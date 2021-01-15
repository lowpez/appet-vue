<template>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="settings" role="tabpanel">
            <h2 class="my-5 fs-sm">Ajustes</h2>
            <hr class="mb-0">
            <div id="accordionOne">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
                        <div class="mr-auto">
                            <h3 class="mb-1 fs-xxs lh-lg">Mi Cuenta</h3>
                            <p>Configura tus preferencias.</p>
                        </div>
                        <svg class="gi gi-arrow-ios-forward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 19a1 1 0 0 1-.64-.23 1 1 0 0 1-.13-1.41L13.71 12 9.39 6.63a1 1 0 0 1 .15-1.41 1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z"></path>
                        </svg>
                        <svg class="gi gi-arrow-ios-downward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16a1 1 0 0 1-.64-.23l-6-5a1 1 0 1 1 1.28-1.54L12 13.71l5.36-4.32a1 1 0 0 1 1.41.15 1 1 0 0 1-.14 1.46l-6 4.83A1 1 0 0 1 12 16z"></path>
                        </svg>
                    </div>
                    <div class="collapse show" id="collapseOne" data-parent="#accordionOne" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            <form>
                                <div class="card mb-5"><!-- AVATAR -->
                                    <div class="card-body d-flex align-items-center">
                        <span class=" mr-5 bg-success rounded-circle">
                          <img src="https://img3.wikia.nocookie.net/__cb20140911193903/ssbb/es/images/0/09/Sprite_del_Perro_de_Duck_Hunt.gif" class="rounded-circle avatar-xxl">
                        </span>
                                        <div>
                                            <h4 class="mb-2 fs-xxs lh-sm"><button class="btn btn-block btn-lg btn-primary" type="submit">Avatar</button></h4>
                                            <p class="lh-sm"></p>
                                        </div>
                                    </div>
                                </div><!-- / AVATAR -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="name">Nombre</label>
                                        <input class="form-control form-control-lg mb-5" name="name" id="name" type="text" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Apellido</label>
                                        <input class="form-control form-control-lg mb-5" name="name" id="name" type="text" placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="email">Email</label>
                                        <input class="form-control form-control-lg mb-5" name="email" id="email" type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inputLastname">Telefono</label>
                                        <input type="text" class="form-control form-control-lg mb-5" name="phone" id="phone" placeholder="Telefono">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="currentPassword">Password Actual</label>
                                        <input class="form-control form-control-lg mb-5" name="password" id="currentPassword" type="password" placeholder="Password Actual">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="newPassword">Nuevo Password</label>
                                        <input class="form-control form-control-lg mb-5" name="newpassword" id="newPassword" type="password" placeholder="Nuevo Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="name">Region</label>
                                        <select class="form-control selectpicker form-control-lg mb-5" name="state" data-live-search="true" id="state">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inputLastname">Ciudad</label>
                                        <select class="form-control selectpicker form-control-lg mb-5" name="city" data-live-search="true" id="city">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="address">Dirección</label>
                                <input class="form-control form-control-lg mb-5" name="address" id="address" type="text" placeholder="Dirección">
                                <label for="biography">Sobre Mi</label>
                                <textarea class="form-control mb-5" name="biography" id="biography" rows="3" placeholder="Cuentanos de ti"></textarea>
                                <button class="btn btn-block btn-lg btn-primary" type="submit">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" role="button" aria-expanded="false" aria-controls="collapseFive">
                        <div class="mr-auto">
                            <h3 class="mb-1 fs-xxs lh-lg">Privacidad</h3>
                            <p>Configure your preferences.</p>
                        </div>
                        <svg class="gi gi-arrow-ios-forward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 19a1 1 0 0 1-.64-.23 1 1 0 0 1-.13-1.41L13.71 12 9.39 6.63a1 1 0 0 1 .15-1.41 1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z"></path>
                        </svg>
                        <svg class="gi gi-arrow-ios-downward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16a1 1 0 0 1-.64-.23l-6-5a1 1 0 1 1 1.28-1.54L12 13.71l5.36-4.32a1 1 0 0 1 1.41.15 1 1 0 0 1-.14 1.46l-6 4.83A1 1 0 0 1 12 16z"></path>
                        </svg>
                    </div>
                    <div class="collapse" id="collapseFive" data-parent="#accordionOne" aria-labelledby="headingFive">
                        <div class="accordion-body">
                            <form>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mr-auto fs-xxs lh-lg">Action</h4>
                                    <div class="form-check form-switch fs-sm">
                                        <input class="form-check-input" id="switchFour" type="checkbox">
                                        <label class="sr-only" for="switchFour">Switch</label>
                                    </div>
                                </div>
                                <p>The quick brown fox jumps over the lazy dog.</p>
                            </form>
                        </div>
                    </div>
                    <hr class="my-0">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
