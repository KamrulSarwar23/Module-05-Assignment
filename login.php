<?php

session_start();

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$errormessage = "";


$fp = fopen("data.txt", "r");

$roles = array();
$emails = array();
$passwords = array();
$firstnames = array();
$lastnames = array();

while ($line = fgets($fp)) {

    $values = explode(",", $line);  // role, email, password, firstname, lastname, age
    array_push($roles, trim($values[0]));
    array_push($emails, trim($values[1]));
    array_push($passwords, trim($values[2]));
    array_push($firstnames, trim($values[3]));
    array_push($lastnames, trim($values[4]));
}

fclose($fp);

for ($i = 0; $i < count($roles); $i++) {
    if ($email == $emails[$i] && $password == $passwords[$i]) {

        $_SESSION["role"] = $roles[$i];
        $_SESSION["email"] = $emails[$i];
        $_SESSION["firstname"] = $firstnames[$i];
        $_SESSION["lastname"] = $lastnames[$i];
        header("Location: index.php");

    } else {
        $errormessage = "Wrong Email or Password";
    }
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
        <div class="row mt-5">
            <h2 class="text-center mb-3">Login To Your Account</h2>
            <div style="border: 1px solid green;" class="p-5 mb-3 col-md-8 m-auto">

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter Your Valid Email">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="************">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">login</button>
                </form>

                <p>Don't Have an Account! <a href="signup.php">Signup</a></p>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>