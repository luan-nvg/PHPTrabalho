<?php
require '../../kint/kint.class.php';

$cid = $_GET["id"];
$cidades = "";

$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");

$stmt = $con->prepare("select * from cidade where cidade.estado = ?");
$stmt->bindvalue(1,$cid);
$stmt->execute();

$cidades="[";

while($ress = $stmt->fetch(PDO::FETCH_OBJ)){
   $cidades.= "{\"id\":\"$ress->id\",\"nome\":\"$ress->nome_cidade\"},";
}
$posicao = strlen($cidades);
$posicao--;
$cidades[$posicao] ="]";
//ddd($cidades);

?>
<?php echo $cidades; ?>