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
    $sql_op = "SELECT * FROM categorias";
    $resultado_op = $db->query($sql_op);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $producto=$_POST['producto'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $sql_in="INSERT INTO menu (producto,precio,descripcion,categoriaid) VALUES ('$producto','$precio','$descripcion','$categoria');";
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
        <label for="producto" class="label">Producto:</label>
        <input type="text" id="producto" name="producto" class="input">
        <label for="precio" class="label">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" class="input">
        <label for="descripcion" class="label">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" class="input">
        <label for="categoria" class="label">Categoria:</label>
        <?php echo '<select name="categoria" class="input" id="categoria">' ?>
        <?php while($row = $resultado_op ->fetch(PDO::FETCH_ASSOC)): ?>
            <?php echo "<option value='" . $row['id'] . "'>" . $row['categoria'] . "</option>"; ?>
        <?php endwhile; ?>
        <?php echo '</select>' ?>
        <input type="submit" value="Guardar" class="submit ">
        
    </form>
</section>
<?php

include '../../templates/footer.php';

?>