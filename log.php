<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login") {


$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$db = new mysqli("localhost", "root", "", "sklep");

$q= $db->prepare("SELECT * FROM user WHERE email = ?");

$q->bind_param("s", $email);

$q->execute();
$result = $q->get_result();

$userRow = $result->fetch_assoc();
if($userRow == null) {
    echo "Błędny login lub hasło <br>";
} else {
    if (password_verify($password, $userRow['passwordhash'])) {
echo "Zalogowano <br>";
    } else {
echo "Błędny login lub hasło <br>";
    }
}
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "register") {
    $db = new mysqli("localhost", "root", "", "sklep");
    $email = $_REQUEST['email'];        
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = $_REQUEST['password'];
        $passwordRepeat = $_REQUEST['passwordRepeat'];
        if($password == $passwordRepeat) {
            $q = $db->prepare("INSERT INTO user VALUES (NULL, ?, ?)");
            $passwordHash = password_hash($password, PASSWORD_ARGON2I);
            $q->bind_param("ss", $email, $passwordHash);
            $result = $q->execute();
            if($result) {
                echo "Konto utworzono poprawnie"; 
            } else {
                echo "Coś poszło nie tak!";
            }
        } else {
    
            echo "Hasła nie są zgodne - spróbuj ponownie!";
        }
    }




?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝐿𝑜𝑔𝑜𝓌𝒶𝓃𝒾𝑒</title>
    <link href="../sklep/css/style.css" type="text/css" rel="stylesheet">
</head>

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
<h2>Zaloguj się</h2>
<br>

<form action="log.php" method="post">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <input type="hidden" name="action" value="login">
    <input type="submit" value="Zaloguj">
</form>
<br>
<br>
<br>

<h2>Zarejestruj się</h2>
<br>
<form action="log.php" method="post">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <label for="passwordRepeatInput">Hasło ponownie:</label>
    <input type="password" name="passwordRepeat" id="passwordRepeatInput">
    <input type="hidden" name="action" value="register">
    <input type="submit" value="Zarejestruj">
</form>
</div>