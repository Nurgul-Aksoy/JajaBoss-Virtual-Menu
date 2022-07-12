

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Adı :</label>
                                            <input type="text" class="form-control" name="adi">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sıra No :</label>
                                            <input type="number" class="form-control" name="sirano">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="formKaydet" class="btn btn-success">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                    if(isset($_POST['formKaydet'])){
                        $kaydet = mysql_query("INSERT INTO kategori(kat_adi,kat_sira) VALUES('{$_POST['adi']}','{$_POST['sirano']}')");
                        echo "<script>window.location='index.php?page=kategori';</script>";
                    }
                ?>
