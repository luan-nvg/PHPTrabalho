<?php

    require '../../kint/Kint.class.php';
    require '../../Model/Editar.class.php';

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

  $objEditar = new Editar();
  $nossa = $_GET["txtCPF"];
  

  


$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");



$stmt = $con->prepare("SELECT vchCPF,vchNome,vchEmaill,vchTelefone,tnyEstadoCivil FROM alunos WHERE alunos.vchCPF =?");
$stmt->bindValue(1,$nossa);
$stmt->execute();

$tabelaHtml = "<table class ='table table-striped'>";
  $tabelaHtml.="<tr>";

  $tabelaHtml.="<td>";
  $tabelaHtml.= "CPF ENCONTRADO NO BANCO DE DADOS";
  $tabelaHtml.="</td>";

  $tabelaHtml.="</tr>";
while($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)){
  
  $tabelaHtml.="<tr>";

  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchCPF;
  $tabelaHtml.="</td>";

  $tabelaHtml.="<td>";
  $campo2= $linhadoBancoDeDados->vchNome;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $campo3= $linhadoBancoDeDados->vchEmaill;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $campo4= $linhadoBancoDeDados->vchTelefone;
  
  $tabelaHtml.="</td>";

  $tabelaHtml.="<td>";
  $campo5= $linhadoBancoDeDados->tnyEstadoCivil;
  $tabelaHtml.="</td>";

  $tabelaHtml.="<td>";
  $campo1= $linhadoBancoDeDados->vchCPF;
  $tabelaHtml.="</td>";

  $tabelaHtml.="</tr>";
}
$tabelaHtml.="</table>";
 

?>


<html>
    <head>
        <title>Edição</title>
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

            <form action="../../Controller/EditadoController.php" method="post" >
                
              <div class="form-group">
                <label for="exampleInputNome">Nome</label>
                <input type="text" class="form-control" id="exampleInputNome" name="txtNome" placeholder="Nome" value="<?php echo $campo2; ?>">
              </div>
                
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="txtEmail" placeholder="Email" value="<?php echo $campo3; ?>">
              </div>
                
                
              <div class="form-group">
                <label for="exampleInputTel">Telefone</label>
                <input type="tel" class="form-control" id="exampleInputTel" name="txtTel" placeholder="Telefone" value="<?php echo $campo4; ?>">
              </div>
                
              <div class="form-group">
                <label for="exampleInputCPF">CPF</label>
                <input type="text" class="form-control" id="exampleInputCPF" name="txtCPF" placeholder="CPF" value="<?php echo $campo1; ?>">
              </div>
                
              <div class="form-group">
                <select class="form-control" name="estadoCivil" >
                 <?php 
                                            $opsSelect = "";
                                            
                                            switch($campo5){
                                                case '1':{
                                                            $opsSelect = " 
                                                    <option value='-1'>Selecione seu estado civil</option>
                                                    <option value='1' selected>Solteiro</option>
                                                    <option value='2'>Casado</option>
                                                    <option value='3'>Viúvo</option>  
                                                    <option value='4'>Divorciado</option>"
                                                    ;
                                                    break;
                                                }
                                                case '2':{
                                                                $opsSelect = " 
                                                    <option value='-1'>Selecione seu estado civil</option>
                                                    <option value='1'>Solteiro</option>
                                                    <option value='2' selected>Casado</option>
                                                    <option value='3'>Viúvo</option>  
                                                    <option value='4'>Divorciado</option>";
                                                    break;
                                                }
                                                case '3':{
                                                    
                                                                $opsSelect = " 
                                                    <option value='-1'>Selecione seu estado civil</option>
                                                    <option value='1'>Solteiro</option>
                                                    <option value='2'>Casado</option>
                                                    <option value='3'selected>Viúvo</option>  
                                                    <option value='4'>Divorciado</option>";
                                                    break;
                                                }
                                                case '4':{
                                                            $opsSelect = " 
                                                    <option value='-1'>Selecione seu estado civil</option>
                                                    <option value='1'>Solteiro</option>
                                                    <option value='2'>Casado</option>
                                                    <option value='3'>Viúvo</option>  
                                                    <option value='4' selected>Divorciado</option>";
                                                    break;
                                                        }
                                                default: {
                                                            $opsSelect = " 
                                                    <option value='-1'>Selecione seu estado civil</option>
                                                    <option value='1'>Solteiro</option>
                                                    <option value='2'>Casado</option>
                                                    <option value='3'>Viúvo</option>  
                                                    <option value='4'>Divorciado</option>";
                                                }
                                                    
                                            }
                                           
                                        ?>
                                        
                                        <?php echo $opsSelect; ?>                   
                </select>
              </div>
              <button type="submit" class="btn btn-default">Enviar novos dados</button>
              
            </form>
          

        </div>

    </body>
</html>

