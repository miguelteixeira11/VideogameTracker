<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$jogos_jogados = $jogo_preferido = "";
$jogos_jogados_err = $jogo_preferido_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate jogos_jogados
    if(empty(trim($_POST["jogos_jogados"]))){
        $jogos_jogados_err = "Por favor, indica um jogo.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM jogos WHERE jogos_jogados = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_jogos_jogados);
            
            // Set parameters
            $param_jogos_jogados = trim($_POST["jogos_jogados"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $jogos_jogados_err = "Este jogo já foi inserido.";
                } else{
                    $jogos_jogados = trim($_POST["jogos_jogados"]);
                }
            } else{
                echo "Ops, aconteceu um problema! Tenta novamente para ti!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate jogo_preferido
    if(empty(trim($_POST["jogo_preferido"]))){
        $jogo_preferido_err = "Por favor, introduza o seu jogo preferido! ";     
    } elseif(strlen(trim($_POST["jogo_preferido"])) < 0){
        $jogo_preferido_err = "O jogo tem de ter um nome!";
    } else{
        $jogo_preferido = trim($_POST["jogo_preferido"]);
    }
    
    // Check input errors before inserting in database
    if(empty($jogos_jogados_err) && empty($jogo_preferido_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO jogos (jogos_jogados, jogo_preferido) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_jogos_jogados, $param_jogo_preferido);
            
            // Set parameters
            $param_jogos_jogados = $jogos_jogados;
            $param_jogo_preferido = $jogo_preferido;
            
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
    <title>Os teus jogos!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 40px; }
    </style>
</head>
<body>
    <div class="wrapper" style="text-align: center; margin-left: auto; margin-right: auto;">
        <h2>Videojogos</h2>
        <p>Por favor, indica-nos os teus videojogos preferidos!</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($jogos_jogados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="jogos_jogados" class="form-control" placeholder="O teu primeiro jogo preferido..." value="<?php echo $jogos_jogados; ?>">
                <span class="help-block"><?php echo $jogos_jogados_err; ?></span>
	    <div class="form-group <?php echo (!empty($jogos_jogados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="jogos_jogados" class="form-control" placeholder="O teu segundo jogo preferido..." value="<?php echo $jogos_jogados; ?>">
                <span class="help-block"><?php echo $jogos_jogados_err; ?></span>

            <div class="form-group <?php echo (!empty($jogos_jogados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="jogos_jogados" class="form-control" placeholder="O teu terceiro jogo preferido..." value="<?php echo $jogos_jogados; ?>">
                <span class="help-block"><?php echo $jogos_jogados_err; ?></span>

	    <div class="form-group <?php echo (!empty($jogos_jogados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="jogos_jogados" class="form-control" placeholder="O teu quarto jogo preferido..." value="<?php echo $jogos_jogados; ?>">
                <span class="help-block"><?php echo $jogos_jogados_err; ?></span>

	    <div class="form-group <?php echo (!empty($jogos_jogados_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="jogos_jogados" class="form-control" placeholder="O teu quinto jogo preferido..." value="<?php echo $jogos_jogados; ?>">
                <span class="help-block"><?php echo $jogos_jogados_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($jogo_preferido_err)) ? 'has-error' : ''; ?>">
                <input type="jogo_preferido" name="jogo_preferido" class="form-control" placeholder="O teu jogo principal preferido..." value="<?php echo $jogo_preferido; ?>">
                <span class="help-block"><?php echo $jogo_preferido_err; ?></span>
            <div class="form-group">
                <input style="background-color: #C66C00; border-color: black" type="submit" class="btn btn-primary" value="Submeter">
                <input type="reset" class="btn btn-default" value="Resetar">
            </div>
        </form>
    </div>    
</body>
</html>