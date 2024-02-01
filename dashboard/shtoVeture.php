<?php include "header.php" ?>

<div class="dashboard-shto">
    <div class="dashboard-shto-item">
        <div class="btn-kthehu">
            <p>Regjistro Veturen</p><button class="kthehu" onclick="location.href = 'carscrud.php'">Kthehu</button>
        </div>
        <section id="content" class="box-content">
            <?php
            if (isset($_POST['shto'])) {
                // Add the 'img' parameter in the function call
                shtoVeture($_POST['marka'], $_POST['modeli'], $_POST['kubik'], $_POST['cmimi'], $_POST['vitiprodhimit'],  $_POST['karburanti'], $_POST['transmisioni'], $_POST['ngjyra'] , $_POST['kilometrazha'], $_POST['historia'], $emri, $_FILES['img']);
            }
            ?>
            <form method="post" enctype="multipart/form-data" id="vetura" class="box-shto">
                  <fieldset>
                <label>Marka:</label>
                <input type="text" name="marka" id="marka"><br />
            </fieldset>
            <fieldset>
                <label>Modeli:</label>
                <input type="text" name="modeli" id="modeli"><br />
            </fieldset>
            <fieldset>
                <label>Kubikazha:</label>
                <input type="float" name="kubik" id="kubik"><br />
            </fieldset>
            <fieldset>
                <label>Cmimi:</label>
                <input type="text" name="cmimi" id="cmimi"><br />
            </fieldset>
            <fieldset>
                <label>Viti Prodhimit:</label>
                <input type="text" name="vitiprodhimit" id="vitiprodhimit"><br />
            </fieldset>
            <fieldset>
                <label>Karburanti:</label>
                <input type="text" name="karburanti" id="karburanti"><br />
            </fieldset>
            <fieldset>
                <label>Transmisioni:</label>
                <input type="text" name="transmisioni" id="transmisioni"><br />
            </fieldset>
            <fieldset>
                <label>Ngjyra:</label>
                <input type="text" name="ngjyra" id="ngjyra"><br />
            </fieldset>
            <fieldset>
                <label>Kilometrazha:</label>
                <input type="text" name="kilometrazha" id="kilometrazha"><br />
            </fieldset>
            <fieldset>
                <label>Historia:</label>
                <input type="text" name="historia" id="historia"><br />
            </fieldset>
                <fieldset>
                    <label>Ngarko Foto:</label>
                    <input type="file" autocomplete="new-password" id="img" name="img" class="form-control"><br />
                </fieldset>

                <input type="submit" name="shto" value="Shto">
            </form>
        </section>
    </div>
</div>


