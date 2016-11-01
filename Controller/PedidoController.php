<?php
/**
 * Created by PhpStorm.
 * User: BELIEVE
 * Date: 07-Jul-16
 * Time: 2:19 AM
 */

include_once("../Model/Pedido.php");
include_once("../Model/Prioridade.php");

$pedido = new Pedido();
$prioridade = new Prioridade();
$listaP = $prioridade->buscarTodos();
$listaPedidos = $pedido->buscarTodos();
$pedido_edicao= null;
$ff=null;
$g = $_GET;
//$user = new User();
//$lista = $pedido->buscarTodos();
if($_POST){
    $p = $_POST;

    $pedido->setNome($p['nome']);
    $pedido->setEmail($p['email']);
    $pedido->setTelefone($p['telefone']);
    $pedido->setAssunto($p['assunto']);
    $pedido->setMensagem($p['mensagem']);
    $pedido->setEstado($p['estado']);
    $pedido->setIdusuario(1);
    $pedido->setIdprioridade($p['prioridade']);

    $pedido->salvar();

    header("location: ../View/index.php");

}
if(isset($g["accao"])) {



    if ($g["accao"] == "editar") {
        $pedido_edicao = $pedido->buscarPeloId($_GET["id"])->fetch_object();
    }
    if ($g["accao"] == "actualizar") {


        $p = $_POST;
        $id = $p['id'];
        $pedido->setNome($p['nome']);
        $pedido->setTelefone($p['telefone']);
        $pedido->setEstado($p['estado']);


        $pedido->actualizar($id);
        header("location: ../View/listaPedido.php");
    }
    if ($g["accao"] == "apagar") {
        $id = $g["id"];
        $pedido->apagar($id);
        header("location: ../View/listaPedido.php");
    }

    if ($g["pesquisa"]) {
        $assunto = $_POST["pesquisa"];
        $ff=$pedido->buscarPeloAssunto($assunto);
        echo "Cheguei aqui";
        header("location: ../View/listaPedido.php");
    }
}

?>