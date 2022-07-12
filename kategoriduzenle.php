<?php 
    include ("connect.php");

if(isset($_GET['id']))
{
    $bul = mysql_query("SELECT * FROM kategori WHERE kat_id='{$_GET['id']}'");
    while($b = mysql_fetch_assoc($bul)){
        $adi = $b['kat_adi'];
        $sirano = $b['kat_sira'];
    }
?>

                <div class="container-fluid" style="margin-left:230px;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                        <div class="form-group">
                                            <label for="" style="font-size:0.91rem; margin-top:-5px;">Adı :</label>
                                            <input type="text" class="form-control" name="adi" value="<?php echo $adi; ?>" style="margin-top:-5px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="" style="font-size:0.91rem; margin-top:-5px;">Sıra No :</label>
                                            <input type="number" class="form-control" name="sirano"  value="<?php echo $sirano; ?>" style="margin-top:-5px;">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="formKaydet" class="btn btn-success btn-sm" style="float: right; font-size:0.90rem; ">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    if(isset($_POST['formKaydet'])){
                        // Düzenleme ?
                        $duzenle = mysql_query("UPDATE kategori SET kat_adi='{$_POST['adi']}',kat_sira='{$_POST['sirano']}' WHERE kat_id='{$_POST['id']}' ");
                        echo "<script>window.location='index.php?page=kategoriler';</script>";
                    }
                }
                ?>

</body>
</html>