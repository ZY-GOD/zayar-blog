<?php
session_start();
$user = isset($_SESSION['user']);
include "./partials/header.php";
include "./partials/navbar.php";
// include "./partials/carousel.php";
?>
<h1 class="text-primary">Home Page</h1>
<p>Welcome <?php
            if ($user) {
                echo $_SESSION['user'];
            } else {
                echo "guest";
            }
            ?></p>


<?php
include "./partials/footer.php"
?>