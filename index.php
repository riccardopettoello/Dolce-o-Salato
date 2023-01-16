<?php

session_start();

if(!isset($_SESSION['auth'])){
    header("Location:login.php");
}

?>

<html lang="it">
<head>
    <title>Secure Login</title>
</head>
<body>
    <h1>INDEX</h1>

    <p>Benvenuto!</p>
    <p>Stiamo raccogliendo sulle preferenze delle persone, riguardo
        il cibo dolce o salato.
        <b>Esprimi la tua opinione!</b></p>

    <form action="">
        <label for="scelta">Scelta: </label>
        <label>
            <select name="Dolce o salato">
                <option value="dolce">Dolce</option>
                <option value="salato">Salato</option>
            </select>
        </label>
        <input type="submit" value="Invia Preferenza">
    </form>

    <a href="logout.php" >LOGOUT</a>
</body>

</html>
