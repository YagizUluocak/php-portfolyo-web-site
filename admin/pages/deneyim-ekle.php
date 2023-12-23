<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
$added = false;
if(isset($_POST["submit"]))
{
    $deneyim = new Deneyim();
    $deneyim_baslik = $_POST["deneyim_baslik"];
    $deneyim_icerik = $_POST["deneyim_icerik"];
    $deneyim_sirket = $_POST["deneyim_sirket"];

    if($deneyim->deneyimEkle($deneyim_baslik, $deneyim_icerik, $deneyim_sirket))
    {
        $added = true;
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var alertBox = document.getElementById('alertBox');
                alertBox.style.display = 'block';
    
                setTimeout(function() {
                    window.location.href = 'deneyim.php';
                }, 1300); // 1300 milisaniye = 1.3 saniye
            });
        </script>
        <?php
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
                                <h6 class="mb-4">Deneyim Ekle</h6>
                                <?php
                                    if($added)
                                    {
                                    ?>
                                        <div class="alert alert-success text-center" role="alert" id="alertBox">
                                            <h6 style="color: black;">Kayıt İşlemi Başarıyla Gerçekleştirildi. Yönlendiriliyor!</h6>
                                        </div>
                                    <?php
                                    }
                                ?>           
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="deneyim_baslik" class="form-label"> <h6 style="color: black;">Görev Başlığı</h6></label>
                                        <input type="text" class="form-control" id="deneyim_baslik" name="deneyim_baslik">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deneyim_icerik" class="form-label"><h6 style="color: black;">İş Tanımı</h6></label>
                                        <input type="text" class="form-control" id="deneyim_icerik" name="deneyim_icerik">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deneyim_sirket" class="form-label"><h6 style="color: black;">Şirket İsmi</h6></label>
                                        <input type="text" class="form-control" id="deneyim_sirket" name="deneyim_sirket">
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