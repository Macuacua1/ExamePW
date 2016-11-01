
<!DOCTYPE HTML>
<html>
<head>
    <?php
    require_once("../Controller/PedidoController.php");
    ?>
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
                <h2 class="panel-title">Registo</h2>
            </div>
            <div class="panel-body">

                <form id="formulario" name="formulario" action="?accao=actualizar" method="post">
                    <title>Registo de Pedidos</title>
                    <fieldset class="yap">
                        <input name="id" type="hidden" class="ed" value="<?php echo $pedido_edicao->idpedido;  ?>"/>
                        <input class="form-control" placeholder="Nome" id="nome" name="nome" type="text" value="<?php echo $pedido_edicao->nome;?>">
                        <br/>


                        <input name="email" class="form-control" type="email"  placeholder="Email" value="<?php echo $pedido_edicao->email;?>" disabled/>
                        <br>

                        Telefone <br/>
                        <input class="form-control"name="telefone" type="number"  placeholder="Contacto" value="<?php echo $pedido_edicao->telefone;?>"/>
                        <br>

                        <input name="assunto" class="form-control" type="text"  placeholder="Assunto" value="<?php echo $pedido_edicao->assunto;?>" disabled/>
                        <br/>

                        <input name="estado" class="form-control" type="text"  placeholder="Estado" value="<?php echo $pedido_edicao->estado;?>"/>
                        <br/>

                        Prioridade<br/>

                        <select name="prioridade" form="formulario"  class="form-control" disabled>
                           <option value=""><?php echo $pedido_edicao->designacao;?></option>

                        <?php

                           while($f = $listaP->fetch_object()) {
                               if($f->designacao!=$pedido_edicao->designacao){
                               ?>

                               <option><?php echo $f->designacao; ?></option>
                              <?php

                           }
                        }
                            ?>

                        </select>

                        <br/>
                        Mensagem<br/>
                        <textarea name="mensagem" rows="4" cols="40"  class="form-control" disabled><?php echo $pedido_edicao->mensagem;?></textarea>
                        <br/>
                        <input class="btn btn-lg btn-success btn-block" type="submit" placeholder="Registar" name="registar" id="botao">
                </form>


            </div>
        </div>
    </div>
</div>



</body>
</html>