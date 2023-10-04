<?php
include "inc/header.php";
?>

<section class="list-entity container">
    <div class="image">
        <img src="img/car9.jpg" alt="">
    </div>

    <p id="mesazhi">
        <?php
            if(isset($_SESSION['mesazhi'])){
                echo $_SESSION['mesazhi'];
            }
        ?>
    </p>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Pershkrimi</th>
                <th>Kostoja</th>
                <th>Modifiko</th>
                <th>Fshiej</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $kategorit = merrKategorit();

            while ($kategoria = mysqli_fetch_assoc($kategorit)) {
                $kid = $kategoria['kategoriaid'];
                echo "<tr class='active-row'>";
                echo "<td>" . $kategoria['emri'] . "</td>";
                echo "<td>" . $kategoria['pershkrimi'] . "</td>";
                echo "<td>" . $kategoria['kostoja'] . "</td>";
                echo "<td><a href='shto_modifiko_kategori.php?kid=$kid'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_kategori.php?kid=$kid'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="shto_modifiko_kategori.php" id="add_entity"><i class="add_entity fas fa-plus"></i> Shto Kategori</a>
</section>

<?php
include "inc/footer.php";
?>

