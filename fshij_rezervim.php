<?php

include "inc/header.php";

if (isset($_GET['rid'])) {
    $rezervimiid = $_GET['rid'];

    $rezervimi = merrRezervimId($rezervimiid);
    // print_r($rezervimi);
    $autoid = $rezervimi['automjetiid'];
    $autoemri = $rezervimi['emri'];
    $klintid = $rezervimi['klientiid'];
    $klintemrimbiemri = $rezervimi['emrimbiemri'];
    $dataemarrjes = $rezervimi['dataemarrjes'];
    $dataemarrjes = date("Y-m-d", strtotime($dataemarrjes));
    $dataekthimit = $rezervimi['dataekthimit'];
    $dataekthimit = date("Y-m-d", strtotime($dataekthimit));
}

if (isset($_POST['fshij'])) {
  fshijRezervim($rezervimiid);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/editimin e Rezervimit</h1>
        <br>
        <form method="POST">
            <div class="inputAndLabels">

                <label for="klienti">Klienti</label> <br>

                <select id="klienti" name="klienti">
                    <?php
                    if (isset($rezervimiid)) {
                        echo "<option value='$klintid'>$klintemrimbiemri</option>";
                    }
                    $klientet = merrKlientet();
                    while ($klienti = mysqli_fetch_assoc($klientet)) {
                        $klientiId = $klienti['klientiid'];
                        $klientiEmriMbiemri = $klienti['emri'] . ' ' .  $klienti['mbiemri'];
                        if (isset($rezervimiid)) {
                            if ($klientiId != $klintid) {
                                echo "<option value='$klientiId'>$klientiEmriMbiemri</option>";
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="automjeti">Automjeti</label> <br>
                <select id="automjeti" name="automjeti">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$autoid'>$autoemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh automjetin </option>";
                    }
                    $automjetet = merrAutomjetet();
                    while ($automjeti = mysqli_fetch_assoc($automjetet)) {
                        $automjetiid = $automjeti['automjetiid'];
                        $automjetiemri = $automjeti['emri'];
                        if (!empty($autoid)) {
                            if ($autoid != $automjetiid) {
                                echo "<option value='$automjetiid'> $automjetiemri</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="datamarrjes">Data e marrjes</label> <br>
                <input type="date" id="datamarrjes" name="datamarrjes" value="<?php if (!empty($dataemarrjes)) echo $dataemarrjes ?>">
            </div>
            <div class="inputAndLabels">
                <label for="datakthimit">Data e kthimit</label> <br>
                <input type="date" id="datakthimit" name="datakthimit" value="<?php if (!empty($dataekthimit)) echo $dataekthimit ?>">
            </div>
            <div class="inputAndLabels">
              <div class="butonat">
                <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij ">
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