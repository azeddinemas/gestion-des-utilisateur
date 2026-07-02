<?php
require "connexion.php";

$a = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    $password = trim($_POST['password']);
    $cpass = trim($_POST['cpass']);

    if ($password !== $cpass) {
        $a = true;
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateurs (nom, email, age, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $email, $age, $hash]);

        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="mx-auto card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 380px; margin-top: 99px; border-radius: 6px;">
        <?php if ($a === true): ?>
        <div class="alert alert-danger" role="alert">
            Les mots de passe ne correspondent pas.
        </div>
        <?php endif; ?>
        <form method="POST" class="needs-validation" novalidate>
            <div class="text-center mb-3">
                <h2>Sign up</h2>
            </div>
            <hr>
            <div class="mb-3">
                <label class="form-label">User name</label>
                <input type="text" name="nom" class="form-control" placeholder="Entre votre nom" required>
                <span class="invalid-feedback">Please choose a name.</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" min="1" max="120" placeholder="Votre Age" required>
                <span class="invalid-feedback">Please choose a name.</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                <span class="invalid-feedback">Please choose a email.</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="invalid-feedback">Please choose a password.</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirme Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Confirme Password" required>
                <span class="invalid-feedback">Please choose a config password.</span>
            </div>
            <div class="d-grid">
                <input type="submit" name="submit" class="btn text-white " style="background-color: #6C63FF;" value="Sign up">
            </div>

        </form>
        <a class="text-body-secondary" href="login.php">Already have an account?Login here.</a>
    </div>
</body>

</html>