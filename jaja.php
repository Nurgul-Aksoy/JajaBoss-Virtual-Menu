<?php 
  include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JAJA BOSS</title>
	<link rel="stylesheet" type="text/css" href="jaja_boss.css">
  <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" href="css/bootstrap-responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script  type="text/javascript"> 
  $(document).ready(function(){
    $(".menuitem").click(function(){
      $(".menuitem").removeClass("rounded-pill");
      $(this).addClass("rounded-pill");
      var id=$(this).data("id");   
                $.ajax({
                  type:"POST",
                  url:"demo_test.php",
                  data:{id},
                  success:function(response)
                           {
                              $('#icerik').html(response);

                            }
                }); 
        });
    });
 $("document").ready(function() {
        $(".menuitem").click(function() {
            $("html, body").animate({
                    scrollTop: innerHeight,
                },
                "slow"
            );
            return false;
        });
    });
</script>
<style>
  .active{
    background-color:#20202f !important;
    color:#fff !important;
     cursor: pointer;
    }
</style>
</head>
<body>
	<header>
		<div class="container">
			<img src="jajaboss.png" class="mx-auto d-block" alt="jaja_boss">
		</div>
	</header>
	<nav>
		<div class="container" id="myDIV">
			<ul class="nav nav-pills nav-justified">
  <?php
  $kategoriBul = mysql_query("SELECT * FROM kategori ORDER BY kat_sira ASC");
  ?>
  <?php 
    $i = 0;
    while( $row = MYSQL_FETCH_OBJECT($kategoriBul) ){ ?>
       <li class="nav-item">
           <a class="nav-link text-dark fs-4 display-6 menuitem <?php if($i==0) { ?> active<?php } ?>"  data-id="<?php  print_r ($row->kat_id ); ?>" style ="border-radius:25rem"> <?php print_r ($row->kat_adi ); ?> </a>    
        </li>
   <?php  $i++; } ?>

			</ul>
		</div>
        <script>
          var header = document.getElementById("myDIV");
          var btns = header.getElementsByClassName("menuitem");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            if (current.length > 0) { 
              current[0].className = current[0].className.replace(" active", "");
            }
            this.className += " active";
            });
          }
</script>
	</nav>
<br><br><br><br><br>

<div class="container boxes">
 <div class="row d-flex justify-content-around" id="icerik" >
  <?php  
     $ilkkategori = mysql_query("SELECT urun_id,urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti FROM kategori INNER JOIN urun ON urun.kat_id=kategori.kat_id WHERE kategori.kat_id=(SELECT kat_id FROM kategori ORDER BY kat_sira ASC LIMIT 1)");
     while ($i=mysql_fetch_assoc($ilkkategori)) 
     {
    ?> 
 	  <div class="box" data-toggle="modal" data-target="#myModal<?php echo $i['urun_id']; ?>">
      <div class="col-md-4 rounded mx-auto d-block  text-center" id="<?php $i['urun_id']; ?>"><?php echo $i['urun_adi']; ?></div> 
        <div class="thumbnail" style="position:relative;z-index:10;">
          <img src="<?php echo $i['urun_resim_baglanti']; ?>" class="rounded float-left img-fluid" alt="jaja_boss"  style=" position:relative; z-index:1; margin-top:-35px;">
            <div class="aciklama">
              <h2 class="fs-4" style="margin-left:5px; float:left; width:80%;"><?php echo $i['urun_adi']; ?></h2><span class="btn btn-dark" style="float:right; margin-top:-35px; margin-right:10px; width: 20%;"><?php echo number_format($i['urun_fiyat'],2)."₺ "; ?></span>
                    <p style="margin-left:8px; font-size: 0.75rem; "><?php echo $i['urun_aciklama']; ?></p>
            </div>    
        </div>   
      </div>
 <?php  }  ?></div>
</div>
  <footer>
  <p class="fs-6" >Copyright - 2021 Jaja Boss </p>
</footer>
<br>

<!--MODAL-->

<?php  
     $ilkkategori = mysql_query("SELECT urun_id,urun_adi,urun_fiyat,urun_aciklama,urun_resim_baglanti FROM kategori INNER JOIN urun ON urun.kat_id=kategori.kat_id WHERE kategori.kat_id=(SELECT kat_id FROM kategori ORDER BY kat_sira ASC LIMIT 1)");
     while ($i=mysql_fetch_assoc($ilkkategori)) 
     {
    ?> 
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $i['urun_id']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content m-content">
        <div class="modal-header m-header">
          <h4 class="modal-title m-title"><?php echo $i['urun_adi']; ?><span class="btn buton"><b><?php echo number_format($i['urun_fiyat'],2)."₺ "; ?></b></span></h4>
        </div>
        <div class="modal-body m-body">
          <img src="<?php echo $i['urun_resim_baglanti']; ?>" class="rounded mx-auto d-block img-fluid" alt="jaja_boss">
        </div>
        <div class="modal-footer m-footer">
          <h1><?php echo $i['urun_adi']; ?></h1>
         <p><?php echo $i['urun_aciklama']; ?></p>
        </div>
      </div> 
    </div>
  </div>
</div>
  <?php  }  ?> 

  


<br><br><br>
</body>
</html>