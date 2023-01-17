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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


<form action="check_login.php" method="post" >
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter password!</p>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="password">PASSWORD:</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg">
                                </div>

                                <input type="submit" value="LOGIN" class="btn btn-outline-light btn-lg px-5">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<h3 style="color: red;"> <?php echo $msg ?> </h3>

</body>
</html>