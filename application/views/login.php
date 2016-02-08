<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema de Liquidaciones</title>

    <!-- Bootstrap core CSS -->
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <?php 
        
        if(isset($error)){
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        
        ?>
        <form class="form-signin" method="post" enctype="multipart/form-data" action="/login/verificar">
        <h2 class="form-signin-heading">Ingresar</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">ContraseÃ±a</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordarme
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->


  </body>
</html>
