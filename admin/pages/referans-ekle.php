<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
    if(isset($_POST["submit"]))
    {
        $referans = new referans();

        $referans_baslik = $_POST["baslik"];
        $referans_url = $_POST["url"];

        $referans->referansResimyYukle($_FILES["referans_resim"]);
        $referans_resim = $_FILES["referans_resim"]["name"];

        if($referans->referansEkle($referans_baslik, $referans_resim, $referans_url))
        {
            echo "<script>window.location.href='referans.php';</script>";
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
                <div class="row g-4 h-100" >
                    <div class="col-sm-12 col-xl-12">     
                        <div class="col">
                            <div class="bg-light p-4" style="height: 100%;">
                                <h6 class="mb-4">Referans Ekle</h6>
                                <form method="POST" enctype="multipart/form-data" style="min-height:55vh;">
                                    <div class="mb-3">
                                        <label for="referans_resim" class="form-label"> <h6 style="color: black;">Referans Resim</h6> </label>
                                        <input class="form-control bg-dark" type="file" id="referans_resim" name="referans_resim">
                                    </div>
                                    <div class="mb-3">
                                        <label for="baslik" class="form-label"> <h6 style="color: black;">Referans Başlık</h6></label>
                                        <input type="text" class="form-control" id="baslik" name="baslik">
                                    </div>
                                    <div class="mb-3">
                                        <label for="url" class="form-label"><h6 style="color: black;">Referans Url'si</h6></label>
                                        <input type="text" class="form-control" id="url" name="url">
                                    </div>
                                        <button type="submit" class="btn btn-success rounded-pill" name="submit">Kaydet</button>
                                </form>
                            </div>
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