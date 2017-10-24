<html>

<head>
    <title>View User Posts</title>
</head>

<body>
    <form method="post" action="ViewUserPostsTable.php">
        <select name="user_id">
        <?php
            $mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

            $query = "SELECT * FROM tb_users;";

            if ($result = $mysqli->query($query)) {

                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    echo "<option>" . $row['user_id'] . "</option>";
                }
            }

        ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>