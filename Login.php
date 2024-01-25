<?php include("header.php"); ?>
<?php
if(isset($_POST['login'])){
    //echo $_POST['email'];
    login($_POST['username'],$_POST['fjalekalimi']);
}

?>

    <div class="hero">
    <div class="login">
      <form method="post" id="loginForm">
    <div class="login-form">
        <p>Login</p>
        <div class="login-all-item">
            <div class="login-item">
                <label>Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="login-item">
                <label>Password</label>
               <input type="password" name="fjalekalimi" id="fjalekalimi">
            </div>
        </div>
        <div class="account"><p><span>Don't have an account? </span><a href="signup.php">Sign Up</a></p></div>
        <div class="btn-login">
            <input type="submit" name="login" value="Login">
        </div>
    </div>
    
    </form>
</div>
    
    </div>

  <?php include("footer.php"); ?>

    
</body>
</html>