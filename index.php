<?php include("header.php");
 
?>

    <div class="hero">
        <div class="text">
            <h1>Fierce to <br> <span>Drive</span></h1>
            <p>Real Poise, Real Power, Real Perfomance.</p>
            <a href="Cars.php" class="btn">View the cars</a>
        </div>
    </div>
    <h2 class="Makes"><center>Our Top Makes</center></h2><br>
    <div class="listaLogovIndex">
        <div class="logoslider-containerIndex">
            <i class="fa fa-chevron-left slider-arrow" onclick="prevSlide()"></i>
            <ul class="categoryIndex" id="logoSlider">
                <li><img src="img/lamborghini-logo.png.webp" alt=""></li>
                <li><img src="img/bmw-logo.png.webp" alt=""></li>
                <li><img src="img/mercedes-benz-logo.png.webp" alt=""></li>
                <li><img src="img/porsche-logo.png.webp" alt=""></li>
                <li><img src="img/audi-logo.png.webp" alt=""></li>
                <li><img src="img/ferrari.webp" alt=""></li>
                <li><img src="img/rollsroyce.webp" alt=""></li>
                <li><img src="img/bentley.png" alt=""></li>
                <li><img src="img/Land_Rover_logo_black.svg.png" alt=""></li>
                <li><img src="img/Bugatti-logo-1024x768.webp" alt=""></li>
            </ul>
            <i class="fa fa-chevron-right slider-arrow" onclick="nextSlide()"></i>
        </div>
    </div>
    
    <h2 class="arrivals"><center>Luxury Exclusive Cars</center></h2>
    <div class="slide-container">
        <div class="slide-content">
               
        <?php showTopCars(); ?>

        </div>
    </div>
    
    
  <?php include("footer.php"); ?>


    <script>
            let heroBg = document.querySelector('.hero');

            setInterval(() => {
                heroBg.style.backgroundImage = "url(img/bg-light.jpg)"
        
            setTimeout(() => {
                heroBg.style.backgroundImage = "url(img/bg.jpg)"
             }, 1000);
        }, 2200);

        const logoSlider = document.getElementById('logoSlider');
        const logos = Array.from(document.querySelectorAll('.categoryIndex li'));
    
        function nextSlide() {
            const firstLogo = logos.shift();
            logos.push(firstLogo);
            logoSlider.appendChild(firstLogo);
            showLogos();
        }
    
        function prevSlide() {
            const lastLogo = logos.pop();
            logos.unshift(lastLogo);
            logoSlider.insertBefore(lastLogo, logoSlider.firstChild);
            showLogos();
        }
    
        function showLogos() {
            logos.forEach((logo, index) => {
                logo.style.display = index < 6 ? 'block' : 'none';
            });
        }

        showLogos();
    </script>
</body>
</html>