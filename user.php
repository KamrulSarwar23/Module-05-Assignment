<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
};

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {

    header("Location: login.php");
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
                <h1 class="text-info mb-3">User Dashboard</h1>

                <h2>Welcome: <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></h2>

                <h2> Role: <?php echo $_SESSION["role"]; ?></h2>

                <h2> Email: <?php echo $_SESSION["email"]; ?></h2>

                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>