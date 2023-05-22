<?php
require_once('partials/_nav.php');


$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/_db_connect.php';

    $firstname = $_POST['firstname'];
    $password = $_POST['password'];

    $exists = false;

    $sql = "Select * from registerpage where firstname='$firstname' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {

        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['firstname'] = $firstname;
        header("location: main.php");
    } else {
        $showError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Login - Natures Explorer</title>
</head>

<body>
    <div class="container my-5">

        <?php
        if ($login) {
            echo '<div class="notification is-success">
                <button class="delete"></button>
                <h1 class="is-size-3 has-text-white px-3 ">Login Sucessfull</h1>
              </div>';
        }
        ?>

        <div class="column">
            <div class="column is-half mx-auto">
                <h1 class="is-size-1 font-fam1 has-text-centered has-background-info has-text-white px-2 my-5" style="border-radius: 10px;">Login to Enter Homepage</h1>
                <form class="box" action="login.php" method="post">
                    <div class="field">
                        <label class="label">Firstname: </label>
                        <div class="control">
                            <input class="input" id="email" type="text" name="firstname" placeholder="Enter Firstname">

                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password: </label>
                        <div class="control">
                            <input class="input" type="password" id="password" name="password" placeholder="Enter password">
                        </div>
                    </div>

                    <?php
                    if ($showError) {
                        echo '<p class="subtitle mx-auto has-text-danger is-size-5">' . $showError . '</p>';
                    }
                    ?>

                    <button class="button is-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>