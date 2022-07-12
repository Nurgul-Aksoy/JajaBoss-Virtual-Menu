
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kategoriler</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Sıra No</th>
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
                                                        <a href="index.php?page=kategoriduzenle&id=<?php echo $b['kat_id']; ?>">Düzenle</a>    
                                                        -
                                                        <a href="index.php?page=kategori&sil=1&id=<?php echo $b['kat_id']; ?>">Sil</a>    
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
        $sil = mysql_query("DELETE FROM kategori WHERE id='{$_GET['id']}'");
        echo "<script>window.location='index.php?page=kategori';</script>";
    }
?>