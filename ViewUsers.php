<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM tb_users;";

$page =
'
<html>
<head><title>View Users</title></head>
<body>
';

if ($result = $mysqli->query($query)) {
    $page .= '<table>';

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $page .= "<tr><td>" . $row['user_id'] . "</td></tr>";
    }

    $page .= "</table>";

    /* free result set */
    $result->free();
}

$page .=
'
</body>
</html>
';

echo $page;

?>