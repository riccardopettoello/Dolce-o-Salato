<?php
session_start();

//funzione controllo dati inseriti
function checkData($temp) {
    $temp = trim($temp); //toglie spazi all'inizio e alla fine
    $temp = stripcslashes($temp); //rimuove caratteri speciali che potrebbero generare problemi nel DB
    $temp = htmlspecialchars($temp); //rimuove tag html per evitare la creazione di problemi
    return $temp;
}

$nameErr = $cognomeErr = "";
$name = $cognome = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {             //controllo la presenza dei dati
        $nameErr = "Campo mancante";
    } else {
        $name = checkData($_POST["name"]);
    }

    if (empty($_POST["cognome"])) {
        $cognomeErr = "Campo mancante";
    } else {
        $cognome = checkData($_POST["name"]);
    }
}

if(!isset($_SESSION['auth'])){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Dolce o Salato?</title>

    <style>
        .errore {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Dolce o salato?</h1>

    <p>Benvenuto!</p>
    <p>Stiamo raccogliendo sulle preferenze delle persone, riguardo
        il cibo dolce o salato.
        <b>Esprimi la tua opinione!</b></p>

    <form action="AddScelta.php" method="post">
        <div>
            <label>Nome </label>
            <input type="text" name="name" value="<?php echo $name ?>"> <span class="errore"> <?php echo $nameErr ?> </span>
        </div>
        <div>
            <label>Cognome </label>
            <input type="text" name="cognome" value="<?php echo $cognome ?>"> <span class="errore"> <?php echo $cognomeErr ?> </span>
        </div>
        <label for="scelta">Inserisci la tua preferenza:</label>
        <select name="scelta" id="scelta">
            <option value="dolce" name="dolce" id="dolce">Dolce</option>
            <option value="salato" name="salato" id="salato">Salato</option>
        </select>
        <input type="submit" value="Invia Preferenza">
    </form>

    <a href="logout.php" >LOGOUT</a>
</body>

</html>
