
<?php include "header.php" ?>

<div class="dashboard-user">
    <div class="dashboard-shto-item">
        <div class="btn-kthehu">
        <p>Edito Userin</p>
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
        if (isset($_POST['edito'])) {
            editoUserin($id, $_POST['emri'], $_POST['mbiemri'],$_POST['email'], 
            $_POST['phone'], $_POST['roli'], $_POST['username'], $_POST['password']);
            
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
                <select type="text" name="roli" id="roli">
                    <option value="">--Zgjedh Rolin--</option>
                    <option value="Administrator" <?php if ($Roli == 'Administrator') echo 'selected'; ?>>Administrator</option>
                    <option value="Perdorues" <?php if ($Roli == 'Perdorues') echo 'selected'; ?>>Perdorues</option>
                    <option value="Klient" <?php if ($Roli == 'Klient') echo 'selected'; ?>>Klient</option>
                </select>
            </fieldset>
            <fieldset>
                <label>Username:</label>
                <input type="text" name="username" id="username" value="<?php if(!empty($Username)) echo $Username; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Password:</label>
                <input type="text" name="password" id="password" value="<?php if(!empty($Password)) echo $Password; ?>"><br />
            </fieldset>
            
            <input type="submit" name="edito" value="Ruaj">
        </form>
    </section>
    </div>
</div>
