<?php 
include 'connect.php';
//YENİ ÜRÜN EKLE

if ($_FILES["urun_resim_baglanti"]) {
require 'class.upload.php';
        
        $image = new Upload($_FILES['urun_resim_baglanti']);
        $resim = $image;
        if ($resim->uploaded) {
            $resim->file_new_name_body = 'nurgul.jpg';
            $resim->process('uploads');
            if ($resim->processed) {
                print 'Resim yükleme işlemi başarılı!<hr />';
            } else {
                print 'Bir sorun oluştu: ' . $resim->error;
            }
        }
        $sresim = "uploads/".$resim->file_dst_name;  

        $urun_adi=$_POST["urun_adi"];
        $urun_fiyat=$_POST["urun_fiyat"];
        $kat_id=$_POST["kat_id"];
        $urun_aciklama=$_POST["urun_aciklama"];

$insert=mysql_query("INSERT INTO urun(urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti,kat_id) VALUES('$urun_adi','$urun_fiyat','$urun_aciklama','$sresim','$kat_id')");
echo "<script>window.location='index.php?page=urunler';</script>";

} else {

  echo "Lütfen bir dosya seçin";

}

