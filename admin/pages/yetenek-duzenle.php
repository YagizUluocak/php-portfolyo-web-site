<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

?>


<?php
  $updated = false;
  if(isset($_GET["yetenek_id"]))
  {
    $tablo = "yetenek";
    $tablo_id = "yetenek_id";
    $id = $_GET["yetenek_id"];
    $yetenek = new veriGetir();

    $yetenekler = $yetenek->veriIdGetir($tablo, $tablo_id, $id);

    if(isset($_POST["submit"]))
    {
      
      $yetenek_baslik = $_POST["yetenek_baslik"];
      $yetenek_icerik = $_POST["yetenek_icerik"];
      $yetenek_icon = $_POST["yetenek_icon"];
      $yetenek = new Yetenek();

      if($yetenek->yetenekDuzenle($id, $yetenek_baslik, $yetenek_icerik, $yetenek_icon))
      {
        $updated = true;
              ?>
              <script>
                  document.addEventListener("DOMContentLoaded", function() {
                      var alertBox = document.getElementById('alertBox');
                      alertBox.style.display = 'block';
          
                      setTimeout(function() {
                          window.location.href = 'yetenek.php';
                      }, 1000); // 1000 milisaniye = 1 saniye
                  });
              </script>
              <?php
      }
    }
  }
?>
<?php include "../inc/_header.php";?>
<body>

<div class="container-fluid position-relative d-flex p-0" style="background-color: white; height: 100%;">
  <!-- Sidebar Start -->
  <?php include "../inc/_sidebar.php";?>
  <!-- Sidebar End -->    
  <div class="content">
    <!-- Navbar Start -->
    <?php include "../inc/_navbar.php";?>
    <!-- Navbar End -->   
    <div class="container-fluid pt-4 px-4">
      <div class="row g-4" style="min-height: 85vh;">
        <div class="col-sm-12 col-xl-12">
          <div class="bg-light rounded h-100 p-4" >
              <h4 class="mb-4">Yetenek Düzenle</h4>
              <?php
                  if($updated)
                  {
                  ?>
                      <div class="alert alert-success text-center" role="alert" id="alertBox">
                      <h6 style="color: black;">Güncelleme İşlemi Başarıyla Gerçekleştirildi. Yönlendiriliyor!</h6>
                      </div>
                  <?php
                  }
              ?>     
              <form method="POST" >
                    <div class="mb-3">
                        <label for="yetenek_baslik" class="form-label"> <h6 style="color: black;">Başlık</h6></label>
                        <input type="text" class="form-control" id="yetenek_baslik" name="yetenek_baslik" value="<?php echo $yetenekler->yetenek_baslik?>">
                    </div>
                    <div class="mb-3">
                        <label for="yetenek_icerik" class="form-label"><h6 style="color: black;">İçerik</h6></label>
                        <input type="text" class="form-control" id="yetenek_icerik" name="yetenek_icerik" value="<?php echo $yetenekler->yetenek_icerik?>">
                    </div>
                    <div class="mb-3">
                        <label for="yetenek_icon" class="form-label"><h6 style="color: black;">Simge</h6></label>
                        <input type="text" class="form-control" id="yetenek_icon" name="yetenek_icon" value="<?php echo $yetenekler->yetenek_icon?>">
                    </div>
                        <button type="submit" class="btn btn-success rounded-pill" name="submit">Kaydet</button>
              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Start -->
    <?php include "../inc/_footer.php";?>
    <!-- Footer End -->
  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
    <i class="bi bi-arrow-up"></i>
  </a>
</div>
  <!-- JavaScript Libraries -->
  <?php include "../inc/_scripts.php";?>
  <!-- JavaScript Libraries End -->  


</body>
</html>


<style>
    /* Style the Image Used to Trigger the Modal */
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (Image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 100%;
    max-width: 700px;
  }

  /* Caption of Modal Image (Image Text) - Same Width as the Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation - Zoom in the Modal */
  .modal-content, #caption {
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 45px;
    right: 380px;
    color: white;
    font-size: 55px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
</style>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
</script>