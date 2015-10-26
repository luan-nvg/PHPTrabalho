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
        <title>Pesquisa</title>
        <meta charset="utf-8">
        
        <script type="text/javascript" src="../../js/jquery/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/bootstrap-theme.css"/>
    </head>
    <body>
        <br/>
        <div class="container">
          <?php if(isset($_GET["tipoMsg"])){ ?>
          <div class="alert <?php echo $classeAlert; ?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> <?php echo $msgTitulo; ?> </strong>&nbsp;<?php echo $_GET["strMsg"]; ?>
</div>
          <?php } ?>

            <form action="../../Controller/PesquisarController.php" method="post" >
                
                
              <div class="form-group">
                <label for="exampleInputCPF">Digite aqui um CPF para Pesquisar</label>
                <input type="text" class="form-control" id="exampleInputCPF" name="txtCPF" placeholder="CPF">
              </div>
                
            
              <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <a href = "listar.php"> Clique aqui para listar </a>
        </div>

    </body>
</html>

