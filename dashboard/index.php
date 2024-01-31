<?php include("header.php"); 

$emri = $_SESSION['useri']['emri']; 
$mbiemri = $_SESSION['useri']['mbiemri'];
$roli = $_SESSION['useri']['roli']; 

?>

<html>
<body>

<div id="main-content-index" >
    <!-- Display user information -->
    <!-- <?php echo $roli; ?> -->
    <?php 
        $row=numriUserave();
        $NrUserave=$row['NrUserave'];

        $row=numriVeturave();
        $NrVeturave=$row['NrVeturave'];

        $row=numriMesazheve();
        $NrMesazheve=$row['NrMesazheve'];
        ?>
        
     <?php 
        if ($roli  == 'Administrator') { ?>
        <div class="card-indexdash" onclick="location.href = 'userscrud.php'">
     <?php 
        } else { ?>
        <div class="card-indexdash">
     <?php } ?>   
        <h2>Përdoruesit</h2>
        <p><?php echo $NrUserave; ?></p>
        <i class="fa-solid fa-users"></i>
    </div>

    <div class="card-indexdash" onclick="location.href = 'carscrud.php'">
        <h2>Vetura ne Stock</h2>
        <p><?php echo $NrVeturave; ?></p>
        <i class="fa-solid fa-car"></i>
    </div>

    <?php 
        if ($roli  == 'Administrator') { ?>
         <div class="card-indexdash" onclick="location.href = 'mesazhet.php'">
     <?php 
        } else { ?>
         <div class="card-indexdash">
     <?php } ?>  
   
        <h2>Mesazhet</h2>
        <p><?php echo $NrMesazheve; ?></p>
        <i class="fa-solid fa-message"></i>
    </div>
</div>
<div id="main-content-index2" >
    <!-- Display user information -->
    <!-- <?php echo $roli; ?> -->
    <?php 
        $row=numriTermineve();
        $NrTermineve=$row['NrTermineve'];

        $row=numriKlienteve();
        $NrKlienteve=$row['NrKlienteve'];

        $row=numriPuntoreve();
        $NrPuntoreve=$row['NrPuntoreve'];
        ?>
        
    <div class="card-indexdash" onclick="location.href = 'terminet.php'">
        <h2>Termine</h2>
        <p><?php echo $NrTermineve; ?></p>
        <i class="fa-solid fa-calendar-check"></i>
    </div>


    <?php 
        if ($roli  == 'Administrator') { ?>
         <div class="card-indexdash" onclick="location.href = 'mesazhet.php'">
     <?php 
        } else { ?>
         <div class="card-indexdash">
     <?php } ?>  
        <h2>Klientë</h2>
        <p><?php echo $NrKlienteve; ?></p>
        <i class="fa-solid fa-person"></i>
    </div>


    <?php 
        if ($roli  == 'Administrator') { ?>
         <div class="card-indexdash" onclick="location.href = 'mesazhet.php'">
     <?php 
        } else { ?>
         <div class="card-indexdash">
     <?php } ?>  
        <h2>Punëtorë</h2>
        <p><?php echo $NrPuntoreve; ?></p>
        <i class="fa-solid fa-user"></i>
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>
