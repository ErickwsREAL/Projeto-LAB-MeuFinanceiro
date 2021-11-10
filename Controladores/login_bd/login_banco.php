<?php
	  /**
	   * Logar ao Banco MeuFinanceiro
	   */

       //require_once '../connect.php';
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "sistema financeiro"; //alterar caso necessário

	   $conn = new mysqli($servername, $username, $password, $dbname);

       if ($conn->connect_error) {
    	   die("Connection failed: " . $conn->connect_error);
       }
     	  //echo "Connected successfully";

?>
