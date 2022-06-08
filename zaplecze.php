<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pierdolnik</title>
    <link href="../sklep/css/style.css" type="text/css" rel="stylesheet">
    
    
</head>
<body>
<div>
    <a href="index.php"><img src="img/logo.png" style: width="23%"; height="23%"></a>
</div>  
    <div class="header">
        <ul>
            <li><a href="index.php">ZAPLECZE</a></li>
            
        </ul>
    </div> <bR>
    <?php
require_once('config.php');

$q = $db->prepare("SELECT * FROM zamuwienia");

    if ($q && $q->execute()) {

        $result = $q->get_result();

        while ($zamuwienia = $result->fetch_assoc()) {

            $id = $zamuwienia['id_produkty'];
            $imie = $zamuwienia['Firstname'];
            $nazwisko = $zamuwienia['Lastname'];
            $email = $zamuwienia['email'];
            $phone = $zamuwienia['phone'];
            $adres = $zamuwienia['adres'];

            echo "$id<br>" ;
            echo "$imie<br>" ;
            echo "$nazwisko<br>" ;
            echo "$email <br>";
            echo "$phone<br>" ;
            echo "$adres<br><br>" ;
        }
    }
?>