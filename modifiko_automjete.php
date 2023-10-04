<?php
include "inc/header.php";
if ($_GET['aid']) {
    $automjeti = merrAutomjetId($_GET['aid']);
    $automjetiid = $automjeti['automjetiid'];
    $emri = $automjeti['emri'];
    $kategoriaId = $automjeti['kategoriaid'];
    $kategoriEmri = $automjeti['kemri'];
    $nrregjistrimi = $automjeti['nrregjistrimi'];
    $pershkrimi = $automjeti['pershkrimi'];
}
if (isset($_POST['modifiko'])) {
    modifikoAutomjet($_POST['automjetiid'],$_POST['emri'], $_POST['kategoria'], $_POST['nrRegjistrimit'], $_POST['pershkrimi']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car8.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per modifikimin e Automjetit</h1>
        <br>
        <form id="automjeti" method="post">
            <input type="hidden" id="automjetiid" name="automjetiid" 
            value="<?php if (!empty($automjetiid)) echo $automjetiid; ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoria">

                    <?php
                    echo "<option value='$kategoriaId'>$kategoriEmri </option>";
                    $kategorit = merrKategorit();
                    while ($kategoria = mysqli_fetch_assoc($kategorit)) {
                        $katId = $kategoria['kategoriaid'];
                        $katEmri = $kategoria['emri'];
                        if ($kategoriaId != $katId) {
                            echo "<option value='$katId'>$katEmri</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrRegjistrimit">Numri i regjistrimit</label> <br>
                <input type="text" id="nrRegjistrimit" name="nrRegjistrimit" value="<?php if (!empty($nrregjistrimi)) echo $nrregjistrimi; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi" value="<?php if (!empty($pershkrimi)) echo $pershkrimi; ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="modifiko" name="modifiko" class="shtoModifiko" value="Modifiko Automjet">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>