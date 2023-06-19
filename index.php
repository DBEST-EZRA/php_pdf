
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>IDENTITY CARD</th>
            </tr>
        </thead>
        <tbody>

        <?php 

        require 'config.php';

        $sql = "SELECT * FROM crud_table";
        $results = $conn->query($sql);

        while($row = $results->fetch_assoc()){
            echo "
            <tr>
            <td>$row[crud_name]</td>
            <td>$row[crud_email]</td>
            <td>$row[crud_phone]</td>
            <td>$row[crud_id]</td>
            </tr>
            ";
        };

        ?>
            
        </tbody>
    </table>

    <br><br>

    <button><a target="_blank" href="print_details.php">Print PDF</a></button>


</body>
</html>