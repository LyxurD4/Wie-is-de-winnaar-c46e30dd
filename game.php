<? 
session_start();
$_SESSION['gameover'] = false;

if (isset($_POST["Speler1"]) && isset($_POST["Keuze1"])) {
        setcookie("Keuze1", $_POST["Keuze1"]);
    }
if (isset($_POST["Speler2"]) && isset($_POST["Keuze2"])) {
    setcookie("Keuze2", $_POST["Keuze2"]);
    header("refresh:0");
}
if (isset($_COOKIE['Keuze2'])) {
    $_SESSION['gameover'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Steen papier schaar</title>
    <style>
        body {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <h1>Steen papier schaar</h1>

    <?php
        if(!isset($_POST["Speler1"]) && $_SESSION['gameover'] == false){
    ?>
        <h3>Speler 1:</h3>
        <form method="post" name="Keuze1">
            <input type="radio" name="Keuze1" value="Steen"> Steen<br>
            <input type="radio" name="Keuze1" value="Papier"> Papier<br>
            <input type="radio" name="Keuze1" value="Schaar"> Schaar<br>
            <input type="Submit" name="Speler1">
        </form>
    <?php
    }
    ?>
    
    <?php
        if(isset($_POST["Speler1"])) {
        ?> 
            <h4>Speler 1 heeft zijn keuze gemaakt</h4>
            <h3>Speler 2: </h3>
            <form method="post" name="Keuze2">
                <input type="radio" name="Keuze2" value="Steen"> Steen<br>
                <input type="radio" name="Keuze2" value="Papier"> Papier<br>
                <input type="radio" name="Keuze2" value="Schaar"> Schaar<br>
                <input type="Submit" name="Speler2">
            </form> <?php  
        }
    ?>
    
    <?php

    $resultaat="";

    //check uitkomst
    if (isset($_COOKIE["Keuze1"]) && isset($_COOKIE["Keuze2"])) {
        if ($_COOKIE["Keuze1"]  == $_COOKIE["Keuze2"]) {
            $resultaat = "Gelijkspel!";
        } elseif ($_COOKIE["Keuze1"]  == "Steen" && $_COOKIE["Keuze2"] == "Schaar") {
            $resultaat = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["Keuze1"]  == "Steen" && $_COOKIE["Keuze2"] == "Papier") {
            $resultaat = "Speler 2 heeft gewonnen!";
        } elseif ($_COOKIE["Keuze1"]  == "Schaar" && $_COOKIE["Keuze2"] == "Steen") {
            $resultaat = "Speler 2 heeft gewonnen!";
        } elseif ($_COOKIE["Keuze1"]  == "Schaar" && $_COOKIE["Keuze2"] == "Papier") {
            $resultaat = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["Keuze1"]  == "Papier" && $_COOKIE["Keuze2"] == "Steen") {
            $resultaat = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["Keuze1"] == "Papier" && $_COOKIE["Keuze2"] == "Schaar") {
            $resultaat = "Speler 2 heeft gewonnen!";
        } ?>

        <h3>Speler 1 heeft <?echo $_COOKIE["Keuze1"];?> gekozen!</h3>
        <h3>Speler 2 heeft <?echo $_COOKIE["Keuze2"];?> gekozen!</h3>
        <h3><?echo $resultaat;?></h3>

    <? } ?>
    
</body>
</html>
