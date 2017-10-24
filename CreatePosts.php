<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO tb_posts (content, author_id) VALUES ('" . $_POST['post_body'] . "', '" . $_POST['user_id'] . "');";

if($_POST['user_id'] != '' 
    && $_POST['post_body'] != ''
    && $mysqli->query($query)) {
    echo "Nice post! The database accepted it. Hope you didn't inject anything! Note that the foreign keys in MySql on the KU server are still horribly broken, so we can't check for duplicate username :(";
} else {
    echo "Oops, something went wrong! That username either didn't exist, either field was empty, or something else went horribly wrong. Sorry!";
}

?>