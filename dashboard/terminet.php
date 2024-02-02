<?php include("header.php"); ?>

<style>
    .scrollable-column {
        max-width: 20vh; /* Set the maximum width for the column */
    }

</style>
<div class="dashboard-item" style="margin-top:100px;">
        <!-- <p>Veturat</p> -->
        <form id="termini">
        <table class="table-dashboard">
            <tbody>
            <tr>
                <th class="thth">ID</th>
                <th class="thth">Emri i Klienit</th>
                <th class="thth">Mbiemri i Klientit</th>
                <th class="thth">Email i Klientit</th>
                <th class="thth">Numri i Telefonit</th>
                <th class="thth">Marka</th>
                <th class="thth">Modeli</th>
                <th class="thth">Data e Terminit</th>
                <th class="thth">Komenti</th>
                <th class="thth">Koha e Kerkeses</th>
            </tr>
            <?php
        $result = merrTerminin();
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Emri_Klienti'] . "</td>";
            echo "<td>" . $row['Mbiemri_Klienti'] . "</td>";
            echo "<td>" . $row['Email_Klienti'] . "</td>";
            echo "<td>" . $row['Phone_Klienti'] . "</td>";
            echo "<td>" . $row['Marka'] . "</td>";
            echo "<td>" . $row['Modeli'] . "</td>";
            echo "<td>" . $row['KohaTerminit'] . "</td>";
            echo "<td class='scrollable-column' title='" . htmlspecialchars($row['Koment']) . "'>" . $row['Koment'] . "</td>";
            echo "<td>" . $row['InsertedTime'] . "</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
        </table>
            </form>
    </div>

</body>
