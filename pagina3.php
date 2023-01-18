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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<br>
<p class="p">Benvenuto nella schermata di admin</p>

<div>
    
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
        var xValues = ["Dolce", "Salato"];
        var yValues = ["<?php echo $dolce ?>", "<?php echo $salato ?>", 30];
        var barColors = ["red", "green"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: "Preferenze tra dolce e salato"
                }
             }
        });
    </script>
    
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
