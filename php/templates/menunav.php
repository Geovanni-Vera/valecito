<?php

if ($connect) {
    $query = "SELECT * FROM categorias;";
    $resultado = $bd->query($query);
}


?>
<h2 class="center title">Menú</h2>
<!-- Categorías de snacks -->
<ul class="categories">
    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>
        <li>
            <a href="#<?php echo $row['categoria'] ?>" class="capitalize">
                <?php echo $row['categoria'] ?>
            </a>
        </li>
    <?php endwhile ?>
</ul>