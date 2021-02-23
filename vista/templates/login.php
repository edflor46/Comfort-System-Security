<div class="container__login">
    <div class="login">
        <form id="form__login" class="form__login" method="POST">
            <img src="vista/assets/img/logo.png" class="img__logo-login" alt="">
            <h1 class="titulo__login">Iniciar Sesión</h1>

            <!--Usuario-->
            <div class="form__box form__box__one" id="login__usuario">
                <div class="icon__login">
                    <i class="fas fa-user"></i>
                </div>

                <div class="form__box-input">
                    <label for="usuario" class="form__label-login">Nombre de usuario</label>
                    <input type="text" id="login_usuario" name="usuario__login" class="form__input-login">
                </div>
            </div>

            <!--Password-->
            <div class="form__box" id="login__password">
                <div class="icon__login">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="form__box-input">
                    <label for="password" class="form__label-login">Contraseña</label>
                    <input type="password" id="password_login" name="password__login" class="form__input-login">
                </div>
            </div>

            <?php
            $login = new ControladorUsuarios();
            $login->login();

            ?>

            <input type="submit" class="form__btn-login" value="Ingresar">



        </form>
    </div>
</div>