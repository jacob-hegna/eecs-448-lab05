<html>

<head>
    <title>Delete Posts</title>
</head>

<body>
    <form method="post" action="DeletePostsBackend.php">
        <table>
            <tr><td>Post id</td><td>User id</td><td>Post content</td><td>Delete?</td></tr>
            <?php
                $mysqli = new mysqli('mysql.eecs.ku.edu', 'jhegna', 'P@$$word123', 'jhegna');

                if ($mysqli->connect_errno) {
                    printf("Connect failed: %s\n", $mysqli->connect_error);
                    exit();
                }

                $query = "SELECT * FROM tb_posts;";

                if ($result = $mysqli->query($query)) {

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $row_html  = "<tr>";
                        $row_html .= "<td>" . $row['post_id'] . "</td>";
                        $row_html .= "<td>" . $row['author_id'] . "</td>";
                        $row_html .= "<td>" . $row['content'] . "</td>";
                        $row_html .= "<td><input type='checkbox' name='" . $row['post_id'] . "'></td></tr>";
                        echo $row_html;
                    }
                }
            ?>
        </table>
        <br>
        <input type="submit">
    </form>
</body>

</html>