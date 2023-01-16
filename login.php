<?php
session_start();

if(isset($_SESSION['auth']) && $_SESSION['auth']){
    header("Location:index.php");
}

$msg = "";

if (isset($_SESSION['login_error'])){
    $msg = "La password è sbagliata!";
}

?>

<html>
<head>
    <title>Dolce o Salato</title>
</head>

<body>
<h1>LOGIN:</h1>

<form action="check_login.php" method="post">
    <label for="password">PASSWORD:</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="LOGIN">
</form>
<h3 style="color: red;"> <?php echo $msg ?> </h3>

</body>
</html>
