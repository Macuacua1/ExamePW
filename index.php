<!DOCTYPE HTML>
<?php
include_once("../Controller/DocumentoController.php");
/*session_start();
if ($_SESSION['telefone'] == null) {
    header("location:logini.php");
    exit;
}*/
?>


<html>
<head>
 
<script type="text/javascript" src="js/jquery-1.12.3.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" src="js/sweetalert.min.js"></script>
   <meta charset="utf-8">
    <title>Tobusco Software</title>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
 
    <link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <script src="../lib/jquery.js" type="text/javascript"></script>
    <script src="../src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: '../src/loading.gif',
                closeImage: '../src/closelabel.png'
            })
        })
    </script>

</head>
<body>



<div id="main">
    <div id="header"><i><strong>Tobusco Software</strong></i>
        <div class="logout col-xs-3">
            <strong style="text-transform: uppercase"><?php  echo $_SESSION['telefone']?></strong>  <a class="btn btn-danger" href="Config/terminarsessao.php" title="clique para terminar a sessão"
               onclick="return confirm('Deseja realmente sair ?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </div>
    </div>

    <div id="content">

        <a rel="facebox" href="adicionardocumento.php" id="addq">Registar Documento</a>
        <div class="table-responsive">
            <table class="table-hover table-bordered" id="resultTable">
                <thead>
                <tr>
                    <th style="border-left: 1px solid #C1DAD7"> Acções</th>
                    <th> Nr do Documento</th>
                    <th> Cor</th>
                    <th> Tipo</th>
                    <th> fotografia</th>

                </tr>
                </thead>
                <tbody>
                <?php

                $result = $documento->buscarTodosPorUser(1);
                while ($row = mysqli_fetch_object($result)) {
                    echo '<tr class="registo">';
                    echo '<td><div align="center"><a href="?accao=apagar&id=' . $row->id . '" id="' . $row->id . '" class="buttonRemover" title="Clique para Apagar" >Remover</a> | <a rel="facebox" href="../View/editardocumento.php?accao=editar&id=' . $row->id . '" >Editar</a></div></td>';
                    echo '<td  style="border-left: 1px solid #C1DAD7">' . $row->nr . '</td>';
                    echo '<td><div>' . $row->cor . '</div></td>';
                    echo '<td><div>' . $row->tipo. '</div></td>';
                    echo '<td><div id="preview" align="center">  <img src="../fotos/' . $row->foto . '" class="img-rounded" alt="No-image" /> </div></td>';

                }


                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="footer"></div>
</div>
<script src="js/jquery.js"></script>
<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!---->
<!---->
<!--        $(".buttonRemover").click(function () {-->
<!---->
<!---->
<!--            var elemento = $(this);-->
<!---->
<!---->
<!--            var del_id = elemento.attr("id");-->
<!---->
<!--            var info = 'id='+del_id;-->
<!--            if (confirm("Deseja realmente remover o documento?")) {-->
<!---->
<!--                $.ajax({-->
<!--                    type: "GET",-->
<!--                    url: "index.php",-->
<!--                    data: info,-->
<!--                    success: function () {-->
<!---->
<!--                    }-->
<!--                });-->
<!--                $(this).parents(".registo").animate({backgroundColor: "#fbc7c7"}, "fast")-->
<!--                    .animate({opacity: "hide"}, "slow");-->
<!---->
<!--            }-->
<!---->
<!--            return false;-->
<!---->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->


</body>
</html>
