<?php

require '../../kint/Kint.class.php';
//ddd ($_GET);

/* codigo de erros/sucessos no submit */

if(isset($_GET["tipoMsg"])){ 
  $classeAlert = "";
  $msgTitulo = "";
if($_GET["tipoMsg"] == "2"){
  $classeAlert = "alert-danger";
  $msgTitulo = "Erro";

}
else if($_GET["tipoMsg"] == "1"){
  $classeAlert = "alert-success";
  $msgTitulo = "Sucesso";
  }
}

$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");

$stmt = $con->prepare("select * from alunos");
$stmt->execute();

$tabelaHtml = "<table class ='table table-striped'>";
  $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "CPF";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "NOME";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "TELEFONE";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "EXCLUIR";
  $tabelaHtml.="</td>";
  $tabelaHtml.="</tr>";
while($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)){
  
  $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchCPF;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchNome;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchTelefone;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= '<a ';
  $tabelaHtml.="class='btn btn-warning'";
  $tabelaHtml.= "href='../../Controller/ExcluirController.php?txtCPF=$linhadoBancoDeDados->vchCPF'> Excluir </a>";
  $tabelaHtml.="</td>";
  $tabelaHtml.="</tr>";
}
$tabelaHtml.="</table>";


?>


<html>
    <head>
        <title>Excluir</title>
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
            


          <?php if(isset($_GET["tipoMsg"])){ ?>
          <div class="alert <?php echo $classeAlert; ?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> <?php echo $msgTitulo; ?> </strong>&nbsp;<?php echo $_GET["strMsg"]; ?>
</div>
          <?php } ?>



           
        </div>

    </body>
</html>

