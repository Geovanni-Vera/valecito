<?php


require '../../config/database.php';
require '../../funciones/funciones.php';

$auth = estaAuth();

if(!$auth){
    header('location: /valecito2.0/');
}
$db = new Database("localhost", "elvalecito", "root", "root");
$conect = $db -> connect();
if($conect){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $categoria = $_POST['categoria'];
        $sql_in="INSERT INTO categorias (categoria) VALUES ('$categoria');";
        $resultado_in = $db->query($sql_in);
        if($resultado_in){
            header('location: /valecito2.0/php/admin/');
        }
    }
    
}
else{
    die;
}

include '../../templates/header.php';
?>

<section class="ctn-form">
    <h3 class="title center">Crear Producto</h3>
    <form action="" method="post" class="formulario">

        <label for="categoria" class="label">Categoria:</label>
        <input type="text" name="categoria" id="categoria" class="input">
        
        <input type="submit" value="Guardar" class="submit ">
        
    </form>
</section>
<?php

include '../../templates/footer.php';

?>