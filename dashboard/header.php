<?php
 include("../functions.php"); 
 $roli = $_SESSION['useri']['roli']; 
 $emri = $_SESSION['useri']['emri']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoElite</title>

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

    <header>
        <nav>
            <img src="img/car-logo.png" alt="" class="logo">
            <div class="menu">
                <a href="index.php">Dashboard</a>
                <a href="carscrud.php">Cars</a>
                <?php if($roli == 'Administrator'): ?>
                <a href="userscrud.php">Users</a>
                <a href="mesazhet.php">Messages</a>
                <?php endif; ?>
                <a href="terminet.php">Appointments</a>
                <?php if($roli == 'Administrator'):?>
                <a href="aboutdash.php">About</a>
                <?php endif; ?>
                <a href="logout.php">Logout</a>
               
            </div>

            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
        </nav>
    </header>
    <body>
