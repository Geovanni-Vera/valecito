<?php
require '../../config/database.php';
require '../../funciones/funciones.php';

$auth = estaAuth();

if(!$auth){
    header('location: /valecito2.0/');
}

$db = new Database("localhost", "elvalecito", "root", "root");
$conect = $db->connect();

$id = $_GET['id'];
$producto = "";
$precio = "";
$descripcion = "";
$categoria = "";
$categoriaId = "";

if ($conect) {
    $sql_op = "SELECT * FROM categorias ;";
    $resultado_op = $db->query($sql_op);
    

    $sql_id = "SELECT * FROM menu WHERE id = $id";
    $resultado_id = $db->query($sql_id);
    $row_menu = $resultado_id->fetch(PDO::FETCH_ASSOC);

    $producto = $row_menu['producto'];
    $precio = $row_menu['precio'];
    $descripcion = $row_menu['descripcion'];
   
    $categoriaId = $row_menu['categoriaId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $update = "UPDATE menu SET producto = '$producto', precio = '$precio', descripcion = '$descripcion', categoriaId = '$categoria' WHERE id = '$id'";
        $resultado_update = $db->query($update);
        if ($resultado_update) {
            header('location:/valecito2.0/php/admin/');
        }
    }
} else {
    die;
}

include '../../templates/header.php';
?>

<section class="ctn-form">
    <h3 class="title center">Actualizar Producto</h3>
    <form action="" method="post" class="formulario">
        <label for="producto" class="label">Producto:</label>
        <input type="text" id="producto" name="producto" class="input" value="<?php echo $producto; ?>">
        <label for="precio" class="label">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" class="input" value="<?php echo $precio; ?>">
        <label for="descripcion" class="label">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" class="input" value="<?php echo $descripcion; ?>">
        <label for="categoria" class="label">Categoria:</label>

        <select name="categoria" class="input" id="categoria">
            <?php while ($row = $resultado_op->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $categoriaId) echo 'selected'; ?>>
                    <?php echo $row['categoria']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Actualizar" class="submit">
    </form>
</section>

<?php
include '../../templates/footer.php';
?>