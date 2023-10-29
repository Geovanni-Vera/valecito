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
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id=$_POST['id'];
            $tabla = $_POST['tabla'];      
            $sql="DELETE FROM $tabla WHERE id = $id;";

            $resultado = $db->query($sql);
            if($resultado){
                header('location: /valecito2.0/php/admin/');
            }
            
        }
    }
