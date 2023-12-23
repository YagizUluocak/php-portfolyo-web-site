<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
?>

<?php
    $updated = false;

    $ayar = new Ayar();
    $ayarlar = $ayar->ayarGetir();
    $ayar_id = 1;

    if(isset($_POST["submit"]))
    {
        $ayar_linkedin = $_POST["ayar_linkedin"];
        $ayar_instagram = $_POST["ayar_instagram"];
        $ayar_github = $_POST["ayar_github"];

        $ayar = new Ayar();

        if($ayar->sosyalAyarDuzenle($ayar_id, $ayar_linkedin, $ayar_instagram, $ayar_github))
        {
            $updated = true;
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'sosyal-medya.php';
                    }, 1200); // 1300 milisaniye = 1.3 saniye
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
            <div class="row g-4 h-100" >
                <div class="col-sm-12 col-xl-12">
                    <div class="col">
                        <div class="bg-light rounded p-4" style="height: 100%;">
                            <h6 class="mb-4">Sosyal Medya Ayarları</h6>
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
                            <form method="POST" style="min-height: 55vh;">
                                <div class="mb-3">
                                    <label for="ayar_linkedin" class="form-label"> <h6 style="color: black;">Linkedin</h6></label>
                                    <input type="text" class="form-control" id="ayar_linkedin" name="ayar_linkedin" value="<?php echo $ayarlar->ayar_linkedin?>">
                                </div>
                                <div class="mb-3">
                                    <label for="ayar_instagram" class="form-label"> <h6 style="color: black;">İnstagram</h6></label>
                                    <input type="text" class="form-control" id="ayar_instagram" name="ayar_instagram" value="<?php echo $ayarlar->ayar_instagram?>">
                                </div>
                                <div class="mb-3">
                                    <label for="ayar_github" class="form-label"> <h6 style="color: black;">Github</h6></label>
                                    <input type="text" class="form-control" id="ayar_github" name="ayar_github" value="<?php echo $ayarlar->ayar_github?>">
                                </div>
                                    <button type="submit" class="btn btn-success rounded-pill" name="submit">Güncelle</button>
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