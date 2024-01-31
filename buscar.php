<?php
    require_once 'includes/header.php';
?>

<?php

    if(!isset($_POST['busqueda'])){
        header("Location: index.php");
    }
?>

    <!--Container Comppleto-->
    <div id="container" class="main__container">
     <!--ASIDE-->
        <?php  require_once 'includes/lateral.php';?>


        <!--Entradas-->
        <div id="principal" class="container__mains">

            <h1 class="main__title">Busqueda: <?=$_POST['busqueda'];  ?></h1>

             <?php 
                $entradas = mostrarEntradas($db, null, null, $_POST['busqueda']);
                if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)):
                        
            ?>
                    
                    <article class="entrada">
                        <a href="entrada.php?id=<?=$entrada['id']?>"> 
                            <h2 class="main__subtitle"><?=$entrada['titulo']?></h2>
                            <span class="main__date"><?=$entrada['categoria']. '|'. $entrada['fecha'] ?></span>
                            <p class="main__text">
                                <?= substr($entrada['descripcion'], 0, 180) . "...";?>    
                            </p>
                        </a>
                    </article>
            <?php
                    endwhile;
                else:
            ?>
            <div class="alert">No hay entradas en esta categoria</div>
            <?php
                endif;
            ?>

            
            
                
            
        </div>

            <div class="clearfix"></div>
    </div> 
    

    
    <!--FOOTER-->
    <?php require_once 'includes/footer.php'; ?>
    
    
</body>
</html>