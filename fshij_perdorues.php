<?php

include "inc/header.php";

if(isset($_POST['fshij'])){
    if(isset($_GET['pid'])){
        fshijPerdorues($_POST['perdoruesiid']);
    }
    if(isset($_GET['kid'])){
        fshijKlient($_POST['klientiid']);
    }
}
if(isset($_GET['pid'])){
    $perdoruesiid=$_GET['pid'];
    $perdoruesi=merrPerdoruesId($perdoruesiid);
    $emri=$perdoruesi['emri'];
    $mbiemri=$perdoruesi['mbiemri'];
    $roli=$perdoruesi['roli'];
    $nrpersonal=$perdoruesi['nrpersonal'];
    $telefoni=$perdoruesi['telefoni'];
    $email=$perdoruesi['email'];
    $fjalekalimi=$perdoruesi['fjalekalimi'];
    if($roli==0){
        $roli_emri="Staf";
    }else {
        $roli_emri="Administrator";
    }
}
if(isset($_GET['kid'])){
    $klientiid=$_GET['kid'];
    $klienti=merrKlientiId($klientiid);
    $emri=$klienti['emri'];
    $mbiemri=$klienti['mbiemri'];
    $nrpersonal=$klienti['nrpersonal'];
    $telefoni=$klienti['telefoni'];
    $email=$klienti['email'];
    $komuna=$klienti['komuna'];
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Perdoruesit</h1>
        <br>
        <form method="post">
            <?php
            if(isset($_GET['pid'])){
                echo "<input type='hidden' id='perdoruesiid' name='perdoruesiid' value='$perdoruesiid'>";
            }
            if(isset($_GET['kid'])){
                echo "<input type='hidden' id='klientiid' name='klientiid' value='$klientiid'>";
            }
            ?>
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input disabled type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input disabled type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <?php
            if(isset($_GET['pid'])){
            echo "<div class=inputAndLabels'>";
            echo "<label for='roli'>Roli</label>";
            echo "<br>";
            echo "<select id='roli' name='roli'>";
            echo "<option disabled value='$roli'>" . "$roli_emri" . "</option>";
            echo "</select>";
            echo "</div>";
            }
            ?>
            <div class="inputAndLabels">
                <label for="nrpersonal">Nr personal</label> <br>
                <input disabled type="text" id="nrpersonal" name="nrpersonal"
                value="<?php if(!empty($nrpersonal)) echo $nrpersonal ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Nr telefonit</label> <br>
                <input disabled type="text" id="telefoni" name="telefoni"
                value="<?php if(!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input disabled type="email" id="email" name="email"
                value="<?php if(!empty($email)) echo $email ?>">
            </div>
            <?php
            if(isset($_GET['pid'])){
            echo "<div class=inputAndLabels'>";
            echo "<label for='fjalekalimi'>Fjalekalimi</label>";
            echo "<br>";
            echo "<input disabled type='password' id='fjalekalimi' name='fjalekalimi'
            value='$fjalekalimi'>";
            echo "</div>";
            }
            ?>
           <?php
            if(isset($_GET['kid'])){
            echo "<div class=inputAndLabels'>";
            echo "<label for='komuna'>Komuna</label>";
            echo "<br>";
            echo "<input disabled type='text' id='komuna' name='komuna'
            value='$komuna'>";
            echo "</div>";
            }
            ?>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij Perdorues">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";
?>

</body>
</html>
