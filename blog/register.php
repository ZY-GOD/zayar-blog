<?php
include "db.php";
$errors = [];
include "./partials/header.php";
// include "./partials/navbar.php";
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    // empty($name) ? $errors[] = "name required" : "";
    // empty($email) ? $errors[] = "email required" : "";
    // empty($gender) ? $errors[] = "gender required" : "";
    // empty($address) ? $errors[] = "address required" : "";

    $email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($email_check) > 0) {
        $errors[] = "Your email is already exist.";
    } else {
        $add_user = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `name`, `email`, `password`, `gender`, `address`, `created_date`, `updated_date`) VALUE (null, '$name','$email','$password', '$gender','$address',now(),now())");
        if ($add_user) {
            header("location:login.php");
        } else {
            $errors[] = "insert new user error";
        }
    }
}
?>

<link rel="stylesheet" href="./css/register2.css">
<center>
    <form action="register.php" method="post" class="w-50 mt-3 m-auto p-4">
        <h1>Sign Up</h1>
        <?php
        foreach ($errors as $err) {
            echo "<p class='text-danger'>$err</p>";
        }
        ?>
        <div class="mb-3">
            <input type="text" placeholder="Full Name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="email" placeholder="Email Address" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Gender" name="gender" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Address" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Register" name="submit" class="register">
        </div>
    </form>
    <div class="p1">
        Already have an account ? <a href="./login.php">Log In</a>
    </div>
</center>

<?php
include "./partials/footer.php"
?>