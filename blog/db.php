<?php
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'junian');
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname);
if (!$conn) {
    echo mysqli_connect_error() . "db not found";
}