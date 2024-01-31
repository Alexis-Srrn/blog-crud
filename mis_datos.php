<?php require_once 'includes/redirection.php';?>
<?php require_once 'includes/header.php'; ?>


<div id="container" class="main__container">
    <?php  require_once 'includes/lateral.php';?>

    <div id="principal" class="container__mains">
        <h1 class="main__title">Mis datos</h1>

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

            <form action="functions/actualizar_usuario.php" method="POST">
                <div class="form__inputs">
                    <label class="form__label" for="name">Nombre</label>
                    <input class="form__input" type="text" name="name" value="<?=$_SESSION['usuario']['nombre']; ?>">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                </div>

                <div class="form__inputs">
                    <label class="form__label" for="lastname">Apellidos</label>
                    <input class="form__input" type="text" name="lastname" value="<?=$_SESSION['usuario']['apellidos']; ?>">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
                </div>


                <div class="form__inputs">
                    <label class="form__label" for="password">Password antiguo</label>
                    <input class="form__input" type="password" name="password">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                </div>

                <div class="form__inputs">
                    <label class="form__label" for="password">Nuevo password</label>
                    <input class="form__input" type="password" name="new_password">
                    <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'new_password') : ''; ?>
                </div>


                
                <input class="form__button" type="submit" name="submit" value="Actualizar">
                
            </form>
            <?php borrarErrores(); ?>



    </div>

</div>


<?php require_once 'includes/footer.php'; ?>