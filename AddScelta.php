<?php
$json_file = file_get_contents('dolceSalato.json');
$data = json_decode($json_file, true);

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$scelta = $_POST['scelta'];

$data[] = array(
    'nome' => "$nome",
    'cognome' => "$cognome",
    'scelta' => "$scelta"
);

$json_file_new = json_encode($data);
file_put_contents('dolceSalato.json', $json_file_new);

header("Location: pagina2.php");
exit();

?>