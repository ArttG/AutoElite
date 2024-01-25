<?php include("header.php"); ?>



    <div class="listaLogovCars">
        <ul class="categoryCars" id="logos">
            <li><img src="img/lamborghini-logo.png.webp" alt="" id="lambologo"></li>
            <li><img src="img/bmw-logo.png.webp" alt="" id="bmwLogo"></li>
            <li><img src="img/mercedes-benz-logo.png.webp" alt="" id="benzlogo"></li>
            <li><img src="img/porsche-logo.png.webp" alt="" id="porschelogo"></li>
            <li><img src="img/audi-logo.png.webp" alt="" id="audilogo"></li>
            <li><img src="img/ferrari.webp" alt="" id="ferrarilogo"></li>
            <li><img src="img/rollsroyce.webp" alt="" id="rollslogo"></li>
            <li><img src="img/bentley.png" alt="" id="bentlogo"></li>
            <li><img src="img/Nissan_logo.png" alt="" id="gtrlogo"></li>
            <li><img src="img/Bugatti-logo-1024x768.webp" alt="" id="bugattilogo"></li>
        </ul>
    </div>

     <div class="slide-container" id="div1">
        <div class="slide-content">

                    <?php showCars(); ?>
           
        </div>
    </div>

    <?php include("footer.php"); ?>
   
</body>

</html>