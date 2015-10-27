
<?php

  
    require '../kint/Kint.class.php';
    require '../Model/Excluir.class.php';

$nossa = $_GET["txtCPF"];



    $con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");
   
  
   // $stmt = $con->prepare("DELETE FROM `alunos` WHERE $nossa");
  $stmt = $con->prepare("DELETE  FROM alunos WHERE alunos.vchCPF = $nossa");
    


    $stmt->execute();

  




    //d($_POST,$con);

if($stmt->errorCode()>0){
        header("location: .././View/alunos/dados.php?strMsg=Erro de conexão no banco de dados&tipoMsg=erro");
    }else{
        header("location: .././View/alunos/dados.php?strMsg=Dados Excluidos com sucesso!&tipoMsg=sucesso");
    }



?>