<!DOCTYPE html>
<html>
<head>
<script src="myScript.js"></script>
<script src="jquery-3.5.1.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Videogame Tracker</title>
</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#" id="Home">Início</a>
  <a href="#" id="Jogos">Jogos</a>
  <a href="#" id="Consolas">Consolas</a>
  <a href="#" id="SobreNos">Sobre Nós...</a>
  <a href="#" id="Contactos">Contactos</a>
</div>

<!-- Use any element to open the sidenav -->

<div class="container1" onclick="openNav()">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>

<div>
  <a href="welcome.php" ><img src="login.png" alt="Login icon"; class="cantod"></a>
</div>

<div id="main" >
	<img src="logo.png" alt="Videogame Tracker"; class="center">
	<script>
	$(document).ready(function(){
		$("#Jogos").click(function(){
			$("#div1").load("register_game.php");
		});
	});

	$(document).ready(function(){
		$("#Consolas").click(function(){
			$("#div1").load("register_console.php");
		});
	});
	
	$(document).ready(function(){
		$("#SobreNos").click(function(){
			$("#div1").load("Sobrenos.php");
		});
	});
	
	$(document).ready(function(){
		$("#Contactos").click(function(){
			$("#div1").load("Contactos.php");
		});
	});
	
	$(document).ready(function(){
		$("#Home").click(function(){
			$("#div1").load("nada.html");
		});
	});
	
	</script> 
	<div style="padding: 50px" id="div1">
	</div>
	<div style="text-align: center">
		<?php include 'index.php'; ?>
	</div>
</div>

</body>
</html>