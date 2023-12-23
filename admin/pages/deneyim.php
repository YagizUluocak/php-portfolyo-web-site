<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
    $deneyim = new veriGetir();
    $deleted = false;
    $sayfa = "deneyim";
    $deneyimsil = new veriGetir();
    if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['deneyim_id'])) {
        $deneyim_id = $_GET['deneyim_id'];
        //Sil fonksiyonunu çağır  
        $silme_sonuc = $deneyimsil->deneyimSil($deneyim_id);
        
        $deleted = true;
        // Silme işlemi başarılıysa
        if($deleted) 
        {
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() 
                {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
                    //1000 milisaniye = 1 saniye
                    setTimeout(function(){ window.location.href = 'deneyim.php'; }, 1000); 
                });
            </script>
            <?php
        }
    }
?>

<?php include "../inc/_header.php";?>

    <body>
        <div class="container-fluid position-relative d-flex p-0">,
            <!-- Sidebar Start -->
            <?php include "../inc/_sidebar.php";?>
            <!-- Sidebar End -->

            <div class="content">
                <!-- Navbar Start -->
                <?php include "../inc/_navbar.php";?>
                <!-- Navbar End -->

                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4" style="min-height: 90vh;">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h4 style="margin-bottom: 32px;">Deneyimler</h4>
                                <a href="deneyim-ekle.php" class="btn btn-success mb-2"><i class="fa fa-plus me-2"></i>Yeni Ekle</a>
                                <div class="table-responsive">
                                    <?php
                                        if($deleted)
                                        {
                                        ?>
                                            <div class="alert alert-success text-center" role="alert" id="alertBox">
                                                <h6 style="color: black;">Silme İşlemi Başarıyla Gerçekleştirildi!</h6>
                                            </div>
                                        <?php
                                        }
                                    ?>           
                                    <table class="table text-center" style="margin-top: 20px;">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:50px;">#</th>
                                                <th scope="col">Görev</th>
                                                <th scope="col">İş Tanımı</th>
                                                <th scope="col">Şirket İsmi</th>
                                                <th scope="col" style="width:150px;">Düzenle</th>
                                                <th scope="col" style="width:150px;">Sil</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if($deneyim->veriGetir($sayfa))
                                        {
                                        ?>
                                        <tbody>
                                            <?php
                                            foreach($deneyim->veriGetir($sayfa) as $dnym)
                                            {               
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $dnym->deneyim_id?></th>
                                                    <td><?php echo $dnym->deneyim_baslik?></td>
                                                    <td><?php echo $dnym->deneyim_icerik?></td>
                                                    <td><?php echo $dnym->deneyim_sirket?></td>
                                                    <td><a href="deneyim-duzenle.php?deneyim_id=<?php echo $dnym->deneyim_id?>" class="btn btn-warning btn-sm"><i class="fa fa-pen me-2"></i>Düzenle</a></td>
                                                    <td><a href="deneyim.php?deneyim_id=<?php echo $dnym->deneyim_id ?>&islem=sil" class="btn btn-danger btn-sm"><i class="fa fa-trash me-2"></i>Sil</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                            <?php
                                        }
                                        ?>
                                    </table>
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