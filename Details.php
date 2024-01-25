<?php 
include("header.php"); 
  
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
 if(isset($_GET['ID'])){
            $idvetura=$_GET['ID'];
            $row=merrVeturenSpecifike($idvetura);
            $Marka=$row['Marka'];
            $Modeli=$row['Modeli'];
            $Kubik=$row['Kubik'];
            $VitiProdhimit=$row['VitiProdhimit'];
            $Cmimi=$row['Cmimi'];
            $Karburanti=$row['Karburanti'];
            $Kilometrazha=$row['Kilometrazha'];
            $Ngjyra=$row['Ngjyra'];
            $Historia=$row['Historia'];
            $Transmisioni=$row['Transmisioni'];
            $Img=$row['Img'];
 }

?>

<html>
<body>

<div class="main-container">
    <div class="product-container">
        <div class="product-image-container">
            <img src="dashboard/<?php echo $Img; ?>" alt="Product Image">
        </div>
        <div class="flexdetails">
        <div class="boxdetails">
            <?php
            if (isset($_POST['shto'])) {
                shtoTermin($_POST['koha'],$_POST['message'],$emri,$mbiemri,
                    $email,$phone,$idvetura,$Marka,$Modeli);
            }
            ?>
            <?php if ($emri == null) { ?>
                <form method="post" id="termini">
                    <h1>Cakto Termin</h1>
                    <input type="datetime-local" name="koha" disabled>
                    <textarea name="message" rows="10" placeholder="Your Message" disabled></textarea>
                    <button type="submit" name="shto" value="Shto" disabled>Submit</button>
                </form>
            <?php } else { ?>
                <form method="post" id="termini">
                    <h1>Cakto Termin</h1>
                    <input type="datetime-local" name="koha">
                    <textarea name="message" rows="10" placeholder="Your Message"></textarea>
                    <button type="submit" name="shto" value="Shto">Submit</button>
                </form>
            <?php } ?>
        </div>
    </div>
    </div>

    <div class="product-details">
        <h1 class="kerri"> <?php echo $Marka; echo ' '; echo $Modeli; ?></h1>
        <hr>
        <div class="product-info-container">
            <p class="product-info">Marka: <span><?php echo $Marka; ?></span></p>
            <p class="product-info">Modeli: <span><?php echo $Modeli; ?></span></p>
            <p class="product-info">Cmimi: <span><?php echo $Cmimi; ?> €</span></p>
            <p class="product-info">Kubik: <span><?php echo $Kubik; ?></span></p>
            <p class="product-info">Viti i Prodhimit:<span><?php echo $VitiProdhimit; ?></span></p>
            <p class="product-info">Transmisioni: <span><?php echo $Transmisioni; ?></span></p>
            <p class="product-info">Karburanti: <span><?php echo $Karburanti; ?></span></p>
            <p class="product-info">Kilometrazha: <span><?php echo $Kilometrazha; ?> Km</span></p>
            <p class="product-info">Ngjyra: <span><?php echo $Ngjyra; ?> </span></p>
            <p class="product-info">Historia: <span><?php echo $Historia; ?> </span></p>
        </div>
    </div>

    
</div>
        
        
    </div>
</div>



<?php include("footer.php"); ?>

</body>
</html>