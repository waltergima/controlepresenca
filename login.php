<?php
session_start();


	
 if($_POST['login'] == "admin" && $_POST['senha'] == "infoGAR2018@" )
 {	 
     $acesso = "autorizado";
     $_SESSION['acesso'] = $acesso;
     $_SESSION['login'] =  $_POST['login'];
     header("Location:home.php");
	 
 }
 else 
 {     
     header("Location:index.php");
 }
 
 

?>