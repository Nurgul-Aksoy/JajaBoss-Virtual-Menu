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
                     <!--Kategori ekle Modal-->
                         <!-- Modal -->

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    
                                    <div class="modal-header" style="background-color:whitesmoke;">
                                         <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold; font-size:1.1rem; margin-bottom:-5px;">Kategori Oluştur</h5>
                                    </div>
                                    <div class="modal-body" style="background-color:whitesmoke;">

                                         <form action="processing.php" method="POST">
                                             <div class="form-group">
                                                    <label for="kategori_adi" style="font-size:0.91rem; margin-top:-5px;">Kategori Adı :</label>
                                                        <input type="text" name="kat_adi" class="form-control" style="margin-top:-5px;">
                                         </div> 
                                            <div class="form-group">
                                                <label for="kategori_sira" style="font-size:0.91rem; margin-top:-5px;">Sıra No :</label>
                                                    <input type="text" name="kat_sira" class="form-control" aria-describedby="emailHelp" style="margin-top:-5px;">
                                                </div>
                                          
                                            <button type="submit" name="insertislemikat" class="btn btn-primary btn-sm" style="float: right; font-size:0.90rem; ">Kaydet</button>
                                              </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   <!--main content-->
                     <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-top:50px;">

                    <!-- Page Heading -->
            
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" style="margin-top:10px; margin-right: 20px; float:right; font-size:0.94rem; ">Kategori Ekle</button>
    
                    <div style="width: 80%; height:45px; margin-bottom:-10px">
                        <h1 class="h5 mb-2 " style=" margin-left:20px; font-size:1.1rem;"><i class="far fa-list-alt" style="font-size:1.2rem; margin-right:5px; font-weight: bold;"></i>Kategoriler</h1>
                      </div>
            
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top:25px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="font-size: 0.85rem;">
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Sıra</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <?php 
                                            $bul = mysql_query("SELECT * FROM kategori");
                                            while($b = mysql_fetch_assoc($bul))
                                            {
                                        ?>
                                                <tr>
                                                    <td><?php echo $b['kat_adi']; ?></td>
                                                    <td><?php echo $b['kat_sira']; ?></td>
                                                    <td>
                                                        <a href="index.php?page=kategoriduzenle&id=<?php echo $b["kat_id"]; ?>">Düzenle</a>    
                                                        -
                                                        <a href="index.php?page=kategoriler&sil=1&id=<?php echo $b['kat_id']; ?>">Sil</a>    

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
                        $sil = mysql_query("DELETE FROM kategori WHERE kat_id='{$_GET['id']}'");
                        echo "<script>window.location='index.php?page=kategoriler';</script>";
    }
?>
                <!-- /.container-fluid -->

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

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>


</html>