<?php

include "inc/header.php";
if(isset($_POST['shtoperdorues'])){
    shtoPerdorues($_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['fjalekalimi'],$_POST['telefoni'],$_POST['nrpersonal'],$_POST['roli']);
}
if(isset($_POST['shtoklient'])){
    shtoKlient($_POST['emri'],$_POST['mbiemri'],$_POST['nrpersonal'],$_POST['telefoni'],$_POST['email'],$_POST['komuna']);
}
if(isset($_POST['modifikoperdorues'])){
    if(isset($_GET['pid'])){
    modifikoPerdorues($_GET['pid'],$_POST['emri'],$_POST['mbiemri'],$_POST['roli'],$_POST['nrpersonal'],$_POST['telefoni'],$_POST['email'],$_POST['fjalekalimi']);
    }
    if(isset($_GET['kid'])){
    modifikoKlient($_GET['kid'],$_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['telefoni'],$_POST['nrpersonal'],$_POST['komuna']);
    }
}
if(isset($_GET['kid'])){
    $klientiid=$_GET['kid'];
    $perdoruesi=merrKlientiId($klientiid);
    $emri=$perdoruesi['emri'];
    $mbiemri=$perdoruesi['mbiemri'];
    $email=$perdoruesi['email'];
    $nrpersonal=$perdoruesi['nrpersonal'];
    $telefoni=$perdoruesi['telefoni'];
    $email=$perdoruesi['email'];
    $komuna=$perdoruesi['komuna'];
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
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <?php
        if(isset($_GET['kid'])||isset($_GET['pid'])){
            echo "<h1>" . "Forma per modifikimin e Perdoruesve" . "</h1>";
        }else {
            echo "<h1>" . "Forma per shtimin e Perdoruesve" . "</h1>";
        }
        ?>
        <br>
        <form method="post" id="perdoruesit">
            <input type="hidden" id="perdoruesiid" name="perdoruesiid" 
                value="<?php if(!empty($perdoruesiid)) echo $perdoruesiid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <?php
            if(isset($_GET['pid'])){
                echo "<div class=inputAndLabels'>";
                echo "<label for='roli'>Roli</label>";
                echo "<br>";
                echo "<select id='roli' name='roli'>";
                echo "<option value='$roli'>" . "$roli_emri" . "</option>";
                if($roli==0){
                    $roli=1;
                    $roli_emri='Administrator';
                    echo "<option value='$roli'>" . "$roli_emri" . "</option>";
                }else {
                    $roli=0;
                    $roli_emri='Staf';
                    echo "<option value='$roli'>" . "$roli_emri" . "</option>";
                }
                echo "</select>";
                echo "</div>";
            }else if(isset($_GET['shp'])){
                if($_GET['shp']=='p'){
                echo "<div class=inputAndLabels'>";
                echo "<label for='roli'>Roli</label>";
                echo "<br>";
                echo "<select id='roli' name='roli'>";
                echo "<option value=''>" . "Zgjedh Rolin" . "</option>";
                echo "<option value='0'>" . "Staf" . "</option>";
                echo "<option value='1'>" . "Administrator" . "</option>";
                echo "</select>";
                echo "</div>";
            }}
            ?>

            <div class="inputAndLabels">
                <label for="nrpersonal">Nr personal</label> <br>
                <input type="text" id="nrpersonal" name="nrpersonal"
                value="<?php if(!empty($nrpersonal)) echo $nrpersonal ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Nr telefonit</label> <br>
                <input type="text" id="telefoni" name="telefoni"
                value="<?php if(!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email"
                value="<?php if(!empty($email)) echo $email ?>">
            </div>
            <?php
            if(isset($_GET['pid'])){
            echo "<div class=inputAndLabels'>";
            echo "<label for='fjalekalimi'>Fjalekalimi</label>";
            echo "<br>";
            echo "<input type='password' id='fjalekalimi' name='fjalekalimi'
            value='$fjalekalimi'>";
            echo "</div>";
            }else if(isset($_GET['shp'])){
                if ($_GET['shp']=='p'){
                echo "<div class=inputAndLabels'>";
                echo "<label for='fjalekalimi'>Fjalekalimi</label>";
                echo "<br>";
                echo "<input type='password' id='fjalekalimi' name='fjalekalimi'>";
                echo "</div>";
            }}
            ?>
            <?php
            if(isset($_GET['kid'])){
            echo "<div class=inputAndLabels'>";
            echo "<label for='komuna'>Komuna</label>";
            echo "<br>";
            echo "<input type='text' id='komuna' name='komuna'
            value='$komuna'>";
            echo "</div>";
            }else if(isset($_GET['shp'])){
                if($_GET['shp']=='k'){
                    echo "<div class=inputAndLabels'>";
                    echo "<label for='komuna'>Komuna</label>";
                    echo "<br>";
                    echo "<input type='text' id='komuna' name='komuna'>";
                    echo "</div>";
                }
            }          
            ?>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        if(!isset($_GET['pid'])&empty($_GET['kid'])){
                            if(isset($_GET['shp'])){
                                $shp=$_GET['shp'];
                                $shp;
                                if($shp=='p'){
                                    echo "<input id='shtoperdorues' type='submit' name='shtoperdorues' class='shtoModifiko' value='Shto Perdorues'>"; 
                                }else if($shp=='k'){
                                    echo "<input id='shtoperdorues' type='submit'
                                    name='shtoklient' class='shtoModifiko' value='Shto Klient'>";
                                }
                            }
                        }else{
                            echo "<input id='modifikoperdorues' type='submit'
                            name='modifikoperdorues' class='shtoModifiko' value='Modifiko Perdorues'>"; 
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";
?>

