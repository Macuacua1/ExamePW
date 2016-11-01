
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
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>


   <script type="text/javascript">
        $(document).ready(function()
        {

            $(document).on('submit', '#formulario', function()
            {

                //var fn = $("#fname").val();
                //var ln = $("#lname").val();

                //var data = 'fname='+fn+'&lname='+ln;

                var data = $(this).serialize();


                $.ajax({

                    type : 'POST',
                    url  : '../Controller/PedidoController.php',
                    data : data,
                    success :  function(data)
                    {
                        $("#formulario").fadeOut(500).hide(function()
                        {
                            $(".result").fadeIn(500).show(function()
                            {
                                $(".result").html(data);
                            });
                        });

                    }
                });
                return false;
            });
        });
    </script>
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

                <form id="formulario"  method="post">
                    <title>Registo de Pedidos</title>
                    <fieldset class="yap">

                        <input class="form-control" placeholder="Nome" id="nome" name="nome" type="text" autofocus>
                        <br/>


                        <input name="email" class="form-control" type="email"  placeholder="Email" required/>
                        <br>

                        Telefone <br/>
                        <input class="form-control"name="telefone" type="number"  placeholder="Contacto"/>
                        <br>

                        <input name="assunto" class="form-control" type="text"  placeholder="Assunto"/>
                        <br/>

                        <input name="estado" class="form-control" type="text"  placeholder="Estado"/>
                        <br/>

                        Prioridade<br/>

                        <select name="prioridade" form="formulario"  class="form-control">
<!--                            <option value="">rryyyrryr</option>-->

                            <?php //$con=new conexao();

                                while($f = $listaP->fetch_object()) {
                                    ?>

                                    <option value="<?php echo $f->idprioridade; ?>"><?php echo $f->designacao; ?></option>
                                    <?php

                                }

                            ?>

                        </select>

                        <br/>
                        Mensagem<br/>
                        <textarea name="mensagem" rows="4" cols="40"  class="form-control" data-validate-length-range="6" data-validate-words="2" required ></textarea>
                        <br/>
                        <input class="btn btn-lg btn-success btn-block" type="submit" placeholder="Registar" name="registar" id="botao">
                </form>


            </div>
        </div>
   </div>
    </div>
<script type="text/javascript" src="../js/validate.js"></script>
<!-- validator -->
<script>
    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        return false;
    });
</script>


</body>
</html>