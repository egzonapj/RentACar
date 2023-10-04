<?php
session_start();
$dbconn;
dbConnection();
function dbConnection(){
    global $dbconn;
    $dbconn=mysqli_connect("localhost",'root','','salloniautomobilave');
    if(!$dbconn){
        die("Deshtoi lidhja me DB".mysqli_error($dbconn));
    }
}
if(isset($_GET['argument'])){
    if($_GET['argument']=='dalja'){
        session_destroy();
        echo "index.php";
    }
    else if($_GET['argument']=='mesazhi'){
        unset($_SESSION['mesazhi']);
    }

}
function login($email,$fjalekalimi){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni,roli FROM perdoruesit";
    $sql.=" WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $res=mysqli_query($dbconn,$sql);
    
    if(mysqli_num_rows($res)==1){
        $user_data=mysqli_fetch_assoc($res);
        $user=array();
        $user['perdoruesiid']=$user_data['perdoruesiid'];
        $user['emrimbiemri']=$user_data['emri']. " " . $user_data['mbiemri'];
        $user['roli']=$user_data['roli'];
        $_SESSION['user']=$user;
        header("Location: index.php");
    }else{
        echo "Nuk ka perdorues me keto shenime";
    }

}
function regjistrohu($emri,$mbiemri,$email,$fjalekalimi,$telefoni,$nrpersonal,$roli){
    global $dbconn;
    $sql="INSERT INTO perdoruesit(emri, mbiemri, email, fjalekalimi, telefoni, nrpersonal, roli) VALUES ";
    $sql.="('$emri', '$mbiemri', '$email', '$fjalekalimi', '$telefoni', '$nrpersonal', '$roli')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Regjistrimi me sukses";
        login($email,$fjalekalimi);
    }else{
        die("Deshtoi regjistrimi" . mysqli_error($dbconn));
    }
}
/** Funksionet per Automjetet */
function merrAutomjetet(){
    global $dbconn;
    $sql="SELECT  a.automjetiid,k.emri AS kemri,a.emri,a.nrregjistrimi,a.pershkrimi,k.kostoja
    FROM automjetet a INNER JOIN kategorit k ON a.kategoriaid=k.kategoriaid ";
    return mysqli_query($dbconn,$sql); 
}
function merrAutomjetId($aid){
    global $dbconn;
    $sql="SELECT  a.automjetiid,k.kategoriaid,k.emri AS kemri,a.emri,a.nrregjistrimi,a.pershkrimi
    FROM automjetet a INNER JOIN kategorit k ON a.kategoriaid=k.kategoriaid WHERE automjetiid=$aid";
    $automjeti=mysqli_query($dbconn,$sql); 
    return mysqli_fetch_assoc($automjeti);
}
function shtoAutomjet($emri,$kategoriaid,$nrregjistrimi,$pershkrimi){
    global $dbconn;
    $sql="INSERT INTO automjetet(emri, kategoriaid, nrregjistrimi, pershkrimi) VALUES ";
    $sql.="('$emri', '$kategoriaid', '$nrregjistrimi', '$pershkrimi')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Automjeti u shtua me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi shtimi i automjetit" . mysqli_error($dbconn));
    }
}
function modifikoAutomjet($automjetiid,$emri,$kategoriaid, $nrregjistrimi, $pershkrimi){
    global $dbconn;
    $sql="UPDATE automjetet SET emri='$emri', kategoriaid='$kategoriaid', nrregjistrimi='$nrregjistrimi', ";
    $sql.=" pershkrimi='$pershkrimi' WHERE  automjetiid=$automjetiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Automjeti u modifikua me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi shtimi i automjetit" . mysqli_error($dbconn));
    }
}
function fshijAutomjet($automjetiid){
    global $dbconn;
    $sql="DELETE FROM automjetet WHERE  automjetiid=$automjetiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Automjeti u fshi me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi fshirja e automjetit" . mysqli_error($dbconn));
    }
}

/** Funksionet per Perdoruesit */

function merrPerdoruesit(){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni,roli FROM perdoruesit";
    return mysqli_query($dbconn,$sql);
}
function merrPerdorues($roli){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni FROM perdoruesit where roli=$roli";
    return mysqli_query($dbconn,$sql);
}
function merrPerdoruesId($pid){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni,roli,fjalekalimi,nrpersonal,roli FROM perdoruesit";
    $sql.=" WHERE perdoruesiid=$pid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoPerdorues($emri,$mbiemri,$email,$fjalekalimi,$telefoni,$nrpersonal,$roli){
    global $dbconn;
    $sql="INSERT INTO perdoruesit(emri, mbiemri, email, fjalekalimi, telefoni, nrpersonal, roli) VALUES ";
    $sql.="('$emri', '$mbiemri', '$email', '$fjalekalimi', '$telefoni', '$nrpersonal', '$roli')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Perdoruesi u shtua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function modifikoPerdorues($perdoruesiid,$emri,$mbiemri,$roli,$nrpersonal,$telefoni,$email,$fjalekalimi){
    global $dbconn;
    $sql="UPDATE perdoruesit SET emri='$emri', mbiemri='$mbiemri', email='$email' ,";
    $sql.="fjalekalimi='$fjalekalimi', telefoni='$telefoni', nrpersonal='$nrpersonal'";
    $sql.=", roli='$roli' WHERE perdoruesiid=$perdoruesiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Perdoruesi u modifukua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi modifikimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function fshijPerdorues($pid){
    global $dbconn;
    $sql="DELETE FROM perdoruesit WHERE  perdoruesiid=$pid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Perdoruesi u fshi me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi fshirja e perdoruesit" . mysqli_error($dbconn));
    }
}

