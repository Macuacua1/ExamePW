<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="../bootstrap-3.2.0-dist\css\bootstrap.css">
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>
    <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>


    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>

                                         <p>
                                            <label for="remember">
                                                <input type="checkbox" name="remember" id="remember" value="1" /> Remember me
                                            </label>
                                         </p>
								  
								<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >
								          <!--<a href= "registration.php" align='center'>Registe-se</a>-->
								 
                                  
								  
                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>


<?php
/**
 * Created by PhpStorm.
 * User: BELIEVE
 * Date: 13-Jul-16
 * Time: 11:55 PM
 */

include_once("../Model/User.php");
$user = new User();

$controle = false;

if (isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])
) {
    $_SESSION['valid'] = false;
    $_SESSION['timeout'] = null;
    $_SESSION['username'] = null;

    $result = $user->buscarTodos();
    while ($row = mysqli_fetch_array($result)) {
        if ($_POST['username'] == $row['username'] &&
            $_POST['password'] == $row['password']
        ) {


            session_start();

            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $controle = true;
            echo '<script type="text/javascript">';
            echo 'setTimeout(function(){ swal({title:"Logado", text:"Usuario Logado com Sucesso", type:"success",timer:2000});';
            echo	'},1000)</script>';


        }
    }
    if (!$controle) {

        echo '<script type="text/javascript">';
        echo 'setTimeout(function(){ swal({title:"Erro", text:"Usuario ou senha invalido", type:"error",timer:2000});';
        echo	'},1000)</script>';

    } else {
        header("location:listaPedido.php");
        exit;

    }


}
?>
