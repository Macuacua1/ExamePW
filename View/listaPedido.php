<?php
include_once("../Controller/PedidoController.php");

session_start();
if ($_SESSION['username'] == null&& $_SESSION['password'] == null ) {
    header("location:login.php");
    exit;
}
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="../bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
     <script type="text/javascript" src="js/custom.js"></script>

    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <title>Listar Pedidos</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">Lista de Pedidos</h1>
    <div id="header">
        <div class="logout col-xs-3">
            <strong style="text-transform: uppercase"><?php  echo $_SESSION['username']?></strong>  <a class="btn btn-danger" href="../Config/terminarsessao.php" title="clique para terminar a sessão"
             onclick="return confirm('Deseja realmente sair ?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </div>
    </div>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->
    <form action="?accao=pesquisar&assunto=<?php echo $_POST['pesquisa']?>" class="navbar-form navbar-right" role="search" >
        <div class="form-group">
            <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-search"></span>
        </button>
    </form>

    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>Nome</th>
            <th> Telefone</th>
            <th>Assunto</th>
            <th>Mensagem</th>
            <th>Prioridade</th>
            <th>Estado</th>
            <th>Accao</th>
        </tr>
        </thead>

        <?php


      while($f = $listaPedidos->fetch_object()) //while look to fetch the result and store in a array $row.
        {
            $idpedido=$f->idpedido;
            $nome=$f->nome;
            $telefone=$f->telefone;
            $assunto=$f->assunto;
            $mensagem=$f->mensagem;
            $prioridade=$f->designacao;
            $estado=$f->estado;

           ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo  $nome;  ?></td>
            <td><?php echo $telefone;  ?></td>
            <td><?php echo  $assunto;  ?></td>
            <td><?php echo $mensagem;  ?></td>
            <td><?php echo $prioridade;  ?></td>
            <td><?php echo $estado;  ?></td>
            <td><a href="../Controller/PedidoController.php?accao=apagar&id=<?php echo  $idpedido ?>" title="Apagar Pedido"
                   onclick="return confirm('Deseja mesmo apagar o Pedido ?')"><button class="btn btn-danger">Apagar</button></a>|<a href="../View/editarPedido.php?accao=editar&id=<?php echo  $idpedido ?>"><button class="btn btn-primary">Editar</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        </div>
</div>


</body>

</html>
