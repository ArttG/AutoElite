<?php include("header.php"); ?>

<div class="dashboard-item" style="margin-top:100px;">
        <!-- <p>Veturat</p> -->
        <div class="btn-shto-crud">
        <button onclick="location.href = 'shtoUser.php'">Shto</button>
        </div>
        <form id="vetura">
        <table class="table-dashboard">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Roli</th>
                <th>Username</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                $result=merrUserat();
                $i=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id=$row['ID'];
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Emri'] . "</td>";
                    echo "<td>" . $row['Mbiemri'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['Roli'] . "</td>";
                    echo "<td>" . $row['Username'] . "</td>";
                    echo "<td>" . $row['Password'] . "</td>";
                    echo "<td><div><button class='edito-button'><a href='editUser.php?id={$id}' style='color:white;'>Edit</a></button></div></td>";
                    echo "<td><div><button class='fshij-button'><a href='fshijUser.php?id={$id}' style='color:white;'>Fshij</a></button></div></td>";


                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
            </form>
    </div>

</body>
