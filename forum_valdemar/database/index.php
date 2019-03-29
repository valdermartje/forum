<?php

    $dbhost = '127.0.0.1';
    $db = 'scn';
    $user = 'root';
    $password = '';

    try{
        // connectie
        $db_connection = new PDO("mysql:host=$dbhost;dbname=$db", $user, $password);

        $db_statement = $db_connection->prepare('SELECT id, gebruikers FROM koffiezetapparaat');//prepare zorgt ervoor dat hij het weet
        
        //hier wordt het uitgevoerd
        $db_statement->execute();
        
        //hier alle data
        $gebruikers = $db_statement->fetchAll(PDO::FETCH_ASSOC);//fetch all dan geef je ze allemaal 

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Table Voorbeeld</h1>

        <!-- BEGIN TABLE -->
        <table>
            <thead>
                <!-- kopjes -->
                <tr>
                    <?php
                        $kolommen = array_keys($gebruikers[0]);

                        foreach ($kolommen as $kolom) {
                            echo "<th> $kolom </th>";
                        }
                    ?>
                </tr>
            </thead>

            <!-- values -->
            <tbody>
                <!-- hier wordt dan onze gebruiker geprint -->
                <?php foreach($gebruikers as $gebruiker):?>
                    <tr>
                        <?php foreach($gebruiker as $key => $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- EINDE TABLE -->
    </center>


</body>

</html>