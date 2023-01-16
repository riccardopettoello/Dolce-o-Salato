<?php

$json_file = file_get_contents('dolceSalato.json');
$scelte = json_decode($json_file, true);

session_start();

if(!isset($_SESSION['auth'])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Dolce o Salato?</title>
</head>
<body>
    <h1>INDEX</h1>

    <p>Benvenuto!</p>
    <p>Stiamo raccogliendo sulle preferenze delle persone, riguardo
        il cibo dolce o salato.
        <b>Esprimi la tua opinione!</b></p>

    <form action="AddScelta.php" method="post">
        <label for="scelta">Inserisci la tua preferenza:</label>
        <select name="scelta" id="scelta">
            <?php foreach ($scelte as $scelta): ?>
            <option value="<?php echo $scelta['scelta'] ?>"><?php echo $scelta['scelta'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Invia Preferenza">
    </form>

    <a href="logout.php" >LOGOUT</a>
</body>

</html>
