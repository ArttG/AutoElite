<?php include("header.php"); ?>


<div class="dashboard-item" style="margin-top:100px;">
        <!-- <p>Veturat</p> -->
        <div class="btn-shto-crud">
        <button onclick="location.href = 'shtoVeture.php'">Shto</button>
        </div>
        <form id="vetura">
        <table class="table-dashboard">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Modeli</th>
                <th>Kubikazha</th>
                <th>Cmimi</th>
                <th>Viti Prodhimit</th>
                <th>Karburanti</th>
                <th>Transmisioni</th>
                <th>Ngjyra</th>
                <th>Kilometrazha</th>
                <th>Historia</th>
                <th>Insertuar Nga</th>
                <th>Edituar Nga</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                $result=merrVeturat();
                $i=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id=$row['ID'];
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Marka'] . "</td>";
                    echo "<td>" . $row['Modeli'] . "</td>";
                    echo "<td>" . $row['Kubik'] . "</td>";
                    echo "<td>" . $row['Cmimi'] . "</td>";
                    echo "<td>" . $row['VitiProdhimit'] . "</td>";
                    echo "<td>" . $row['Karburanti'] . "</td>";
                    echo "<td>" . $row['Transmisioni'] . "</td>";
                    echo "<td>" . $row['Ngjyra'] . "</td>";
                    echo "<td>" . $row['Kilometrazha'] . "</td>";
                    echo "<td>" . $row['Historia'] . "</td>";
                    echo "<td>" . $row['InsertedBy'] . "</td>";
                    echo "<td>" . $row['EditedBy'] . "</td>";
                    echo "<td><div><button class='edito-button'><a href='editVeture.php?id={$id}' style='color:white;'>Edit</a></button></div></td>";
                    echo "<td><div><button class='fshij-button'><a href='fshijVeture.php?id={$id}' style='color:white;'>Fshij</a></button></div></td>";


                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
            </form>
    </div>

</body>
