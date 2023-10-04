<?php

include "inc/header.php";
if(isset($_POST['shtokategori'])){
    shtoKategori($_POST['emri'],$_POST['pershkrimi'],$_POST['kostoja']);
}
if(isset($_POST['modifikokategori'])){
    modifikoKategori($_POST['kategoriaid'],$_POST['emri'],$_POST['pershkrimi'],$_POST['kostoja']);
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
        <?php
        if(isset($_GET['kid'])){
            echo "<h1>" . "Forma per modifikimin e Kategorive" . "</h1>";
        }else {
            echo "<h1>" . "Forma per shtimin e Kategorive" . "</h1>";
        }
        ?>
        <br>
        <form method="post">
        <input type="hidden" id="kategoriaid" name="kategoriaid" 
                value="<?php if(!empty($kategoriaid)) echo $kategoriaid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kostoja">Kostoja</label> <br>
                <input type="text" id="kostoja" name="kostoja"
                value="<?php if(!empty($kostoja)) echo $kostoja ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        if(!isset($_GET['kid'])){
                            echo "<input id='shtokategori' type='submit'
                            name='shtokategori' class='shtoModifiko' value='Shto Kategori'>";
                        }else{
                            echo "<input id='modifikokategori' type='submit'
                            name='modifikokategori' class='shtoModifiko' value='Modifiko Kategori'>"; 
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

</body>
</html>
