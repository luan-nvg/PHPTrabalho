<?php

require '../../kint/Kint.class.php';

//Assunto Secção
session_start();
//ddd $_GET);
$_SESSION["nome"] = "William";
$_SESSION["01"] = "Leandro";




$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");

$stmt = $con->prepare("select * from alunos");
$stmt->execute();

$tabelaHtml = "<table class ='table table-striped'>";
  $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "id";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "NOME";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "TELEFONE";
  $tabelaHtml.="</td>";
  $tabelaHtml.="</tr>";
while($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)){
  
  $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->idAluno;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchNome;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchTelefone;
  $tabelaHtml.="</td>";
  $tabelaHtml.="</tr>";
}
$tabelaHtml.="</table>";

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

              <?php echo $_SESSION["nome"]; ?>
              <?php echo $_SESSION["01"];?>
              


        </div>

    </body>
</html>



