<?php
session_start();  

//Funzione per il controllo dei dati inseriti
function check_data ($temp){
    $temp = trim($temp);
    $temp = stripslashes($temp);
    $temp = htmlspecialchars($temp);
    return $temp;
}

$nameErr = $passErr = "";
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Campo Mancante";
    } else {
        $name = check_data($_POST["name"]);
    }
    if(empty($_POST["password"])){
        $passErr = "Campo Mancante";
    } else {
        $password = check_data($_POST["password"]);
    }

    if($name != "" && $password != "" ){
        $_SESSION = $_POST;
        header("Location: pagina2.php");
    }

}

?>

<html>
<head>

    <style>
        .errore{
            color: red;
        }
    </style>
</head>

<body>

<h2>PHP Form Validation</h2>
<form method="post">
    Name: <input type="text" id="name" name="name" value="<?php echo $name ?>"> <span class="errore"> <?php echo $nameErr ?> </span>
    <br><br>
    Password: <input type="password" id="password" name="password" value="<?php echo $password ?>"> <span class="errore"> <?php echo $passErr ?></span>
    <br><br>
    <input type="submit" value="ACCEDI"></input>
</form>

</body>

</html>
