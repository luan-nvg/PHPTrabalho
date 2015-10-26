<?php

    require '../kint/Kint.class.php';
    require '../Model/Pesquisar.class.php';



    $objPesquisar = new Pesquisar();
  $nossa = $_POST["txtCPF"];
    

    if(isset($_POST["txtCPF"]) && $_POST["txtCPF"] != ""){
        $objPesquisar->setCPF($_POST["txtCPF"]);
    }else{
        header("location: ../View/alunos/add.php");
    }



$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");



$stmt = $con->prepare("SELECT vchCPF FROM alunos WHERE alunos.vchCPF = $nossa");
$stmt->execute();

$tabelaHtml = "<table class ='table table-striped'>";
  $tabelaHtml.="<tr>";

  $tabelaHtml.="<td>";
  $tabelaHtml.= "CPF";
  $tabelaHtml.="</td>";

  $tabelaHtml.="</tr>";
while($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)){
  
  $tabelaHtml.="<tr>";

  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchCPF;
  $tabelaHtml.="</td>";

  $tabelaHtml.="</tr>";
}
$tabelaHtml.="</table>";

   


 /*/
    $stmt->bindValue(4, $objEditar->getCpf());


  
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

   //d($_POST, $objAluno,$con,$stmt);

    if($stmt->errorCode() > 0){
        d($stmt->errorInfo());
    }else{ 
        header("location: ../View/alunos/add.php?strMsg=Usuário inserido!&tipoMsg=1");
    }

     d($_POST, $objAluno,$con);
 /*/

  if($_POST["txtCPF"] == 1){
   d($_POST, $objPesquisar);
    }


 d($_POST, $objPesquisar);

?>


<html>
    <head>
        <title>Cadastro Aluno</title>
        <meta charset="utf-8">
        
        <script type="text/javascript" src="../../js/jquery/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/bootstrap-theme.css"/>
    </head>
    <body>
        <br/>
        <div class="container">
          
              <?php echo $tabelaHtml; ?>


        </div>

    </body>
</html>