<?php
session_start();
$dbconn;

// konektimi me DB
function dbConnection()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", "root", "", "autoelite");

    if (!$dbconn) {
        echo "Deshtoi krijimi i lidhjes me DB";
    }
}
// 

dbConnection();

//////////////////////////////////////////////////////////////////////////////////////

function login($username, $fjalekalimi)
{
    global $dbconn;
    $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$fjalekalimi'";
    $result = mysqli_query($dbconn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $useri = array();
        $useri['id'] = $row['id'];
        $useri['emrimbiemri'] = $row['Emri'] . " " . $row['Mbiemri'];
        $useri['emri'] = $row['Emri'];
        $useri['mbiemri'] = $row['Mbiemri'];
        $useri['email'] = $row['Email'];
        $useri['phone'] = $row['Phone'];
        $useri['roli'] = $row['Roli'];
        $useri['username'] = $row['Username'];

        $_SESSION['useri'] = $useri;

        // Redirect based on user role
        if ($useri['roli'] == 'Administrator' or $useri['roli'] == 'Perdorues') {
            header("Location: dashboard/index.php");
        } elseif ($useri['roli'] == 'Klient') {
            header("Location: index.php");
        } else {
            // Redirect to a default location or display an error message
            echo "Invalid user role";
        }
    } else {
        echo "Nuk ka perdorues me keto shenime";
    }
}


//////////////////////////////////////////////////////////////////////////////////////

// FUNKSIONET PER VETURE
function merrVeturat(){
    global $dbconn;
    $sql = "SELECT * FROM veturat";
    return mysqli_query($dbconn, $sql);
}

//////////////////////////////////////////////////////////////////////////////////////

function shtoVeture($marka, $modeli, $kubik, $cmimi, $vitiprodhimit, $karburanti, $transmisioni, $ngjyra, $kilometrazha, $historia,$emri, $img)
{
    if ($marka == '' or $modeli == '' or $kubik == '' or $cmimi == '' or $vitiprodhimit == '' or  $karburanti == '' or $transmisioni == '' or $ngjyra == ''  or $kilometrazha == '' or $historia == '') {
        echo "Ju lutem plotesoni te gjitha kolonat";
    } else if (!is_numeric($cmimi)) {
        echo "Ju lutem rishkruani cmimin ne numer";
    } else {
        global $dbconn;

        if ($img['name']) {
            // Check if the image file is uploaded successfully
            if (move_uploaded_file($img['tmp_name'], "carsimg/" . $img['name'])) {
                $img_path =  "carsimg/" . $img['name'];
            } else {
                echo "Gabim gjate ngarkimit te fotos";
                return;
            }
        }

        $sql = "INSERT INTO veturat(Marka, Modeli, VitiProdhimit, Cmimi, Karburanti, Kilometrazha, Img, InsertedBy, Ngjyra,Historia, Kubik, Transmisioni )";
        $sql .= " VALUES ('$marka','$modeli','$vitiprodhimit','$cmimi','$karburanti','$kilometrazha','$img_path','$emri','$ngjyra','$historia','$kubik','$transmisioni')";
        $result = mysqli_query($dbconn, $sql);
        if ($result) {
            echo "Vetura u shtua me sukses";
        } else {
            echo "Vetura nuk u shtua me sukses";
        }
    }
}

//////////////////////////////////////////////////////////////////////////////////////
function merrVeturenSpecifike($idvetura)
{
    global $dbconn;
    $sql = "SELECT * FROM veturat where ID=$idvetura";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}

//////////////////////////////////////////////////////////////////////////////////////
function editoVeture($id, $marka, $modeli, $vitiprodhimit, $cmimi, $karburanti, $kilometrazha, $img, $ngjyra,$historia,$kubik,$transmisioni,$emri)
{
    global $dbconn;

    if ($img['name'] && $img['size'] > 0) {
        // Check if the image file is uploaded successfully
        if (move_uploaded_file($img['tmp_name'], "carsimg/" . $img['name'])) {
            $img_path = "carsimg/" . $img['name'];
        } else {
            echo "Gabim gjate ngarkimit te fotos";
            return;
        }
    } else {
        // Handle the case where no file is selected
        echo "Nuk keni zgjedhur nje fajl per ngarkim.";
        return;
    }

    $sql = "UPDATE veturat SET Marka='$marka', Modeli='$modeli', VitiProdhimit='$vitiprodhimit', Cmimi='$cmimi', Karburanti='$karburanti', Kilometrazha='$kilometrazha', Img='$img_path', Ngjyra='$ngjyra',Historia='$historia',Kubik='$kubik',Transmisioni='$transmisioni',EditedBy='$emri'";
    $sql .= " WHERE ID=$id";
    $result = mysqli_query($dbconn, $sql);

    if ($result) {
        echo "Vetura u modifikua me sukses";
    } else {
        echo "Vetura nuk u modifikua me sukses";
    }
}

