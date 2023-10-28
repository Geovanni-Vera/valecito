<?php

if ($connect) {
    $query = "SELECT * FROM menu WHERE categoriaid = 3;";
    $resultado = $bd->query($query);
}

?>
<section id="alitas">
    <h3 class="center class title">Alitas</h3>
    <div class="grid">
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>

            <!-- Listado de hamburguesas -->
            <div class="ctn alitas-ctn">
                <h4 class="capitalize"><?php echo $row['producto'] ?> <span class="sp-yellow">$<?php echo $row['precio'] ?></span></h4>
                <p class="descripcion capitalize"><?php echo $row['descripcion'] ?></p>
            </div>

        <?php endwhile; ?>
    </div>
</section>