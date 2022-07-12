<?php 

//KATEGORİ EKLEME

include 'connect.php';

$kat_adi = $_POST["kat_adi"];
$kat_sira = $_POST["kat_sira"];
 
//kategori tablosuna verileri ekleme
$insert= mysql_query("INSERT INTO kategori(kat_adi,kat_sira) VALUES('$kat_adi','$kat_sira')");
 
//IF döngüsü ile ekleme işleminin gerçekleşip gerçekleşmediğini kontrol ediyoruz.
if ($insert)
{
    //echo "Ekleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";
    Header("Location:kategoriler.php"); //insert işleminden sonra lokasyon kategoriler sayfasında  kalıyor..
    exit;
}
else
{
    //echo "Hata";
     Header("Location:kategoriler.php");
     exit;
}
/*
//YENİ ÜRÜN EKLE

$urun_resim_baglanti=$_POST['urun_resim_baglanti'];
$urun_adi=$_POST['urun_adi'];
$urun_fiyat=$_POST['urun_fiyat'];
$kat_id=$_POST['kat_id'];
$urun_aciklama=$_POST['urun_aciklama'];

$insert_urun=mysql_query("INSERT INTO urun(urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti,kat_id) VALUES('$urun_adi','$urun_fiyat','$urun_aciklama','$urun_resim_baglanti','$kat_id')");
if ($insert_urun) {

  Header("Location:urunler.php"); //insert işleminden sonra lokasyon ürünler sayfasıına yönlendirilerek ürünler sayfasında  kalıyor..
    exit;

}
else{
    Header("Location:urunler.php");
    exit;
}


if ($_FILES["urun_resim_baglanti"]) { //Dosyanın gönderilip gönderilmediği kontrol etmek

  echo "Dosya gönderildi";

} else {

  echo "Lütfen bir dosya seçin";

}

*/








//if (isset($_POST['insertislemikat'])) {
 // echo $_POST['kat_adi'];
//}


/*if (isset($_POST['insertislemi'])) {
    $kaydet=$db_name->prepare("INSERT into urun set
        urun_adi
        urun_fiyat
        urun_aciklama
        urun_resim_baglanti
        kat_id
        ")
}*/


 
/*
$kat_adi = $_POST["kat_adi"];
$kat_sira = $_POST["kat_sira"];
 
//kategori tablosuna verileri ekleme
$insert= mysql_query("INSERT INTO kategori(kat_adi,kat_sira) VALUES('$kat_adi','$kat_sira')");
 
//IF döngüsü ile ekleme işleminin gerçekleşip gerçekleşmediğini kontrol ediyoruz.
if ($insert)
{
    echo "Ekleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";
}
else
{
    echo "Hata";
}
*/




 ?>