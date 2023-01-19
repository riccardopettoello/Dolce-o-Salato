<?php

session_start();

$json = file_get_contents('dolceSalato.json');
$scelte = json_decode($json, true);

$data = array();

$dolce = 0;
$salato = 0;
foreach ($scelte as $preferenza) {
    if($preferenza["scelta"] == "dolce") {
        $dolce = $dolce + 1;

    }
    if($preferenza["scelta"] == "salato") {
        $salato = $salato + 1;

    }
}

if(!isset($_SESSION['auth'])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Dolce o Salato? - ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        
        table, th, td {
            border: 1px solid black;
        }
        .p{
            text-align: center;
            font-style: italic;
            font-size: 25px;
        }
        div{
            margin: 25px; 
        } 
        
    </style>
</head>
<body>
<br>
<p class="p">Benvenuto nella schermata di admin</p>
<iframe src="grafico.php" frameborder="0" width="500px" height="500px"></iframe>
<div>
    <br>
    <table class="table">
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Scelta</th>
        </tr>
        <tr>
            <?php
                foreach ($scelte as $item) {
                echo "<tr>";
                echo "<td>" . $item['nome'] . "</td>";
                echo "<td>" . $item['cognome'] . "</td>";
                echo "<td>" . $item['scelta'] . "</td>";
                echo "</tr>";
                } ?>
        </tr>
    </table>

    <p>Hanno partecipato al sondaggio: <?php echo $dolce+$salato?> persone.</p>
    <a href="logout.php" >LOGOUT</a>
</div>
</body>

</html>
