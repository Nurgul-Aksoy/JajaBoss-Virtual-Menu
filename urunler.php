<?php 
    include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jaja Boss Sanal Menü</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- CSS only -->

</head>

<body id="page-top">

    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <!-- modal with a button -->
                   <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" style="margin-top:10px; margin-right:40px; float:right; font-size:0.93rem;">Yeni Ürün Ekle</button>

                    <h1 class="h5 mb-2" style="margin-top:45px; margin-left: 40px;  font-size:1.1rem;"><i class="far fa-list-alt" style="font-size:1.2rem; margin-right:6px; font-weight: bold;"></i>Ürünler</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top:40px; margin-left:25px; margin-right:25px;">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="font-size: 0.85rem;">
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Ürün Adı</th>
                                            <th>Fiyat</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody style="font-size: 0.85rem;">
                                        <?php 
                                            $urunBul = mysql_query("SELECT kategori.kat_adi,urun.* FROM urun INNER JOIN kategori ON urun.kat_id = kategori.kat_id");
                                            while($k = mysql_fetch_assoc($urunBul))
                                            {
                                        ?>
                                                <tr>
                                                    <td> <img src="../<?php echo $k['urun_resim_baglanti']; ?>" style="width:100px;"></td>
                                                    <td><?php echo $k['kat_adi']; ?> </td>
                                                    <td><?php echo $k['urun_adi']; ?></td>
                                                    <td><?php echo "₺ ".number_format($k['urun_fiyat'],2); ?></td>
                                                   <td>   
                                                         <a href="index.php?page=urunduzenle&id=<?php echo $k['urun_id']; ?>">Düzenle</a>   
                                                         -
                                                        <a href="index.php?page=urunler&sil=1&id=<?php echo $k['urun_id']; ?>">Sil</a>    
                                                    </td>
                                                 </tr>
                                        <?php 
                                            }
                                        ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                  <?php 
                    if(isset($_GET['sil']) && $_GET['sil']=="1" && isset($_GET['id'])){
                        $sil = mysql_query("DELETE FROM urun WHERE urun_id='{$_GET['id']}'");
                        echo "<script>window.location='index.php?page=urunler';</script>";
                     }
                    ?>

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="margin-top: 80%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AVC 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
   

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               
                <div class="modal-body" style="background-color:whitesmoke;"> <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Çıkış yapmak istediğinizden emin misiniz?</h5></div>

                <div class="modal-footer" style="background-color:whitesmoke;">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                    <a class="btn btn-primary" href="login.php">Çık</a>
                </div>
            </div>
        </div>
    </div>

      <!--yeni ürün ekle Modal-->

                        <div class="container">
                             <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:whitesmoke; margin-bottom:-250px;">
                                            <form action="processing2.php" method="POST" enctype="multipart/form-data" >
                                                <div class="form-group" style="font-size:0.9rem; margin-left:-7px; margin-top:-5px; ">
                                                    <label for="img">
                                                        <input type="file" name="urun_resim_baglanti" class="form-control-file" ></label>
                                        </div> 
                                    </div>
                                         <div class="modal-body" style="background-color:whitesmoke;">
                                            <div class="form-group" style=" margin-top:-15px;">
                                                <label for="baslik" style="margin-bottom:-10px; font-size:0.91rem;">Başlık :</label>
                                                    <input type="text" name="urun_adi" class="form-control"  aria-describedby="emailHelp">
                                            </div>
                                                <div class="form-group">
                                                    <label for="fiyat" style="margin-bottom:-10px; font-size:0.91rem;">Fiyat :</label>
                                                        <input type="text" name="urun_fiyat" class="form-control"  style="margin-top:-2.5px;">
                                                </div> 
                                                
                                                 <div class="form-group">
                                           
                                             <label for="kategori_adi" style="margin-bottom:-10px; font-size:0.91rem;">Kategori Adı :</label>
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
    
                                            <div class="form-group">
                                                <label for="aciklama" style="margin-bottom:-10px; font-size:0.91rem; margin-top:12px;">Açıklama :</label>
                                                    <textarea class="form-control" name="urun_aciklama"  rows="3" style="margin-bottom:-15px;"></textarea>
                                            </div>
                                        
                                            </div>
                                        <div class="modal-footer" style="background-color:whitesmoke; margin-top:-15px;">
                                            <button type="submit" name="insertislemi" class="btn btn-primary btn-sm">Kaydet</button>
                                        </form>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
      
                        
           

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    

       


   


</body>

</html>



