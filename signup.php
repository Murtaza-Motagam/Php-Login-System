<?php
require_once('partials/_nav.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup - Nature's Explorer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>

    <div class="container-fluid px-5 my-5">
        <div class="is-flex is-justify-content-space-between">
            <div class="column is-half">
                <h1 class="is-size-1 font-fam1 has-background-info has-text-white px-5" style="border-radius: 10px;">Signup to Get Started</h1>
                <hr>
                <form class="box has-background-white-ter my-5" action="signup.php" method="post">
                    <div class="field">
                        <label class="label">First Name: </label>
                        <div class="control">
                            <input class="input" type="text" name="firstname" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Last Name: </label>
                        <div class="control">
                            <input class="input" type="text" name="lastname" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email: </label>
                        <div class="control">
                            <input class="input" type="email" name="email" placeholder="Create an email">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="password">Password: </label>
                        <div class="control">
                            <input class="input" type="password" name="password" id="password" placeholder="Create a Strong Password">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="confirm">Confirm Password: </label>
                        <div class="control">
                            <input class="input" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password: ">
                        </div>
                    </div>

                    <input type="submit" name="submit" class="button is-primary" value="Signup">
                </form>
            </div>

            <div class="column is-half">
                <div class="box">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        include 'partials/_db_connect.php';

                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];

                        if ( ($_POST['password'] &&  $_POST['cpassword']) ==  $_POST['cpassword']) {

                            
                            $sql = "INSERT INTO `registerpage` (`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname', '$lastname', '$email', '$password')";

                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo '
                                <table class="table">
                                <h1 class="is-size-3 font-fam1">Your Filled Details</h1>
                                <hr>
                                    <thead>
                                        <tr><strong class="is-size-4">Firstname: </strong></tr>
                                        <tr><strong class="is-size-5 font-fam2">' . $firstname . '</strong></tr>
                                        <br>
                                        <br>
                                        <tr><strong class="is-size-4">Lastname: </strong></tr>
                                        <tr><strong class="is-size-5 font-fam2">' . $lastname . '</strong></tr>
                                        <br>
                                        <br>
                                        <tr><strong class="is-size-4">Email: </strong></tr>
                                        <tr><strong class="is-size-5 font-fam2">' . $email . '</strong></tr>
                                        <br>
                                        <br>
                                        <tr><strong class="is-size-4">Password: </strong></tr>
                                        <tr><strong class="is-size-5 font-fam2">' . $password . '</strong></tr>
                                    </thead>
                                </table>
                            ';
                            echo'<a class="font-fam2 is-size-2" style="text-decoration: underline;" href="login.php">Click Here to Login</a>';
                            }
                            
                        }
                        else{

                            echo'<div class="notification is-danger">
                                <button class="delete"></button>
                                <h3 class="is-size-3 has-text-white font-fam1 has-text-centered">Oops!! Passwords Does not match</h3>
                            </div>';

                            
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>