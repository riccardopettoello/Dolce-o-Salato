<?php

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
    <p>Grazie per aver partecipato al sondaggio!</p>
    <a href="logout.php" >LOGOUT</a>
</body>

</html>
