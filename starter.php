<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝒵𝒾𝑒𝓁𝓈𝓀𝑜</title>
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

    $q = $db->prepare("SELECT * FROM produkty");

    if ($q && $q->execute()) {

        $result = $q->get_result();
        $produkty = array();
        while ($produkt = $result->fetch_assoc()) {

            $id = $produkt['id'];
            $nazwa = $produkt['nazwa'];
            $cena = $produkt['cena'];
            $zdj = $produkt['zdj'];
            $p = array(
                "id" => $id,
                "nazwa" => $nazwa,
                "cena" => $cena,
                "zdj" => $zdj
            );
            array_push($produkty, $p);
           
        }
        $smarty->assign("produkty", $produkty);
        
        
    }
    ?>

<div>
        
<img src="../sklep/img/kit.PNG" style: width="23%"; height="23%">
<br><p>150000000 Riali Irańskich za 1szt.</p>
        
        <input type="button" onclick="location.href='order.php';"  value="KUP" />


    </div>

    </body>

    </html>