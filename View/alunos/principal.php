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


?>


<html>
    <head>
        <title>Menu Principal</title>
        <meta charset="utf-8">
        
        <script type="text/javascript" src="../../js/jquery/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/bootstrap-theme.css"/>
    </head>
    <body>
 
        
            
                    
                   
                    
       <div class="bg-primary">
  <h1>Hello, Cliente!</h1>
  <p>Seja Bem Vindo a Animus</p>

</div>
<br>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="add.php">Cadastre-se</a></li>
  <li role="presentation" class="active"><a href="dados.php">Dados User</a></li>
  <li role="presentation" class="active"><a href="pesquisar.php">Pesquisar</a></li>
  <li role="presentation" class="active"><a href="excluir.php">Excluir</a></li>
</ul>
 
    </body>
</html>
