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

$stmt = $con->prepare("select * from Estado");
$stmt->execute();
$opcoesEstado = "";
while ($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)) {
  $opcoesEstado .="<option value='".$linhadoBancoDeDados->id."'>".$linhadoBancoDeDados->descricao."</option>";
}
?>


<html>
<head>
  <title>Cadastro Aluno</title>
  <meta charset="utf-8">

  <script type="text/javascript" src="../../js/jquery/jquery-2.1.4.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../css/bootstrap.css"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.css"/>
  <script type="text/javascript" src="../../js/funcaos.js"></script>
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

    <form action="../../Controller/AlunosController.php" method="post" enctype="multipart/form-data" >

      <div class="form-group">
        <label for="exampleInputNome">Nome</label>
        <input type="text" class="form-control" id="exampleInputNome" name="txtNome" placeholder="Nome">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="txtEmail" placeholder="Email">
      </div>


      <div class="form-group">
        <label for="exampleInputTel">Telefone</label>
        <input type="number" class="form-control" id="exampleInputTel" name="txtTel" placeholder="Telefone">
      </div>

      <div class="form-group">
        <label for="exampleInputCPF">CPF</label>
        <input type="text" class="form-control" id="exampleInputCPF" name="txtCPF" placeholder="CPF">
      </div>

      <div class="form-group">
        <select class="form-control" name="estadoCivil">
          <option value="-1">Selecione o Estado Civil</option>
          <option value="1">Solteiro</option>
          <option value="2">Casado</option>
          <option value="3">Viúvo</option>
          <option value="4">Divorciado</option>                    
        </select>
      </div>             

      <div class="form-group">
        <select class="form-control" name="sexo">
          <option value="-1">Selecione o Sexo</option>
          <option value="1">Masculino</option>
          <option value="0">Feminino</option>
        </select>
      </div>

      <div class="form-group">
        <label for="estado">Estado</label>
        <select class="form-control" id="comboEstado" name="estado" onchange="getCities();">
          <option value="-1">Selecione o estado</option>
          <?php echo $opcoesEstado  ?>

        </select>
      </div>
      <div class="form-group">
        <label for="cidade">Cidade</label>
        <select class="form-control" id="comboCidade" name="cidade" >
          <option value="-1">Selecione o estado primeiro</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile" name="file">
        <p class="help-block">Escolha uma Foto.</p>
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <a href = "principal.php"> Principal </a><br>

  </div>

</body>
</html>