/** Funksionet per Rezervimet */

function merrRezervimet(){
    global $dbconn;
    $sql="SELECT r.rezervimiid, a.emri, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri, r.dataemarrjes, r.dataekthimit";
    $sql.=" FROM rezervimet r INNER JOIN automjetet a  ON a.automjetiid=r.automjetiid INNER JOIN klientet k ON r.klientiid=k.klientiid";
    $sql.=" ORDER BY r.rezervimiid DESC";
    return mysqli_query($dbconn,$sql);
}

function merrRezervimId($rezervimiid){
    global $dbconn;
    $sql="SELECT r.rezervimiid,a.automjetiid, a.emri,k.klientiid, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri, r.dataemarrjes, r.dataekthimit";
    $sql.=" FROM rezervimet r INNER JOIN automjetet a  ON a.automjetiid=r.automjetiid INNER JOIN klientet k ON r.klientiid=k.klientiid";
    $sql.=" WHERE rezervimiid=$rezervimiid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoRezervim($klientiid,$automjetiid,$dataemarrjes,$dataekthimit){
    global $dbconn;
    $perdoruesiid=$_SESSION['user']['perdoruesiid'];
    echo $perdoruesiid . "perdoruesi id";
    $sql="INSERT INTO rezervimet(klientiid, automjetiid, perdoruesiid, dataemarrjes, dataekthimit) VALUES ";
    $sql.="('$klientiid', '$automjetiid', $perdoruesiid, '$dataemarrjes', '$dataekthimit')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Rezervimi u shtua me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi shtimi i rezervimit" . mysqli_error($dbconn));
    }
}
function modifikoRezervim($rezervimiid,$klientiid,$automjetiid,$dataemarrjes,$dataekthimit){
    global $dbconn;
    $perdoruesiid=$_SESSION['user']['perdoruesiid'];
    $sql="UPDATE rezervimet  SET klientiid='$klientiid', automjetiid='$automjetiid', perdoruesiid='$perdoruesiid',";
    $sql.=" dataemarrjes='$dataemarrjes', dataekthimit='$dataekthimit' WHERE rezervimiid=$rezervimiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Rezervimi u modifiku me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi modifikimi i rezervimit" . mysqli_error($dbconn));
    }
}
function fshijRezervim($rezervimiid){
    global $dbconn;
    $sql="DELETE FROM rezervimet WHERE rezervimiid='$rezervimiid'";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Rezervimi u fshi me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi e fshirja rezervimit" . mysqli_error($dbconn));
    }
}



/**Funksionet per Klientat */
function merrKlientet(){
    global $dbconn;
    $sql="SELECT * FROM klientet";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
} 
function merrKlientiId($kid){
    global $dbconn;
    $sql="SELECT klientiid, emri, mbiemri, email, telefoni,komuna,nrpersonal FROM klientet";
    $sql.=" WHERE klientiid=$kid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function modifikoKlient($kid,$emri,$mbiemri,$email,$telefoni,$nrpersonal,$komuna){
    global $dbconn;
    $sql="UPDATE klientet SET emri='$emri', mbiemri='$mbiemri',email='$email', telefoni='$telefoni', nrpersonal='$nrpersonal',komuna='$komuna' WHERE klientiid=$kid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Klienti u modifukua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi modifikimi i klientit" . mysqli_error($dbconn));
    }
}
function fshijKlient($klientiid){
    global $dbconn;
    $sql="DELETE FROM klientet WHERE  klientiid=$klientiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Klienti u fshi me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi fshirja e klientit" . mysqli_error($dbconn));
    }
}
function shtoKlient($emri,$mbiemri,$nrpersonal,$telefoni,$email,$komuna){
    global $dbconn;
    $sql="INSERT INTO klientet(emri, mbiemri, email, telefoni, nrpersonal, komuna) VALUES ";
    $sql.="('$emri', '$mbiemri', '$email', '$telefoni', '$nrpersonal', '$komuna')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Perdoruesi u shtua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}

/**Funksionet per Kategorit */
function merrKategorit(){
    global $dbconn;
    $sql="SELECT * FROM kategorit";
    return mysqli_query($dbconn,$sql); 
}
function merrKategoriaId($kategoriaid){
    global $dbconn;
    $sql="SELECT * FROM kategorit";
    $sql.=" WHERE kategoriaid=$kategoriaid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoKategori($emri,$pershkrimi,$kostoja){
    global $dbconn;
    $sql="INSERT INTO kategorit(emri, pershkrimi, kostoja) VALUES ";
    $sql.="('$emri', '$pershkrimi', '$kostoja')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Kategoria u shtua me sukses";
        header("Location: kategorit.php");
    }else{
        die("Deshtoi shtimi i kategorise" . mysqli_error($dbconn));
    }
}
function modifikoKategori($kategoriaid,$emri,$pershkrimi,$kostoja){
    global $dbconn;
    $sql="UPDATE kategorit  SET kategoriaid='$kategoriaid', emri='$emri', pershkrimi='$pershkrimi',kostoja='$kostoja'";
    $sql.=" WHERE kategoriaid=$kategoriaid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Kategoria u modifiku me sukses";
        header("Location: kategorit.php");
    }else{
        die("Deshtoi modifikimi i kategorise" . mysqli_error($dbconn));
    }
}
function fshijKategori($kategoriaid){
    global $dbconn;
    $sql="DELETE FROM kategorit WHERE  kategoriaid=$kategoriaid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi']="Kategoria u fshi me sukses";
        header("Location: kategorit.php");
    }else{
        die("Deshtoi fshirja e kategorise" . mysqli_error($dbconn));
    }
}

?>
