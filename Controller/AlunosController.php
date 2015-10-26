<?php

    require '../kint/Kint.class.php';
    require '../Model/Aluno.class.php';



    $objAluno = new Aluno();

    if(isset($_POST["txtNome"]) && $_POST["txtNome"] != ""){
        $objAluno->setNome($_POST["txtNome"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtEmail"]) && $_POST["txtEmail"] != ""){
        $objAluno->setEmail($_POST["txtEmail"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtTel"]) && $_POST["txtTel"] != ""){
        $objAluno->setTel($_POST["txtTel"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["txtCPF"]) && $_POST["txtCPF"] != ""){
        $objAluno->setCPF($_POST["txtCPF"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["sexo"]) && $_POST["sexo"] != ""){
        $objAluno->setSexo($_POST["sexo"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

    if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] != ""){
        $objAluno->setEstadoCivil($_POST["estadoCivil"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

        if(isset($_POST["estado"]) && $_POST["estado"] != ""){
        $objAluno->setEstado($_POST["estado"]);
    }else{
        header("location: ../View/alunos/add.php");
    }


 if(isset($_POST["cidade"]) && $_POST["cidade"] != ""){
        $objAluno->setCidade($_POST["cidade"]);
    }else{
        header("location: ../View/alunos/add.php");
    }

$pasta = "uploads/";
$caminho= $pasta. basename($_FILES['file']['name']);

$salvou= move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
//ddd($caminho,$salvou,$pasta);



 if(isset($caminho) && $caminho != ""){
        $objAluno->setFile($caminho);
    }else{
        header("location: ../View/alunos/add.php");
    }
//ddd($_FILES);fo

    $con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");
   
   $stmt = $con->prepare("insert into alunos(vchNome, vchTelefone, vchEmaill, vchCpf, bolSexo, tnyEstadoCivil,tnyEstado, tnyCidade,intMatricula,vchFile) values (?,?,?,?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bindValue(1, $objAluno->getNome());
    $stmt->bindValue(2, $objAluno->getTelefone());
    $stmt->bindValue(3, $objAluno->getEmail());
    $stmt->bindValue(4, $objAluno->getCpf());
    $stmt->bindValue(5, $objAluno->getSexo());
    $stmt->bindValue(6, $objAluno->getEstadoCivil());
    $stmt->bindValue(7, $objAluno->getEstado());
    $stmt->bindValue(8, $objAluno->getCidade());
    $stmt->bindValue(9, $objAluno->getMatricula());
    $stmt->bindValue(9+1, $objAluno->getFile());


    $stmt->execute();

    if ($stmt->errorCode() > 0) {
        header("location: ../View/alunos/add.php?strMsg=Erro ao inserir!&tipoMsg=2");
    }

    $ultimoId = $con->lastInsertId();
    $objAluno->setMatricula("2015$ultimoId");
    $stmtUpdate = $con->prepare("update alunos set intMatricula =? where idAluno =?");
    $stmtUpdate->bindValue(1, $objAluno->getMatricula());
    $stmtUpdate->bindValue(2, $ultimoId);
    $stmtUpdate->execute();

   //ddd($_POST, $objAluno,$con,$stmt);

    if($stmt->errorCode() > 0){
        d($stmt->errorInfo());
    }else{ 
        header("location: ../View/alunos/add.php?strMsg=Usuário inserido!&tipoMsg=1");
    }

   //  d($_POST, $objAluno,$con);
 //ddd($caminho,$salvou,$pasta);

 

/*/
 $pasta = "uploads/";
$caminho= $pasta. basename($_FILES['file']['name']);

$salvou= move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
ddd($caminho,$salvou,$pasta);

/*/



?>