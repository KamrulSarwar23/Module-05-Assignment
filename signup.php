<?php

$firstName = $_POST['firstName'] ?? "";
$lastName = $_POST['lastName'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$role = "user";

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
        <div class="row mt-5">
            <h2 class="text-center mb-3">SignUp For User Login</h2>
            <div style="border: 1px solid green;" class="p-5 mb-3 col-md-8 m-auto">

                <form action="signup.php" method="POST">

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
                        <input name="password" type="password" class="form-control" placeholder="**********">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Signup</button>
                </form>

                <p>Already have an account! <a href="login.php">Login</a></p>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>