
<?php include "header.php" ?>

<div class="dashboard-user">
    <div class="dashboard-shto-item">
        <div class="btn-kthehu">
        <p>Fshij Userin</p>
            <button class="kthehu" onclick="location.href = 'userscrud.php'">Kthehu</button>
        </div>
        <section id="content" class="box-content">
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $row=merrUserinSpecifike($id);
            $Emri=$row['Emri'];
            $Mbiemri=$row['Mbiemri'];
            $Email=$row['Email'];
            $Phone=$row['Phone'];
            $Roli=$row['Roli'];
            $Username=$row['Username'];
            $Password=$row['Password'];

        }
        if (isset($_POST['fshij'])) {
            fshijUserin($id);
        }
        ?>
         <form method="post" id="useri" class="box-shto">
            <fieldset>
                <label>Emri:</label>
                <input type="text" name="emri" id="emri" value="<?php if(!empty($Emri)) echo $Emri; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Mbiemri:</label>
                <input type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($Mbiemri)) echo $Mbiemri; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Email:</label>
                <input type="text" name="email" id="email" value="<?php if(!empty($Email)) echo $Email; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Phone:</label>
                <input type="text" name="phone" id="phone" value="<?php if(!empty($Phone)) echo $Phone; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Roli:</label>
                <input type="text" name="roli" id="roli" value="<?php if(!empty($Roli)) echo $Roli; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Username:</label>
                <input type="text" name="username" id="username" value="<?php if(!empty($Username)) echo $Username; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Password:</label>
                <input type="text" name="password" id="password" value="<?php if(!empty($Password)) echo $Password; ?>"><br />
            </fieldset>
            
            <input type="submit" name="fshij" value="Fshij">
        </form>
    </section>
    </div>
</div>
