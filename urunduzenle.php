<?php 
    include ("connect.php");

if(isset($_GET['id']))
{
    $urunbul = mysql_query("SELECT * FROM urun WHERE urun_id='{$_GET['id']}'");
    while($b = mysql_fetch_assoc($urunbul)){
        $urun_adi=$b['urun_adi'];
        $urun_fiyat=$b['urun_fiyat'];
        $urun_aciklama=$b['urun_aciklama'];
        $urun_resim_baglanti=$b['urun_resim_baglanti'];
        $kat_adi=$b['kat_adi'];
    }
?>

                <div class="container-fluid" style="margin-left:230px;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yeni Ürün</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                                          <div class="form-group" style="font-size:0.9rem; margin-left:-19px; margin-top:-5px; margin-bottom: -230px; ">
                                                    <label for="img">
                                                        <input type="file" name="urun_resim_baglanti" value="<?php echo $urun_resim_baglanti; ?>"class="form-control-file" >
                                                    </label>
                                        </div> 
                                        <div class="form-group" >
                                            <label for="" style="font-size:0.91rem; margin-top:-5px;">Adı :</label>
                                            <input type="text" class="form-control" name="urun_adi" value="<?php echo
                                             $urun_adi; ?>" style="margin-top:-5px;">
                                        </div>
                                        <div class="form-group" >
                                            <label for="" style="font-size:0.91rem; margin-top:-5px;">Fiyat :</label>
                                            <input type="number" class="form-control" name="urun_fiyat"  value="<?php echo $urun_fiyat; ?>" style="margin-top:-5px;">
                                        </div>                               
                                        <div class="form-group">
                                            <label for="" style="font-size:0.91rem; margin-top:-5px;">Kategori :</label>
                                              <select class="form-select" name="kat_id" aria-label="Default select example" style=" float: right; height: calc(1.5em + .75rem + 2px); width: 100%; color:#6e707e;  border:1px solid #d1d3e2; border-radius:0.35rem;" >
                                                        <option value="0">- Seçiniz -</option>
                                                        <?php 
                                                            $query = mysql_query("SELECT * FROM kategori");
                                                            while($q = mysql_fetch_assoc($query))
                                                            {
                                                        ?>
                                                        <option value="<?php echo $q["kat_id"];?>"> <?php echo $q["kat_adi"]; ?></option>
                                                        <?php 
                                                            }
                                                        ?>
                                                </select>

                                            
                                        </div>
                                        <div class="form-group">
                                                <label for="aciklama" style="margin-bottom:-10px; font-size:0.91rem; margin-top:12px;">Açıklama :</label>
                                                    <textarea class="form-control" name="urun_aciklama" value="<?php echo $urun_aciklama; ?>" rows="3" style="margin-bottom:-15px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="urunformKaydet" class="btn btn-success btn-sm" style="float: right; font-size:0.90rem; ">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    if(isset($_POST['urunformKaydet'])){
                        // Düzenleme ?
                        $duzenle = mysql_query("UPDATE urun SET urun_adi='{$_POST['urun_adi']}', urun_fiyat='{$_POST['urun_fiyat']}', urun_aciklama='{$_POST['urun_aciklama']}', urun_resim_baglanti='{$_POST['urun_resim_baglanti']}', kat_adi='{$_POST['kat_adi']}' WHERE urun_id='{$_POST['id']}' ");
                        echo "<script>window.location='index.php?page=urunler';</script>";
                    }
                }
                ?>

</body>
</html>