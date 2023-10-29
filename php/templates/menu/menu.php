<?php

if ($connect) {
    $query = "SELECT menu.*, categorias.categoria FROM menu INNER JOIN categorias ON menu.categoriaId = categorias.id ORDER BY categoriaId;";
    $resultado = $bd->query($query);

    $query_cat = "SELECT * FROM categorias";
    $result_categorias = $bd->query($query_cat);
    // Obtener todos los productos por categoría
    $productosPorCategoria = array();

    while ($menu = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $categoriaId = $menu['categoriaId'];
        if (!isset($productosPorCategoria[$categoriaId])) {
            $productosPorCategoria[$categoriaId] = array();
        }
        $productosPorCategoria[$categoriaId][] = $menu;
    }
   
}

?>

<?php while ($categoria = $result_categorias->fetch(PDO::FETCH_ASSOC)) : ?>
    <section class="mt-20" id="<?php echo $categoria['categoria'] ?>">
        <h3 class="center title"><?php echo $categoria['categoria'] ?></h3>
        <div class="grid">
            <?php if (isset($productosPorCategoria[$categoria['id']])) : ?>
                <?php foreach ($productosPorCategoria[$categoria['id']] as $producto) : ?>

                    <!-- Listado de productos -->
                    <div class="ctn">
                        <h4 class="capitalize"><?php echo $producto['producto'] ?> <span class="sp-yellow">$<?php echo $producto['precio'] ?></span></h4>
                        <p class="descripcion"><?php echo $producto['descripcion'] ?></p>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endwhile; ?>
