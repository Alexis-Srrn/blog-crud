<?php
require_once 'conexion.php';
?>
<?php
require_once 'helpers.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Blog - Gaming</title>
</head>
<body>
    <!--Header-->


    <header id="header" class="header">
        <div id="logo" class="logo">
            <a href="index.php" class="logo__link">
                Blog - Gaming
            </a>    
    
        </div>

        

        <!--MENU-->

        <nav id="menu" class="menu">
            <ul class="menu__list">
                <li class="list__element">
                    <a href="index.php" class="element__link">Inicio</a>
                </li>

                <?php 
                    $categorias = mostrarCategorias($db);
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)): 
                ?>
                    <li class="list__element">
                        <a href="categoria.php?id=<?=$categoria['id']?>" class="element__link"><?=$categoria['nombre']?></a>
                    </li>
                <?php 
                    endwhile;
                    endif; 
                ?>

                <!-- 
                <li class="list__element">
                     <a href="index.php" class="element__link">Categoria 1</a>
                </li>

                <li class="list__element">
                    <a href="index.php" class="element__link">Categoria 2</a>
                </li>

                <li class="list__element">
                    <a href="index.php" class="element__link">Categoria 3</a>
                </li>

                <li class="list__element">
                    <a href="index.php" class="element__link">Categoria 4</a>
                </li>

                -->

                <li class="list__element">
                    <a href="index.php" class="element__link">Sobre mí</a>
                </li>

                <li class="list__element">
                    <a href="index.php" class="element__link">Contacto</a>
                </li>
            
             </ul>    
        </nav> 

    </header> 