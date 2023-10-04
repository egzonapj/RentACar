<?php

include "inc/header.php";
if(isset($_POST['fshijkategori'])){
    fshijKategori($_POST['kategoriaid']);
}
if(isset($_GET['kid'])){
    $kategoriaid=$_GET['kid'];
    $kategoria=merrKategoriaId($kategoriaid);
    $emri=$kategoria['emri'];
    $pershkrimi=$kategoria['pershkrimi'];
    $kostoja=$kategoria['kostoja'];
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Kategorive</h1>
        <br>
        <form method="post">
        <input type="hidden" id="kategoriaid" name="kategoriaid" 
                value="<?php if(!empty($kategoriaid)) echo $kategoriaid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input disabled type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input disabled type="text" id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kostoja">Kostoja</label> <br>
                <input disabled type="text" id="kostoja" name="kostoja"
                value="<?php if(!empty($kostoja)) echo $kostoja ?>">
            </div>
            <div class="inputAndLabels">
              <div class="butonat">
                <input type="submit" id="fshijkategori" name="fshijkategori" class="shtoModifiko" value="Fshij Kategori">
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
