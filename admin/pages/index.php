<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
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
                                <h6 class="mb-4">ANASAYFA</h6>
                                <!-- Anasayfa İçerik Start -->
    


                                <!-- Anasayfa İçerik End -->
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
