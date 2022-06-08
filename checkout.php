<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝒹𝓏𝒾𝑒𝓀𝓊𝒿𝑒𝓂𝓎 𝓏𝒶 𝓏𝒶𝓀𝓊𝓅!</title>
    <link href="../sklep/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div>
    <a href="index.php"><img src="img/logo.png" style: width="23%"; height="23%"></a>
</div>  
    <div class="header">
        <ul>
            <li><a href="index.php">SKLEP</a></li>
            <li><a href="info.php">INFO</a></li>
            <li><div class="dropdown">
        <span>KONTAKT</span>
            <div class="dropdown-c">
                <p>ul. Zielarska 69 Trawnik 69-420</p> 
                <p>TEL: +48 213742069</p>
                <p>NIP: 1234567890</p> 
            </div></li>
            <li><a href="basket.php">KOSZYK</a></li>
            <li><a href="log.php">LOGOWANIE</a></li>
        </ul>
    </div>
    <br>
    <br>


<?php
require_once('config.php');


if (isset($_REQUEST['Firstname'])) {
    $db = new mysqli("localhost", "root", "", "sklep");
    $Firstname = $_REQUEST['Firstname'];
    $Lastname = $_REQUEST['Lastname'];

    $email = $_REQUEST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $phone = $_REQUEST['phone'];

    $adres = $_REQUEST['adres'];

        $q = $db->prepare("INSERT INTO zamuwienia VALUES (NULL, ?, ?, ?, ?, ?)");
        $q->bind_param("sssss",$Firstname, $email, $Lastname, $phone, $adres);
        $result = $q->execute();
        if($result) {
            echo "<img src=../sklep/img/zamuwienie.PNG>";
        } else {
            echo "Cos nie dziala";
        }
    } 


?>