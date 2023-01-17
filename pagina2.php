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
    <title>Dolce o Salato?</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
    <p>Grazie per aver partecipato al sondaggio!</p>

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
        <a href="logout.php" >LOGOUT</a>
    </div>
</body>

</html>
