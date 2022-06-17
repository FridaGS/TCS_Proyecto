<?php
	
	require 'conexion.php';
	
	session_start();

	if($_POST){
		$boleta = $_POST['Boleta'];
		$password = $_POST['password'];

        $sql = "SELECT id_usuario, nombre, email, telefono, password FROM usuario WHERE boleta='$boleta'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;

		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = sha1($password);
			
			if($password_bd == $pass_c){
				
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['nombre'] = $row['nombre'];
				
				header("Location: menu.php");
				
			} else {
                echo '<script language="javascript">alert("La contraseña no coincide");window.location.href="login.php"</script>';			
			}
			
			
			} else {
                echo '<script language="javascript">alert("No existe número de boleta");window.location.href="login.php"</script>';	}
}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar sesión - Alumno</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                <img src="img/logoescom.png" width="400" height="400">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <br> <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="Boleta" name="Boleta"
                                                placeholder="Boleta"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Contraseña"required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button></div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="registro.php">Crea una cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>