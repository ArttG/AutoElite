<?php include("header.php"); 
?>

    <div class="info">
    <div class="contact">
        <div class="logo">
            <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="text">
        <h2>OUR MAIN LOCATION</h2><br>
        <p><center>Kosove, Prishtine, Lagjia Lakrishte</center></p>
        </div>
    </div>
    <div class="contact">
        <div class="logo">
            <i class="fa-solid fa-phone"></i>
        </div>
        <div class="text">
        <h2>PHONE NUMBER</h2><br>
        <p><center>+383 44/49 123 456</center></p>
        </div>
    </div>
    <div class="contact">
        <div class="logo">
            <i class="fa-solid fa-fax"></i>
        </div>
        <div class="text">
        <h2>FAX</h2><br>
        <p><center>1-234-567-8900</center></p>
        </div>
    </div>
    <div class="contact">
        <div class="logo">
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="text">
        <h2>EMAIL</h2><br>
        <p><center>agf12345@ubt-uni.net</center></p>
        </div>
    </div>
</div>
<div class="flex">
    <div class="box">
        <?php 
        if (isset($_POST['contact'])) {
            shtoContact($_POST['name'],$_POST['email'],$_POST['message']);
        }
        ?>
        
        <form method="post" id="contact">
            <h1>Contact Us</h1>
            <input type="text" name="name" placeholder="Enter Your Name">
            <input type="email" name="email" placeholder="Enter Your Email">
            <textarea name="message" rows="10" placeholder="Your Message"></textarea>
            <button type="submit" name="contact" value="contact">Submit</button>
        </form>
    </div>
</div>
    <footer>
        <div class="f">
            <h2>About AutoElite</h2>
            <h2>Our Links</h2>
            <h2>Our Location</h2>
        </div>
        <div class="footermain">
            <div class="footerleft">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="footercenter">
                <p>Advertise</p>
                <p>Support</p>
                <p>Our Company</p>
                <p>Contact</p>
            </div>
            <div class="footerright">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3633.9613204546326!2d21.151678975596226!3d42.646907446225384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e8d5d607f25%3A0xa31dd05b21bd09de!2sUBT%20College!5e1!3m2!1sen!2sbe!4v1701801862820!5m2!1sen!2sbe" 
                width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="fundi">
            <p>Copyright 2020 AutoEliteCars. All rights reserved.</p>
        </div>
    </footer>
    
</body>
</html>