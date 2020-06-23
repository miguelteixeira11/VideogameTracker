<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$sistemas_usados = $sistema_preferido = "";
$sistemas_usados_err = $sistema_preferido_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate jogos_jogados
    if(empty(trim($_POST["sistemas_usados"]))){
        $sistemas_usados_err = "Por favor, indica um sistema (PC ou Consola, e que Consola foi).";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM sistemas WHERE sistemas_usados = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_sistemas_usados);
            
            // Set parameters
            $param_sistemas_usados = trim($_POST["sistemas_usados"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $sistemas_usados_err = "Este sistema já foi inserido.";
                } else{
                    $sistemas_usados = trim($_POST["sistemas_usados"]);
                }
            } else{
                echo "Ops, aconteceu um problema! Tenta novamente para ti!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate sistema_preferido
    if(empty(trim($_POST["sistema_preferido"]))){
        $sistema_preferido_err = "Por favor, introduza o seu sistema preferido! ";     
    } elseif(strlen(trim($_POST["sistema_preferido"])) < 0){
        $sistema_preferido_err = "O sistema tem de ter um nome!";
    } else{
        $sistema_preferido = trim($_POST["sistema_preferido"]);
    }
    
    // Check input errors before inserting in database
    if(empty($sistema_preferido_err) && empty($sistema_preferido_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO sistemas (sistemas_usados, sistema_preferido) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_sistemas_usados, $param_sistema_preferido);
            
            // Set parameters
            $param_sistemas_usados = $sistemas_usados;
            $param_sistema_preferido = $sistema_preferido;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to homepage
                header("location: Home.php");
            } else{
                echo "Ocorreu um erro, por favor, tenta novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Os teus sistemas!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 40px; }
    </style>
</head>
<body>
    <div class="wrapper" style="text-align: center; margin-left: auto; margin-right: auto;">
        <h2>Sistemas</h2>
        <p>Por favor, indica-nos os teus sistemas preferidos!</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($sistemas_usados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="sistemas_usados" class="form-control" placeholder="O teu primeiro sistema preferido..." value="<?php echo $sistemas_usados; ?>">
                <span class="help-block"><?php echo $sistemas_usados_err; ?></span>
	    <div class="form-group <?php echo (!empty($sistemas_usados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="sistemas_usados" class="form-control" placeholder="O teu segundo sistema preferido..." value="<?php echo $sistemas_usados; ?>">
                <span class="help-block"><?php echo $sistemas_usados_err; ?></span>

            <div class="form-group <?php echo (!empty($sistemas_usados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="sistemas_usados" class="form-control" placeholder="O teu terceiro sistema preferido..." value="<?php echo $sistemas_usados; ?>">
                <span class="help-block"><?php echo $sistemas_usados_err; ?></span>

	    <div class="form-group <?php echo (!empty($sistemas_usados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="sistemas_usados" class="form-control" placeholder="O teu quarto sistema preferido..." value="<?php echo $sistemas_usados; ?>">
                <span class="help-block"><?php echo $sistemas_usados_err; ?></span>

	    <div class="form-group <?php echo (!empty($sistemas_usados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="sistemas_usados" class="form-control" placeholder="O teu quinto sistema preferido..." value="<?php echo $sistemas_usados; ?>">
                <span class="help-block"><?php echo $sistemas_usados_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($sistema_preferido_err)) ? 'has-error' : ''; ?>">
                <input type="sistema_preferido" name="sistema_preferido" class="form-control" placeholder="O teu sistema principal preferido..." value="<?php echo $sistema_preferido; ?>">
                <span class="help-block"><?php echo $sistema_preferido_err; ?></span>
            <div class="form-group">
                <input style="background-color: #C66C00; border-color: black" type="submit" class="btn btn-primary" value="Submeter">
                <input type="reset" class="btn btn-default" value="Resetar">
            </div>
        </form>
    </div>    
</body>
</html>