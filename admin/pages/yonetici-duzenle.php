<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>
<?php
$updated = false;
if(isset($_GET["yonetici_id"])) {
    $tablo = "yonetici";
    $tablo_id = "yonetici_id";
    $id = $_GET["yonetici_id"];
    $yonetici = new veriGetir();

    $yoneticiler = $yonetici->veriIdGetir($tablo, $tablo_id, $id);


    if(isset($_POST["submit"])) 
    {
        $yonetici_ad = $_POST["ad"];
        $yonetici_username = $_POST["username"];
        $yonetici_password = $_POST["password"];
        
        $yonetici = new yonetici();

        if($yonetici->yoneticiDuzenle($id, $yonetici_ad, $yonetici_username, $yonetici_password, ))
        {
            $updated = true;
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'yonetici.php';
                    }, 1800); // 1500 milisaniye = 1.8 saniye
                });
            </script>
            <?php
        }
    }
}
?>
<?php
include "../inc/_header.php";
?>



<body>
    <div class="container-fluid position-relative d-flex p-0">
            <!-- Sidebar Start -->
            <?php include "../inc/_sidebar.php";?>
            <!-- Sidebar End -->
            <div class="content">
                <!-- Navbar Start -->
                <?php include "../inc/_navbar.php";?>
                <!-- Navbar End -->
                <div class="container-fluid pt-4 px-4" >
                    <div class="col-sm-12 col-xl-12">
                        <div class="col">
                            <div class="bg-light rounded h-100vh p-4" style="min-height: 68vh;">
                                <h6 class="mb-4">Yönetici Düzenle</h6>
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
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="ad" class="form-label"> <h6 style="color: black;">Yönetici Ad</h6></label>
                                        <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $yoneticiler->yonetici_ad?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label"><h6 style="color: black;">Yönetici Username</h6></label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $yoneticiler->yonetici_username?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><h6 style="color: black;">Yönetici Password</h6></label>
                                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $yoneticiler->yonetici_password?>">
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