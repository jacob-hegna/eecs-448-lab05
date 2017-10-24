<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

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

?>