<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo
'
<html>
<center><h2>Delete Posts</h2></center>

<div id="navbar">
Content navigation (admittedly low-quality anti-css navbar)
<br><a href="CreatePosts.html">Create Posts</a>
<br><a href="CreateUser.html">Create User</a>
<br><a href="AdminHome.html">Admin Home</a>
</div>
<br>
<br>
';

$query = "INSERT INTO tb_posts (content, author_id) VALUES ('" . $_POST['post_body'] . "', '" . $_POST['user_id'] . "');";

if($_POST['user_id'] != '' 
    && $_POST['post_body'] != ''
    && $mysqli->query($query)) {
    echo "Nice post! The database accepted it. Hope you didn't inject anything! Note that the foreign keys in MySql on the KU server are still horribly broken, so we can't check for existing usernames :(";
} else {
    echo "Oops, something went wrong! That username either didn't exist, either field was empty, or something else went horribly wrong. Sorry!";
}

echo
'
</html>
';

?>