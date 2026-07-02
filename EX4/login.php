<?php
session_start();
require "connexion.php";

if (isset($_SESSION['nom'])) {
    header("Location: landing.php");
    exit();
}
$a=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['nom'] = $user['nom'];
        header("Location: landing.php");
        exit();
    } else {
        $a = true;
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Signin Template</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto ">

        <form action="login.php" method="POST">
            <h1 class="">
                <i class="bi bi-people text-primary"></i>
            </h1>
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php if($a===true): ?>
            <div class="alert alert-danger" role="alert">
                Email ou mot de passe incorrect!
            </div>
            <?php endif; ?>
            <div class="form-floating">
                <input type="email" class="form-control " id="floatingInput" placeholder="name@example.com" name="email" require>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" required placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg text-white" style="background-color: #6C63FF;" type="submit">Sign in</button>

            <a href='inscription.php' class="mt-5 mb-3 text-body-secondary">Sign up</a>
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>