//////////////////////////////////////////////////////////////////////////////////////
function fshijVeturen($id)
{
    global $dbconn;
    $sql = "DELETE FROM veturat WHERE ID=$id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Vetura u fshi me sukses";
    } else {
        echo "Vetura nuk u fshi me sukses";
    }
}

//////////////////////////////////////////////////////////////////////////////////////

// show cars
function showCars() {
    global $dbconn;
    $sql = "SELECT * FROM veturat";
    $result = mysqli_query($dbconn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $Marka = $row['Marka'];
        $Modeli = $row['Modeli'];
        $VitiProdhimit = $row['VitiProdhimit'];
        $Cmimi = $row['Cmimi'];
        $Karburanti = $row['Karburanti'];
        $Kilometrazha = $row['Kilometrazha'];
        $Marka_Modeli = $row['Marka'] . " " . $row['Modeli'];
        $Img = $row['Img'];
?>
        <div class="card ferrari" style="margin-bottom: 25px;">
            <div class="image-content">
                <span class="overlay"></span>
                <div class="card-image">
                    <img src="<?php echo 'dashboard/'; echo $Img; ?>" alt="" class="card-img">
                </div>
            </div>
            <div class="card-content">
                <h2 class="name"><?php echo $Marka_Modeli; ?></h2><br>
                <p class="description"><?php echo $Cmimi; ?> €</p><br>
                <button class="viewmorebttn" onclick="location.href = 'Details.php?ID=<?php echo $ID; ?>'">View More</button>
            </div>
        </div>

        
<?php

    }
}

//////////////////////////////////////////////////////////////////////////////////////
function showTopCars() {
    global $dbconn;
    $sql = "SELECT * FROM veturat order by Cmimi DESC LIMIT 6";
    $result = mysqli_query($dbconn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $Marka = $row['Marka'];
        $Modeli = $row['Modeli'];
        $VitiProdhimit = $row['VitiProdhimit'];
        $Cmimi = $row['Cmimi'];
        $Karburanti = $row['Karburanti'];
        $Kilometrazha = $row['Kilometrazha'];
        $Marka_Modeli = $row['Marka'] . " " . $row['Modeli'];
        $Img = $row['Img'];
?>
         <div class="card" style="margin-bottom: 30px;">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php echo 'dashboard/'; echo $Img; ?>" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name"><?php echo $Marka_Modeli; ?></h2><br>
                        <p class="description"><?php echo $Cmimi; ?> €</p><br>

                            <button class="viewmorebttn" onclick="location.href = 'Details.php?ID=<?php echo $ID; ?>'">View More</button>

                    </div>
                </div>

        
<?php

    }
}
// END FUNKSIONET PER VETURE
//////////////////////////////////////////////////////////////////////////////////////



// FUNKSIONET PER USERA
function merrUserat(){
    global $dbconn;
    $sql = "SELECT * FROM users";
    return mysqli_query($dbconn, $sql);
}

//////////////////////////////////////////////////////////////////////////////////////
function merrUserinSpecifike($id)
{
    global $dbconn;
    $sql = "SELECT * FROM users where ID=$id";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}

//////////////////////////////////////////////////////////////////////////////////////
function editoUserin($id,$emri, $mbiemri, $email, $phone, $roli, $username, $password)
{
    global $dbconn;
    $sql = "UPDATE users SET Emri='$emri',Mbiemri='$mbiemri', Email='$email', Phone='$phone', Roli='$roli', Username='$username', Password='$password'";
    $sql .= " WHERE ID=$id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Useri u modifikua me sukses";
    } else {
        echo "Useri nuk u modifikua me sukses";
    }
}

//////////////////////////////////////////////////////////////////////////////////////
function shtoUser($emri, $mbiemri, $email, $phone, $roli, $username, $password)
{
    if ($emri == '' or $mbiemri == '' or $email == '' or $phone == '' or $roli == '' or $username == '' or $password == '') {
        echo "Ju lutem plotesoni te gjitha fushat";
    } else if (!is_numeric($phone)){
        echo "ju lutem rishkruani nr.phone ne numer";
    }else {
       
    global $dbconn;
    $sql = "INSERT INTO users(Emri, Mbiemri, Email, Phone,Roli,Username, Password)";
    $sql .= " VALUES ('$emri','$mbiemri','$email','$phone','$roli','$username','$password')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Regjistrimi u be me sukses";
    } else {
        echo "Regjistrimi nuk u be me sukses";
    }
}
}

