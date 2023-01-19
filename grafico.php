<?php


require_once ('jpgraph-4.4.1/src/jpgraph.php');
require_once ('jpgraph-4.4.1/src/jpgraph_bar.php');

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

$datay=array($dolce, $salato);


// Create the graph. These two calls are always required
$graph = new Graph(350,220,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5,10,15,20,25,30), array(15,45,75,105,135));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('Dolce','Salato'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Dolce o salato");

// Display the graph
$graph->Stroke();
if(!isset($_SESSION['auth'])){
    header("Location:login.php");
}
?>
