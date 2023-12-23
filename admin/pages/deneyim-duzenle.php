<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
    $updated = false;

    if(isset($_GET["deneyim_id"]))
    {
        $tablo = "deneyim";
        $tablo_id = "deneyim_id";
        $id = $_GET["deneyim_id"];
        $deneyim = new veriGetir();

        $deneyimler = $deneyim->veriIdGetir($tablo, $tablo_id, $id);
        
        if(isset($_POST["submit"]))
        { 
            $deneyim_baslik = $_POST["deneyim_baslik"];
            $deneyim_icerik = $_POST["deneyim_icerik"];
            $deneyim_sirket = $_POST["deneyim_sirket"];
            $deneyim = new Deneyim();

            if($deneyim->deneyimDuzenle($id, $deneyim_baslik, $deneyim_icerik, $deneyim_sirket))
            {
                $updated = true;
                ?>
                    <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var alertBox = document.getElementById('alertBox');
                                alertBox.style.display = 'block';
                    
                                setTimeout(function() {
                                    window.location.href = 'deneyim.php';
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
                            <div class="bg-light rounded h-100 p-4" >
                                <h5 style="color: black; margin-bottom:48px;">Deneyim Düzenle</h5>
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
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="deneyim_baslik" class="form-label"> <h6 style="color: black;">Görev Başlığı</h6></label>
                                        <input type="text" class="form-control" id="deneyim_baslik" name="deneyim_baslik" value="<?php echo $deneyimler->deneyim_baslik?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deneyim_icerik" class="form-label"><h6 style="color: black;">İş Tanımı</h6></label>
                                        <input type="text" class="form-control" id="deneyim_icerik" name="deneyim_icerik" value="<?php echo $deneyimler->deneyim_icerik?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deneyim_sirket" class="form-label"><h6 style="color: black;">Şirket İsmi</h6></label>
                                        <input type="text" class="form-control" id="deneyim_sirket" name="deneyim_sirket" value="<?php echo $deneyimler->deneyim_sirket?>">
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