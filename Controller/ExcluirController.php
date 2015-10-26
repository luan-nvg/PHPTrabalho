
<?php

  
    require '../kint/Kint.class.php';
    require '../Model/Excluir.class.php';

$nossa = $_GET["txtCPF"];



    $con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");
   
  
   // $stmt = $con->prepare("DELETE FROM `alunos` WHERE $nossa");
  $stmt = $con->prepare("DELETE  FROM alunos WHERE alunos.vchCPF = $nossa");
    


    $stmt->execute();

  


   

  

    d($_POST,$con);

?>