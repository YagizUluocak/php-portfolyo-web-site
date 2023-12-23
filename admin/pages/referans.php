<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

?>

<?php
    $referans = new veriGetir();
    $referanslar = new referans();
    $sayfa ="referans";

    if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['referans_id'])) {
        $referans_id = $_GET['referans_id'];
        $silme_sonuc = $referanslar->referansSil($referans_id);
        
        if($silme_sonuc) {
            echo "<script>window.location.href='referans.php?referansSil=ok';</script>";
            exit;
        } else {
            echo "<script>window.location.href='referans.php?referansSil=no';</script>";
            exit;
        }
    }
?>
<?php include "../inc/_header.php";?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
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
                            <h4 style="margin-bottom: 32px;">Referanslar</h4>
                            <a href="referans-ekle.php" class="btn btn-success mb-2"><i class="fa fa-plus me-2"></i>Yeni Ekle</a>
                            <div class="table-responsive">
                                <table class="table text-center" style="margin-top: 20px;">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:50px;">#</th>
                                            <th scope="col" style="width:140px;">Resim</th>
                                            <th scope="col" style="width:120px;">Başlık</th>
                                            <th scope="col" style="width:130px;">Url</th>
                                            <th scope="col" style="width:100px;">Düzenle</th>
                                            <th scope="col" style="width:100px;">SiL</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if($referans->veriGetir($sayfa))
                                    {
                                        ?>
                                        <tbody>
                                            <?php
                                            foreach($referans->veriGetir($sayfa) as $ref)
                                            {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $ref->referans_id?></th>
                                                    <td> <img class="img-fluid" src="../images/referans/<?php echo $ref->referans_resim?>" alt=""> </td>
                                                    <td><?php echo $ref->referans_baslik?></td>
                                                    <td><?php echo $ref->referans_url?></td>
                                                    <td><a href="referans-duzenle.php?referans_id=<?php echo $ref->referans_id?>" class="btn btn-warning btn-sm"><i class="fa fa-pen me-2"></i>Düzenle</a></td> 
                                                    <td><a href="referans.php?referans_id=<?php echo $ref->referans_id?>&islem=sil" class="btn btn-danger mb-2"><i class="fa fa-trash me-2"></i>Sil</a></td>                
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