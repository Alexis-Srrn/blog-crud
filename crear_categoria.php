<?php require_once 'includes/redirection.php';?>
<?php require_once 'includes/header.php'; ?>

<div id="container" class="main__container">
    <?php  require_once 'includes/lateral.php';?>

    <div id="principal" class="container__mains">
        <h1 class="main__title">Crear Categoria</h1>
        <p>Añadir nuevas categorias al blog para que los usuarios puedan utilizarlas
            al crear sus entradas
        </p>
        <br>        
        
        <form action="functions/guardar_categoria.php" method="POST">
            
            <div class="form__inputs">
            <label class="form__label" for="nombre">Nombre de la categoria:</label>
            <input class="form__input" type="text" name="nombre">
            </div>

            <input class="form__button" type="submit" value="Guardar">
        </form>

    </div>


</div>

<?php require_once 'includes/footer.php'; ?>