//////////////////////////////////////////////////////////////////////////////////////
function fshijUserin($id)
{
    global $dbconn;
    $sql = "DELETE FROM users WHERE ID=$id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Useri u fshi me sukses";
    } else {
        echo "Useri nuk u fshi me sukses";
    }
}

//////////////////////////////////////////////////////////////////////////////////////
function numriUserave() {
    global $dbconn;
    $sql = "SELECT count(*) as NrUserave FROM users";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}


function numriVeturave() {
    global $dbconn;
    $sql = "SELECT count(*) as NrVeturave FROM veturat";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}


function numriMesazheve() {
    global $dbconn;
    $sql = "SELECT count(*) as NrMesazheve FROM contact";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}

function numriTermineve() {
    global $dbconn;
    $sql = "SELECT count(*) as NrTermineve FROM terminet";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}
function numriKlienteve() {
    global $dbconn;
    $sql = "SELECT count(*) as NrKlienteve FROM users WHERE Roli='Klient'";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}
function numriPuntoreve() {
    global $dbconn;
    $sql = "SELECT count(*) as NrPuntoreve FROM users WHERE Roli='Perdorues'";
    $result = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($result);
}

//////////////////////////////////////////////////////////////////////////////////////

function register($emri, $mbiemri, $email, $phone, $username, $password)
{
    if ($emri == '' or $mbiemri == '' or $email == '' or $phone == '' or $username == '' or $password == '') {
        echo "Ju lutem plotesoni te gjitha fushat";
    } else if (!is_numeric($phone)) {
        echo "ju lutem rishkruani nr.phone ne numer";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ju lutem shkruani nje adrese email valide";
    } else {
        global $dbconn;
        
        // Check if the user already exists
        $sql = "SELECT * FROM users WHERE Email = '$email' OR Username = '$username'";
        $result = mysqli_query($dbconn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User already exists
            echo "Ky user veqse ekziston!";
        } else {
            // User does not exist, proceed with the INSERT
            $sql = "INSERT INTO users(Emri, Mbiemri, Email, Phone,Username, Password, Roli)";
            $sql .= " VALUES ('$emri','$mbiemri','$email','$phone','$username','$password','Klient')";

            // Try executing the query
            if (mysqli_query($dbconn, $sql)) {
                // Query executed successfully
                echo "Regjistrimi u be me sukses";
                header("Location: login.php");
            } else {
                // Other error
                echo "Regjistrimi nuk u be me sukses";
            }
        }
    }
}

//////////////////////////////////////////////////////////////////////////////////////

function shtoContact($name, $email, $message)
{
    if ($name == '' or $email == '' or $message == '') {
        echo "Ju lutem plotesoni te gjitha fushat";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ju lutem shkruani nje adrese email valide";
    } else {
       
    global $dbconn;
    $sql = "INSERT INTO contact(Emri, Email, Komenti)";
    $sql .= " VALUES ('$name','$email','$message')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Mesazhi u dergua me sukses!";
    } else {
        echo "Mesazhi nuk u dergua me sukses!";
    }
}
}


function merrContact(){
    global $dbconn;
    $sql = "SELECT * FROM contact";
    return mysqli_query($dbconn, $sql);
}

//////////////////////////////////////////////////////////////////////////////////////

function shtoTermin($koha, $message, $emri, $mbiemri, $email, $phone,$idvetura,$Marka,$Modeli)
{
    if ($koha == '' or $message == '' ) {
        echo "Ju lutem plotesoni te gjitha kolonat";
    } else {
       
    global $dbconn;
    $sql = "INSERT INTO terminet(IDVetura,Marka, Modeli, Emri_Klienti,Mbiemri_Klienti,Email_Klienti, Phone_Klienti,KohaTerminit,Koment)";
    $sql .= " VALUES ('$idvetura','$Marka','$Modeli','$emri','$mbiemri','$email','$phone','$koha','$message')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Termini u shtua me sukses";
    } else {
        echo "Termini nuk u shtua me sukses";
    }
}
}

function merrTerminin(){
    global $dbconn;
    $sql = "SELECT * FROM terminet";
    return mysqli_query($dbconn, $sql);
}

//////////////////////////////////////////////////////////////////////////////////////


function merrAbout()
{
    global $dbconn;
    $sql = "SELECT * FROM about ";
    return mysqli_query($dbconn, $sql);
}


function showAbout() {
    global $dbconn;
    $sql = "SELECT * FROM about";
    $result = mysqli_query($dbconn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $Teksti = $row['Teksti'];
?>
    <div class="aboutboxdiv-text">
        <p><?php echo $Teksti; ?></p>
    </div>
<?php
    }
}

function saveAboutChanges($Teksti)
{
    global $dbconn;
    $sql = "UPDATE about SET Teksti = '$Teksti'"; // Update the WHERE clause as needed
    mysqli_query($dbconn, $sql);
}
