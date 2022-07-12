<?php 
 include "connect.php";
?>

<div class="container boxes">
  <div class="row d-flex justify-content-around">
    <?php  
     $makarnalar = mysql_query("SELECT urun_id,urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti FROM kategori INNER JOIN urun ON urun.kat_id=kategori.kat_id WHERE kategori.kat_id='".$_POST['id']."'");
     while ($m=mysql_fetch_assoc($makarnalar)) 
     {
    ?> 
    <div class="box" data-toggle="modal" data-target="#myModal<?php echo $m['urun_id']; ?>">
      <div class="col-md-4 rounded mx-auto d-block  text-center" id="<?php $m['urun_id']; ?>"><?php echo $m['urun_adi']; ?></div> 
        <div class="thumbnail" style="position:relative;z-index:10;">
          <img src="<?php echo $m['urun_resim_baglanti']; ?>" class="rounded float-left img-fluid" alt="jaja_boss"  style=" position:relative; z-index:1; margin-top:-35px; max-height:600px;
  max-width:500px;
  }">
            <div class="aciklama">
              <h2 class="fs-4" style="margin-left:5px; float:left; width:80%;"><?php echo $m['urun_adi']; ?></h2><span class="btn btn-dark" style="float:right; margin-top:-35px; margin-right:10px; width: 20%;"><?php echo number_format($m['urun_fiyat'],2)."₺ "; ?></span>
                    <p style="margin-left:8px; font-size:0.75rem;"><?php echo $m['urun_aciklama']; ?></p>
            </div>    
        </div>   
      </div>
 <?php  }  ?>  </div>
</div>

<br>
<!--MODAL-->
<?php  
     $makarnalar = mysql_query("SELECT urun_id,urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti FROM kategori INNER JOIN urun ON urun.kat_id=kategori.kat_id WHERE kategori.kat_id='".$_POST['id']."'");
     while ($m=mysql_fetch_assoc($makarnalar)) 
     {
    ?> 
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $m['urun_id']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content m-content">
        <div class="modal-header m-header">
          <h4 class="modal-title m-title"><?php echo $m['urun_adi']; ?><span class="btn buton"><b><?php echo number_format($m['urun_fiyat'],2)."₺ "; ?></b></span></h4>
        </div>
        <div class="modal-body m-body">
          <img src="<?php echo $m['urun_resim_baglanti']; ?>" class="rounded mx-auto d-block img-fluid" alt="jaja_boss">
        </div>
        <div class="modal-footer m-footer">
          <h1><?php echo $m['urun_adi']; ?></h1>
         <p><?php echo $m['urun_aciklama']; ?></p>
        </div>
      </div> 
    </div>
  </div>
</div>
	<?php  }  ?> 

  