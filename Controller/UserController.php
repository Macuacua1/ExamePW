<?php

/**
 * Created by PhpStorm.
 * User: armandofm
 * Date: 31/03/16
 * Time: 01:50
 */
require_once("../Config/config.php");
require_once(ROOT_PATH."Model/User.php");
$g = $_GET;
$user = new User();
if(isset($g["accao"])){

    if($g["accao"] == "salvar"){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $dir = '../fotos/'; // upload directory

            if(!empty($_FILES['foto'])) {
                $img = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];


                //upload com a function random
                $final_image = rand(1000, 1000000) . $img;


                $dir = $dir . strtolower($final_image);

                if (move_uploaded_file($tmp, $dir)) {
                }
            }

            $p = $_POST;
            $user->setTelefone($p['username']);
            $user->setSenha($p['senha']);
            $user->setEmail($final_image);
            $user->salvar();
            header("location: ../View/index.php");

        }
    }
    if($g["accao"]=="editar"){

    }
    if($g["accao"]=="actualizar"){

        if (empty($_FILES['nova_foto']['name'])) {
            echo "";
        } else {

            $img = $_FILES['nova_foto']['name'];
            $tmp = $_FILES['nova_foto']['tmp_name'];

            $final_image = rand(1000, 1000000) . $img;


            $dir = $dir . strtolower($final_image);

            if (move_uploaded_file($tmp, $dir)) {
                echo "<img src='$dir' />";
            }
        }
        $cod_user = $p['cod_user'];
        $user->setTelefone($p['username']);
        $user->setSenha($p['senha']);
        $user->setEmail($final_image);

        $user->actualizar($cod_user);
        header("location: ../View/index.php");
    }
    if($g["accao"]=="apagar"){
        $cod_user = $g["id"];
        $user->apagar($cod_user);
        header("location: ../View/index.php");
    }
    if($g["accao"]=="listar"){


    }

}
?>