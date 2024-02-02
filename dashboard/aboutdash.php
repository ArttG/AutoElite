<?php include("header.php"); ?>

<style>


</style>
<div class="dashboard-item-about" style="margin-top:100px;">
    <form id="vetura" method="post">
    <?php
    if (isset($_POST['saveChanges'])) {
        saveAboutChanges($_POST['updatedText']);
    }
    ?>
        <table class="table-dashboard-about">
            <tbody>
                <tr>
                    <th class="thth-about">Info</th>
                </tr>
                <?php

                $result = merrAbout();
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='scrollable-column'>";
                    echo "<textarea name='updatedText'>" . htmlspecialchars($row['Teksti']) . "</textarea>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit" name="saveChanges" class="aboutbutton">Ruaj Ndryshimet</button>
    </form>

    

</div>

</body>
