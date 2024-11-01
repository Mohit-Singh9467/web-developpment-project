<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color List</title>
</head>
<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'http5225');
    
    if (!$connect) {
        echo 'Error code: ' . mysqli_connect_errno() . '<br>';
        echo 'Error message: ' . mysqli_connect_error();
        exit;
    }

    $query = 'SELECT `Name`, `Hex` FROM colors';
    $results = mysqli_query($connect, $query);

    if (!$results) {
        echo 'Error message: ' . mysqli_error($connect);
    } else {
        echo 'The query found ' . mysqli_num_rows($results) . ' results.<br>';

        if (mysqli_num_rows($results) > 0) {
            echo '<table border="1" cellpadding="10">';
            

            while ($row = mysqli_fetch_assoc($results)) {
                echo '<tr>';
                echo '<td style="background-color:' . htmlspecialchars($row['Hex']) . ';">' . htmlspecialchars($row['Name']) . '</td>';
                
                 ';">&nbsp;&nbsp;&nbsp;&nbsp;</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No colors found in the database.';
        }
    }

   
    ?>
</body>
</html>
