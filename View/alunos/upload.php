<?php

require '../../kint/Kint.class.php';

//ddd($_FILES);fo



$pasta = "uploads/";
$caminho= $pasta. basename($_FILES['file']['name']);

$salvou= move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
ddd($caminho,$salvou,$pasta);

?>




<img src="uploads/Coala.jpg" width="200">
