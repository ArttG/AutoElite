<?php include("functions.php"); 
// Initialize variables
$emri = $phone = $email = $mbiemri = null;

// Check if the session variables are set and not null
if (
    isset($_SESSION['useri']['emri']) && 
    isset($_SESSION['useri']['phone']) && 
    isset($_SESSION['useri']['email']) && 
    isset($_SESSION['useri']['mbiemri']) && 
    $_SESSION['useri']['emri'] !== null &&
    $_SESSION['useri']['phone'] !== null &&
    $_SESSION['useri']['email'] !== null &&
    $_SESSION['useri']['mbiemri'] !== null
) {
    // Assign values to variables only if they are not null
    $emri = $_SESSION['useri']['emri']; 
    $phone = $_SESSION['useri']['phone'];
    $email = $_SESSION['useri']['email'];
    $mbiemri = $_SESSION['useri']['mbiemri'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoElite</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

    <header>
        <nav>
            <img src="img/car-logo.png" alt="" class="logo">
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="Cars.php">Cars</a>
                <a href="Contact.php">Contact Us</a>
                <a href="about.php">About Us</a>
                <?php if ($emri == null) { ?>
                    <a href="Login.php">Log In</a> 
                <?php } else { ?>
                    <a href="logout.php">Log out</a>
                <?php
                }
                 ?>
                
            </div>

            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
        </nav>
    </header>
