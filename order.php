<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝒵𝒶𝓂𝑜𝓌𝒾𝑒𝓃𝒾𝑒</title>
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


if(isset($_REQUEST['id']))  {
    $idProduktu = $_REQUEST['id'];
    $q = $db->prepare("SELECT * ...");
}
?>

<form action="checkout.php">
    <input type="hidden" name="idProduktu" value="<?php echo $idProduktu; ?>">  
    <label for="Firstname">Imię:</label>
    <input type="text" name="Firstname" id="Firstname">
    <label for="Lastname">Nazwisko:</label>
    <input type="text" name="Lastname" id="Lastname">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <label for="phone">Telefon:</label>
    <input type="text" name="phone" id="phone">
    <label for="adres">Adres:</label>
    <input type="text" name="adres" id="adres">
    <input type="submit" value="Zamów">   
</form>

</body>


</html>