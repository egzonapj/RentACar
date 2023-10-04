<?php
include "inc/header.php";
?>

<section class="list-entity container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>

    <p id="mesazhi">
        <?php
            if(isset($_SESSION['mesazhi'])){
                echo $_SESSION['mesazhi'];
            }
        ?>
    </p>

    <div class="filter">
        <form method="post">
            <input type="radio" name="filter" id="te_gjithe" value="te_gjithe" checked>
            <label for="te_gjithe">Te gjithe | </label>
            <input type="radio" name="filter" value="klientet">
            <label for="te_gjithe">Klientet | </label>
            <input type="radio" name="filter" value="staf">
            <label for="te_gjithe">Staf | </label>
            <input type="radio" name="filter" value="administrator">
            <label for="te_gjithe">Administratoret</label>
            <input type="submit" class="btn-filtro" name="submit" value="Filtro">
        </form>
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Nr telefonit</th>
            <th>Modifiko</th>
            <th>Fshiej</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['submit'])){
                $perdoruesi=$_POST['filter'];
                if($perdoruesi=='klientet'){
                    $perdoruesit=merrKlientet();
                    while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                        $kid=$perdoruesi['klientiid'];
                        echo "<tr class='active-row'>";
                        echo "<td>". $perdoruesi['emri'] . "</td>";
                        echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                        echo "<td>". $perdoruesi['email'] . "</td>";
                        echo "<td>". $perdoruesi['telefoni'] . "</td>";
                        echo "<td><a href='shto_modifiko_perdorues.php?kid=$kid'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshij_perdorues.php?kid=$kid'>
                        <i class='far fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    } 
                }else if ($perdoruesi=='staf'){
                    $perdoruesit=merrPerdorues(0);
                    while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                        $pid=$perdoruesi['perdoruesiid'];
                        echo "<tr class='active-row'>";
                        echo "<td>". $perdoruesi['emri'] . "</td>";
                        echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                        echo "<td>". $perdoruesi['email'] . "</td>";
                        echo "<td>". $perdoruesi['telefoni'] . "</td>";
                        echo "<td><a href='shto_modifiko_perdorues.php?pid=$pid&roli=0'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshij_perdorues.php?pid=$pid&roli=0'>
                        <i class='far fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    }
                }else if ($perdoruesi=='administrator'){
                    $perdoruesit=merrPerdorues(1);
                    while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                        $pid=$perdoruesi['perdoruesiid'];
                        echo "<tr class='active-row'>";
                        echo "<td>". $perdoruesi['emri'] . "</td>";
                        echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                        echo "<td>". $perdoruesi['email'] . "</td>";
                        echo "<td>". $perdoruesi['telefoni'] . "</td>";
                        echo "<td><a href='shto_modifiko_perdorues.php?pid=$pid&roli=1'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshij_perdorues.php?pid=$pid&roli=1'>
                        <i class='far fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    }
                } else{
                    $perdoruesit=merrKlientet();
                    while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                        $kid=$perdoruesi['klientiid'];
                        echo "<tr class='active-row'>";
                        echo "<td>". $perdoruesi['emri'] . "</td>";
                        echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                        echo "<td>". $perdoruesi['email'] . "</td>";
                        echo "<td>". $perdoruesi['telefoni'] . "</td>";
                        echo "<td><a href='shto_modifiko_perdorues.php?kid=$kid'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshij_perdorues.php?kid=$kid'>
                        <i class='far fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    }
                    $perdoruesit=merrPerdoruesit();
                    while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                        $pid=$perdoruesi['perdoruesiid'];
                        $roli=$perdoruesi['roli'];
                        echo "<tr class='active-row'>";
                        echo "<td>". $perdoruesi['emri'] . "</td>";
                        echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                        echo "<td>". $perdoruesi['email'] . "</td>";
                        echo "<td>". $perdoruesi['telefoni'] . "</td>";
                        echo "<td><a href='shto_modifiko_perdorues.php?pid=$pid&roli=$roli'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshij_perdorues.php?pid=$pid&roli=$roli'>
                        <i class='far fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    }  
                }    
            }  else{
                $perdoruesit=merrKlientet();
                while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                    $kid=$perdoruesi['klientiid'];
                    echo "<tr class='active-row'>";
                    echo "<td>". $perdoruesi['emri'] . "</td>";
                    echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                    echo "<td>". $perdoruesi['email'] . "</td>";
                    echo "<td>". $perdoruesi['telefoni'] . "</td>";
                    echo "<td><a href='shto_modifiko_perdorues.php?kid=$kid'>
                    <i class='fas fa-edit'></i></a></td>";
                    echo "<td><a href='fshij_perdorues.php?kid=$kid'>
                    <i class='far fa-trash-alt'></i></a></td>";
                    echo "</tr>";
                }
                $perdoruesit=merrPerdoruesit();
                while ($perdoruesi =mysqli_fetch_assoc($perdoruesit)) {
                    $pid=$perdoruesi['perdoruesiid'];
                    $roli=$perdoruesi['roli'];
                    echo "<tr class='active-row'>";
                    echo "<td>". $perdoruesi['emri'] . "</td>";
                    echo "<td>". $perdoruesi['mbiemri'] . "</td>";
                    echo "<td>". $perdoruesi['email'] . "</td>";
                    echo "<td>". $perdoruesi['telefoni'] . "</td>";
                    echo "<td><a href='shto_modifiko_perdorues.php?pid=$pid&roli=$roli'>
                    <i class='fas fa-edit'></i></a></td>";
                    echo "<td><a href='fshij_perdorues.php?pid=$pid&roli=$roli'>
                    <i class='far fa-trash-alt'></i></a></td>";
                    echo "</tr>";
                }  
            }    
    
            ?>
    </table>
    <a href="shto_modifiko_perdorues.php?shp=p" id="add_entity"><i class="fas fa-plus"></i> Shto Perdorues</a>
    <a href="shto_modifiko_perdorues.php?shp=k" id="add_entity"><i class="fas fa-plus"></i> Shto Klient</a>
</section>


<?php
include "inc/footer.php";

?>