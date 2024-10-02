<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color List</title>
</head>
<body>
    <?php
    // Connect to the database
    $connect = mysqli_connect('localhost', 'root', 'root', 'http5225');
    
    // Check connection
    if (!$connect) {
        echo 'Error code: ' . mysqli_connect_errno() . '<br>';
        echo 'Error message: ' . mysqli_connect_error();
        exit;
    }

    // Query to retrieve colors from the database
    $query = 'SELECT `Name`, `Hex` FROM colors';
    $results = mysqli_query($connect, $query);

    // Check if the query was successful
    if (!$results) {
        echo 'Error message: ' . mysqli_error($connect);
    } else {
        echo 'The query found ' . mysqli_num_rows($results) . ' results.<br>';

        // Display the data in a table format
        if (mysqli_num_rows($results) > 0) {
            echo '<table border="1" cellpadding="10">';
            echo '<tr><th>Name</th><th>Hex</th></tr>';

            while ($row = mysqli_fetch_assoc($results)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['Name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Hex']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No colors found in the database.';
        }
    }

    // Free the result set and close the connection
    mysqli_free_result($results);
    mysqli_close($connect);
    ?>
</body>
</html>
