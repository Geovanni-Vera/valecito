<?php
require "php/config/database.php";
include 'php/funciones/funciones.php';

$errores = [];
$db = new Database("localhost", "elvalecito", "root", "root");
$conect = $db->connect();
if ($conect) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errores = [];
        $email = $db->miQuote(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = $_POST['password'];

        if(!$email){
            $errores[]="El correo viene vacio";
        }

        if(!$password){
            $errores[]="La contraseña viene vacio";
        }

        if (empty($errores)) {
            //buscar el usuario en la base de datos
            $sql = "SELECT * FROM usuarios WHERE user = $email ;";
            $usuario_resul = $db->query($sql);
            $num_row = $db->rowCount($usuario_resul);

            if ($num_row > 0) {
                //validamos la contraseña
                
                $pasdb = $usuario_resul -> fetch(PDO::FETCH_ASSOC);
                $auth = password_verify($password,$pasdb['password']);
                if($auth){
                    session_start();
                    $_SESSION["usuario"]=$pasdb['user'];
                    $_SESSION["name"]=$pasdb['name'];
                    $_SESSION["login"]=true;
                    
                    header('location:/valecito2.0/php/admin/index.php');
                    
                }else{
                    $errores[] = "Contraseña Invalida"; 
                }
            } else {
                $errores[] = "Usuario Invalido";
            }
        }
    }
}

include 'php/templates/header.php';
?>


<section class="ctn-form">
    <?php foreach ($errores as $error) : ?>
        <p class="alerta error"><?php echo $error ?></p>
    <?php endforeach; ?>
    <form action="" method="post" class="formulario">
        <h2 class="center c-white">Iniciar Sesion </h2>
        <label for="email" class="center label">Email:</label>
        <input type="email" name="email" id="email" class="input">
        <label for="password" class="center label">Contraseña:</label>
        <input type="password" name="password" id="password" class="input">
        <input type="submit" value="Iniciar Sesion" class="submit" class="input">
    </form>
</section>



<?php
include 'php/templates/footer.php';
?>