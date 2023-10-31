<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
};

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {

    header("Location: login.php");
}

$firstName = $_POST['firstName'] ?? "";
$lastName = $_POST['lastName'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$role = "admin";

$errormessage = "";

if ($email != "" && $password != "") {
    $fp = fopen("data.txt", "a");

    fwrite($fp, "\n{$role}, {$email}, {$password}, {$firstName}, {$lastName}");

    fclose($fp);

    header("Location: login.php");
} else {
    $errormessage = "Please enter your email and passoword";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto mt-5">
                <h1 class="text-success mb-3">Admin Dashboard</h1>

                <h2>Welcome: <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></h2>

                <h2> Role: <?php echo $_SESSION["role"]; ?></h2>

                <h2> Email: <?php echo $_SESSION["email"]; ?></h2>


                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row mt-5">
            <h2 class="text-center mb-3">Create Admin</h2>
            <div style="border: 1px solid green;" class="p-5 mb-3 col-md-8 m-auto">

                <form action="admin.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input name="firstName" type="text" class="form-control" placeholder="Enter Your First Name">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input name="lastName" type="text" class="form-control" placeholder="Enter Your Last Name">

                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter Your Valid Email">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="******">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Signup</button>
                </form>

                <p>Already have an account! <a href="login.php">Login</a></p>

            </div>
        </div>
    </div>
</body>

</html>