<aside id="sidebar" class="container__forms">

        <div id="buscador" class="form__block">
            <h3 class="form__title">Buscar</h3>

            <form action="buscar.php" method="POST">    
  
                
            <div class="form__inputs">
               
                <input class="form__input" type="text" name="busqueda">
            </div>
            
            <input class="form__button" type="submit" value="Buscar">
                
            </form>
        </div>
        
        <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="form__block">
            <h3>Bienvenido,  <?=$_SESSION['usuario']['nombre'] .' '.$_SESSION['usuario']['apellidos'];  ?></h3>
            <!--Boton de cerrar sesión -->
            <a class="button" href="crear_entrada.php">Crear entradas</a>
            <a class="button" href="crear_categoria.php">Crear categoria</a>
            <a class="button" href="mis_datos.php">Mis datos</a>
            <a class="button" href="functions/cerrar_sesion.php">Cerrar sesión</a>
        </div>
        <?php endif; ?>
        

        <!--Ver si tenemos que mostrar el cuadro de login -->
        <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="form__block">
            <h3 class="form__title">Identificarse</h3>

            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alert alert-error">
                <?=$_SESSION['error_login'];?>
                </div>
            <?php endif; ?>

            <form action="functions/login.php" method="POST">    
            <div class="form__inputs">
                <label class="form__label" for="email">Email</label>
                <input class="form__input" type="email" name="email">
            </div>     
                
            <div class="form__inputs">
                <label class="form__label" for="password">Password</label>
                <input class="form__input" type="password" name="password">
            </div>
            
            <input class="form__button" type="submit" value="Ingresar">
                
            </form>
        </div>

        <div id="register" class="form__block">

            <h3 class="form__title">Registrarse</h3>
            <!-- MOSTRAR ERRORES-->
            <?php  if(isset($_SESSION['completado'])): ?>
                        <div class="alert alert-sucess">
                            <?=$_SESSION['completado']; ?> 
                        </div> 
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alert alert-error">
                    <?=$_SESSION['errores']['general']; ?> 
                </div> 
            <?php endif; ?>

            <form action="functions/registro.php" method="POST">
                <div class="form__inputs">
                    <label class="form__label" for="name">Nombre</label>
                    <input class="form__input" type="text" name="name">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                </div>

                <div class="form__inputs">
                    <label class="form__label" for="lastname">Apellidos</label>
                    <input class="form__input" type="text" name="lastname">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
                </div>

                <div class="form__inputs">
                    <label class="form__label" for="email">Email</label>
                    <input class="form__input" type="email" name="email">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                </div>     
                
                <div class="form__inputs">
                    <label class="form__label" for="password">Password</label>
                    <input class="form__input" type="password" name="password">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                </div>
                <input class="form__button" type="submit" name="submit" value="Registrarse">
                
            </form>
            <?php borrarErrores(); ?>
        </div>
        <?php endif; ?>
     </aside>