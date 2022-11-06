<?php
session_start();
include "db.php";
$errors = [];
include "./partials/header.php";
// include "./partials/navbar.php";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    empty($email) ? $errors[] = "email required" : "";

    $email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($email_check) > 0) {
        $dbuser = mysqli_fetch_assoc($email_check);
        $dbemail = $dbuser['email'];
        $dbpass = $dbuser['password'];
        if ($dbemail == $email && $dbpass == $password) {
            $_SESSION['user'] = $dbuser['name'];
            $_SESSION['member'] = "gold";
            header("location:main.php");
        } else {
            $errors[] = "Email and password do not match.";
        }
    } else {
        $errors[] = "Email not found.";
    }
}
?>

<link rel="stylesheet" href="./css/login1.css">
<center>
    <form action="login.php" method="post" class="w-50 mt-3 m-auto p-4">
        <h1>Login</h1>
        <?php
        foreach ($errors as $err) {
            echo "<p class='text-danger'>$err</p>";
        }
        ?>
        <div class="mb-3">
            <input type="email" placeholder="Email Address" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Log In" name="submit">
        </div>
    </form>
    <div class="p1">
        Do not have an account ? <a href="./register.php">Register</a>
    </div>
</center>

<?php
include "./partials/footer.php"
?>