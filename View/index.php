
<!DOCTYPE HTML>


<html>
<head>

    <title>  Registo de Pedidos </title>
    <link rel="stylesheet" href="../css/estilo.css">

    <link rel="stylesheet" href="../css/sweetalert.css">
    <link type="text/css" rel="stylesheet" href="../bootstrap-3.2.0-dist\css\bootstrap.css">
    <style>

        body{
            background: gray;
            margin:0px auto;

        }

        .form-control{
            width:100%;
            /*background: gray;*/
            font-family:sans-serif;
        }
    </style>
</head>
<body>

<div class="row"><!-- row class is used for grid system in Bootstrap-->
    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
        <div id="erro"></div>

        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title">Sistema de Gestao de Pedidos </h2>
            </div>
            <div class="panel-body">


                   <a href="../View/registarPedido.php"><button class="btn btn-lg btn-success btn-block" name="pedir" id="botao">Fazer Pedidos</button></a></br>
                   <a href="listaPedido.php"><button class="btn btn-lg btn-success btn-block" name="listar">Listar Pedidos</button></a>


            </div>
        </div>
    </div>
</div>



</body>
</html>