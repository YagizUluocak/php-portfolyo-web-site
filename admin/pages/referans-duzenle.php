<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
$updated = false;
if(isset($_GET["referans_id"])) {
    $tablo = "referans";
    $tablo_id = "referans_id";
    $id = $_GET["referans_id"];
    $referans = new veriGetir();

    $referanslar = $referans->veriIdGetir($tablo, $tablo_id, $id);

    if(isset($_POST["submit"])) 
    {
        $referans_baslik = $_POST["baslik"];
        $referans_url = $_POST["url"]; 
        $referans_resim = $_FILES["referans_resim"]["name"];       
        $referans = new referans();
        
        if($referans->referansDuzenle($id, $referans_baslik, $referans_resim, $referans_url))
        {
            $updated = true;
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'referans.php';
                    }, 1000); // 1500 milisaniye = 1.8 saniye
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
                <div class="row g-4" style="min-height: 70vh;">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Referans Düzenle</h6>
                            <?php
                                if($updated)
                                {
                                ?>
                                    <div class="alert alert-success text-center" role="alert" id="alertBox">
                                    <h6 style="color: black;">Güncelleme İşlemi Başarıyla Gerçekleştirildi. Yönlendiriliyorsunuz!</h6>
                                    </div>
                                <?php
                                }
                            ?>
                            <form method="POST" enctype="multipart/form-data" style="min-height: 50vh;">
                                <div class="mb-3">
                                <label for="referans_resim" class="form-label d-block"> <h6 style="color: black;">Referans Resim</h6> </label>
                                    <img style="width:200px;" class="img-fluid mb-4" src="../images/referans/<?php echo $referanslar->referans_resim?>" alt="">

                                    <input class="form-control bg-dark" type="file" id="referans_resim" name="referans_resim">
                                </div>
                                <div class="mb-3">
                                    <label for="baslik" class="form-label"> <h6 style="color: black;">Referans Başlık</h6></label>
                                    <input type="text" class="form-control" id="baslik" name="baslik" value="<?php echo $referanslar->referans_baslik?>">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label"><h6 style="color: black;">Referans Url'si</h6></label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $referanslar->referans_url?>">
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