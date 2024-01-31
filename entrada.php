<?php
    require_once 'includes/header.php';
?>

<?php
    $entrada_actual = obtenerEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>

    <!--Container Comppleto-->
    <div id="container" class="main__container">
     <!--ASIDE-->
        <?php  require_once 'includes/lateral.php';?>


        <!--Entradas-->
        <div id="principal" class="container__mains">

            <h1 class="main__title"><?=$entrada_actual['titulo'];  ?></h1>
            <a href="categoria.php?id=<?=$entrada_actual['categoria_id'];?>">
                <h2><?=$entrada_actual['categoria']?></h2>
            </a>
            <h4><?=$entrada_actual['fecha'] ?> | <?=$entrada_actual['usuario'];?></h4>
            <p>
                <?=$entrada_actual['descripcion']; ?>
            </p>
             

            <?php  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']):  ?>
                <a class="button" href="editar_entrada.php?id=<?=$entrada_actual['id']?>">Editar entrada</a>
                <a class="button" href="functions/borrar_entrada.php?id=<?=$entrada_actual['id']?>">Borrar entrada</a>
            <?php endif; ?>                
            
        </div>

            <div class="clearfix"></div>
    </div> 
    

    
    <!--FOOTER-->
    <?php require_once 'includes/footer.php'; ?>
    
    
</body>
</html>