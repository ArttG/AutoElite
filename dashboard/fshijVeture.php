
<?php include "header.php" ?>

<div class="dashboard-shto">
    <div class="dashboard-shto-item">
        <div class="btn-kthehu">
        <p>Fshij Veturen</p>
            <button class="kthehu" onclick="location.href = 'carscrud.php'">Kthehu</button>
        </div>
        <section id="content" class="box-content">
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $row=merrVeturenSpecifike($id);
            $Marka=$row['Marka'];
            $Modeli=$row['Modeli'];
            $VitiProdhimit=$row['VitiProdhimit'];
            $Cmimi=$row['Cmimi'];
            $Karburanti=$row['Karburanti'];
            $Kilometrazha=$row['Kilometrazha'];
            $Ngjyra=$row['Ngjyra'];
            $Historia=$row['Historia'];
            $Kubik=$row['Kubik'];
            $Transmisioni=$row['Transmisioni'];

        }
        if (isset($_POST['fshij'])) {
            fshijVeturen($id);
        }
        ?>
        <form method="post" id="vetura" class="box-shto">
            <fieldset>
            <label>Marka:</label>
                <input type="text" name="marka" id="marka" value="<?php if(!empty($Marka)) echo $Marka; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Modeli:</label>
                <input type="text" name="modeli" id="modeli" value="<?php if(!empty($Modeli)) echo $Modeli; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Kubikazha:</label>
                <input type="float" name="kubik" id="kubik" value="<?php if(!empty($kubik)) echo $kubik; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Cmimi:</label>
                <input type="text" name="cmimi" id="cmimi" value="<?php if(!empty($Cmimi)) echo $Cmimi; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Viti Prodhimit:</label>
                <input type="text" name="vitiprodhimit" id="vitiprodhimit" value="<?php if(!empty($VitiProdhimit)) echo $VitiProdhimit; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Karburanti:</label>
                <input type="text" name="karburanti" id="karburanti" value="<?php if(!empty($Karburanti)) echo $Karburanti; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Transmisioni:</label>
                <input type="text" name="transmisioni" id="transmisioni" value="<?php if(!empty($Transmisioni)) echo $Transmisioni; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Ngjyra:</label>
                <input type="text" name="ngjyra" id="ngjyra" value="<?php if(!empty($Ngjyra)) echo $Ngjyra; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Kilometrazha:</label>
                <input type="text" name="kilometrazha" id="kilometrazha" value="<?php if(!empty($Kilometrazha)) echo $Kilometrazha; ?>"><br />
            </fieldset>
            <fieldset>
                <label>Historia:</label>
                <input type="text" name="historia" id="historia" value="<?php if(!empty($Historia)) echo $Historia; ?>"><br />
            </fieldset>
                <fieldset>
                    <label>Ngarko Foto:</label>
                    <input type="file" autocomplete="new-password" id="img" name="img" class="form-control"><br />
                </fieldset>
            <input type="submit" name="fshij" value="Fshij">
        </form>
    </section>
    </div>
</div>
