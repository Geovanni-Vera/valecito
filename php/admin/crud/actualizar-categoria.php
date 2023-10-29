<?php


require '../../config/database.php';
require '../../funciones/funciones.php';

$auth = estaAuth();

if(!$auth){
    header('location: /valecito2.0/index.php');
}
$db = new Database("localhost", "elvalecito", "root", "root");
$conect = $db -> connect();

$cat = "";
$id = $_GET['id'];
if($conect){

    $sql= "SELECT * FROM categorias WHERE id = $id;";
    $resultado = $db->query($sql);
    $row= $resultado->fetch(PDO::FETCH_ASSOC);
   
    
    $cat = $row['categoria'];
    echo $cat;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $categoria = $_POST['categoria'];
        $sql_in="UPDATE categorias SET categoria = '$categoria' WHERE id = '$id';";
        
        $resultado_in = $db->query($sql_in);
        if($resultado_in){
            header('location: /valecito2.0/');
        }
    }
    
}
else{
    echo "Error en la base de datos";
}

include '../../templates/header.php';

?>

<section class="ctn-form">
    <h3 class="title center">Crear Producto</h3>
    <form action="" method="post" class="formulario">

        <label for="categoria" class="label">Categoria:</label>
        <input type="text" name="categoria" id="categoria" class="input" value="<?php echo $cat ?>">
        
        <input type="submit" value="ACTUALIZAR" class="submit ">
        
    </form>
</section>
<?php

include '../../templates/footer.php';

?>