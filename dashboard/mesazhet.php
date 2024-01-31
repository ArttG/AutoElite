<?php include("header.php"); ?>

<style>
    .scrollable-column {
        max-width: 20vh; 
    }

</style>
<div class="dashboard-item" style="margin-top:100px;">
        <!-- <p>Veturat</p> -->
        <form id="vetura">
        <table class="table-dashboard">
            <tbody>
            <tr>
                <th class="thth">ID</th>
                <th class="thth">Emri</th>
                <th class="thth">Email</th>
                <th class="thth">Mesazhi</th>
                <th class="thth">Koha e dergimit</th>
            </tr>
            <?php
        $result = merrContact();
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Emri'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td class='scrollable-column' title='" . htmlspecialchars($row['Komenti']) . "'>" . $row['Komenti'] . "</td>";
            echo "<td>" . $row['InsertedTime'] . "</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
        </table>
            </form>
    </div>

</body>
