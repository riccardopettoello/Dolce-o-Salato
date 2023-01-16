<?php
$json_file = file_get_contents('dolceSalato.json');
$scelte = json_decode($json_file, true);

$res = $_POST['scelta'];

//var_dump($_POST);
//die();

$keys = array_keys($scelte);


foreach ($keys as $key):
    if($scelte[$key]["scelta"] == $res){
        $scelte[$key]["valore"] = $scelte[$key]["valore"] + 1;
    }
    endforeach;

$json_file_new = json_encode($scelte);
file_put_contents('dolceSalato.json', $json_file_new);

header("Location: pagina2.php");
exit();

?>