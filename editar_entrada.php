<?php
    require_once 'includes/redirection.php';
    require_once 'includes/header.php';
?>

<?php
    $entrada_actual = obtenerEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>



<div id="container" class="main__container">
    <?php  require_once 'includes/lateral.php';?>

    <div id="principal" class="container__mains">
        <h1 class="main__title">Editar Entrada</h1>
        <p>
            Edita el contenido de tus entradas: <?=$entrada_actual['titulo'];?>
        </p>
        <br>        
        
        <form action="functions/guardar_entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
            
            <div class="form__inputs">
                <label class="form__label" for="titulo">Titulo:</label>
                <input class="form__input" type="text" name="titulo" value="<?=$entrada_actual['titulo'];?>">
                <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
            </div>

            <div class="form__inputs">
                <label class="form__label" for="descripcion">Descripción:</label>
                <textarea class="form__input" type="text" name="descripcion"><?=$entrada_actual['descripcion'];?></textarea>
                <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
            </div>


            <div class="form__inputs">
                <label class="form__label" for="categoria">Categoría:</label>
                <select name="categoria">
                    <?php
                        $categorias = mostrarCategorias($db);
                        if(!empty($categorias)):
                        while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                        <option value="<?=$categoria['id']?>"
                        <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                        <?=$categoria['nombre']?> 
                        </option>
                    <?php
                        endwhile;
                        endif;
                    ?>
                </select>
                <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
            </div>



            <input class="form__button" type="submit" value="Guardar">
        </form>
        <?php borrarErrores(); ?>
    </div>


</div>




<?php require_once 'includes/footer.php'; ?>


</body>
</html>