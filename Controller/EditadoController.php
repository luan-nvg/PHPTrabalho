
<?php

  
    require '../kint/Kint.class.php';
    require '../Model/Editar.class.php';

$nossa=$_POST["txtCPF"];




// atenção !!!!!!!!!!!!!! eu mudei o método de tranerencia dos dados de $_GET para $_POST

  $objEditar = new Editar();

    if(isset($_POST["txtNome"]) && $_POST["txtNome"] != ""){
        $objEditar->setNome($_POST["txtNome"]);
    }else{
        //header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtEmail"]) && $_POST["txtEmail"] != ""){
        $objEditar->setEmail($_POST["txtEmail"]);
    }else{
       // header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtTel"]) && $_POST["txtTel"] != ""){
        $objEditar->setTel($_POST["txtTel"]);
    }else{
       // header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtCPF"]) && $_POST["txtCPF"] != ""){
        $objEditar->setCPF($_POST["txtCPF"]);
         //$nossa->setCPF($_POST["txtCPF"]);
    }else{
       // header("location: ../View/alunos/add.php");
    }
    

    if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] != ""){
        $objEditar->setEstadoCivil($_POST["estadoCivil"]);
    }else{
       // header("location: ../View/alunos/add.php");
    }

    $con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");
   
  
    $stmt = $con->prepare("update alunos set vchNome =?,vchTelefone =?,vchEmaill =?,vchCpf =?,tnyEstadoCivil =? WHERE alunos.vchCPF = ?");
    $stmt->bindValue(1, $objEditar->getNome());
    $stmt->bindValue(2, $objEditar->getTelefone());
    $stmt->bindValue(3, $objEditar->getEmail());
    $stmt->bindValue(4, $objEditar->getCpf());
    $stmt->bindValue(5, $objEditar->getEstadoCivil());
    $stmt->bindValue(6,$nossa);
    


    $stmt->execute();


    if($stmt->errorCode()>0){
        header("location: .././View/alunos/dados.php?strMsg=Erro de conexão no banco de dados&tipoMsg=erro");
    }else{
        header("location: .././View/alunos/dados.php?strMsg=Dados Editados com sucesso!&tipoMsg=sucesso");
    }



?>