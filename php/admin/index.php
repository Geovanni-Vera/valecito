<?php
require '../config/database.php';
require '../funciones/funciones.php';

$auth = estaAuth();

if(!$auth){
    header('location: /valecito2.0/index.php');
}
include '../templates/header.php';


$db = new Database("localhost", "elvalecito", "root", "root");
$conect = $db->connect();
if ($conect) {
    $sql_menu = "SELECT * FROM menu ORDER BY categoriaId";
    $result_menu = $db->query($sql_menu);

    $sql_cat = "SELECT * FROM categorias;";
    $resultado_categorias = $db->query($sql_cat);
}
?>
<section class="contenedor bg-yellow">
    <h3 class="title center">Productos</h3>
    <a href="/valecito2.0/php/admin/crud/crear.php" class="btn-verde">Crear nuevo Producto</a>
    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA ID</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <!--Muestra los resultados de la bd-->
            <?php while ($row = $result_menu->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['producto']; ?></td>

                    <td>$<?php echo $row['precio']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['categoriaId']; ?></td>
                    <!-- BOTONES -->
                    <td>
                        <form action="./crud/borrar.php" method="POST" class="w-100">
                            <input type="hidden" name="tabla" value="menu">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                    </td>
                    <td>
                        <a href="/valecito2.0/php/admin/crud/actualizar.php?id=<?php echo $row['id'] ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>

    <h3 class="title center">Categorias</h3>
    <a href="/valecito2.0/php/admin/crud/crear-categoria.php" class="btn-verde">Crear nueva Categoria</a>
    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <!--Muestra los resultados de la bd-->
            <?php while ($row = $resultado_categorias->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>

                    
                    <!-- BOTONES -->
                    <td>
                        <form action="./crud/borrar.php" method="POST" class="w-100">
                            <input type="hidden" name="tabla" value="categorias">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                    </td>
                    <td>
                        <a href="/valecito2.0/php/admin/crud/actualizar-categoria.php?id=<?php echo $row['id'] ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
</section>
<?php

include '../templates/footer.php';

?>