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

$query = "SELECT * FROM tb_posts;";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST[$row['post_id']])) {
            $delete_query = "DELETE FROM tb_posts WHERE post_id = '" . $row['post_id'] . "';";
            if ($result2 = $mysqli->query($delete_query)) {
                echo "Deleted " . $row['post_id'] . " from the table!<br>";
            }
        }
    }
}

echo '</html>';

?>