<?php include("header.php"); ?>

<html>
<body>

    <div class="herosignup">
    <div class="login">
     
        
      <form method="post" id="loginForm">

    <div class="login-form">
         <?php
             if(isset($_POST['register'])){
                 //echo $_POST['email'];
                 register($_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['phone'],$_POST['username'],$_POST['fjalekalimi']);
             }
         ?>
        <p>Register</p>
        <div class="login-all-item">
            <div class="login-item">
                <label>Emri</label>
                <input type="text" name="emri" id="emri">
            </div>
            <div class="login-item">
                <label>Mbiemri</label>
                <input type="text" name="mbiemri" id="mbiemri">
            </div>
            <div class="login-item">
                <label>Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="login-item">
                <label>Phone</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="login-item">
                <label>Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="login-item">
                <label>Password</label>
               <input type="password" name="fjalekalimi" id="fjalekalimi">
            </div>
        </div>
        <div class="account"><p><span>Already a member? </span><a href="login.php">Log in</a></p></div>
        <div class="btn-login">
            <input type="submit" name="register" value="register">
        </div>
    </div>
    
    </form>

</div>
    
    </div>

  <?php include("footer.php"); ?>

    
</body>
</html>