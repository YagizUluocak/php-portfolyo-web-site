<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";
include "../inc/_header.php";
?>

<?php
    $updated = false;

    $text = new Text();
    $textalan = $text->textget();
    $txt_id = 0;

    if(isset($_POST["submit"]))
    {
        $txt_1 = $_POST["txt_1"];
        $txt_2 = $_POST["txt_2"];
        $txt_3 = $_POST["txt_3"];
        $txt_4 = $_POST["txt_4"];
        $txt_5 = $_POST["txt_5"];
        $txt_6 = $_POST["txt_6"];
        $txt_7 = $_POST["txt_7"];
        $txt_8 = $_POST["txt_8"];
        $txt_9 = $_POST["txt_9"];
        $txt_10 = $_POST["txt_10"];
        $txt_11 = $_POST["txt_11"];
        $txt_12 = $_POST["txt_12"];
        $txt_13 = $_POST["txt_13"];
        $txt_14 = $_POST["txt_14"];
        $txt_15 = $_POST["txt_15"];

        $text = new Text();

        if($text->textDuzenle($txt_id, $txt_1, $txt_2, $txt_3, $txt_4,  $txt_5, $txt_6, $txt_7, $txt_8, $txt_9, $txt_10, $txt_11, $txt_12, $txt_13, $txt_14, $txt_15))
        {
            $updated = true;
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'text.php';
                    }, 1300); // 1500 milisaniye = 1.8 saniye
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
                            <h6 class="mb-4">Text Alanları</h6>
                            <?php
                                if($updated)
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
                                    <label for="txt_1" class="form-label"> <h6 style="color: black;">Txt_1</h6></label>
                                    <input type="text" class="form-control" id="txt_1" name="txt_1" value="<?php echo $textalan->txt_1?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_2" class="form-label"> <h6 style="color: black;">Txt_2</h6></label>
                                    <input type="text" class="form-control" id="txt_2" name="txt_2" value="<?php echo $textalan->txt_2?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_3" class="form-label"> <h6 style="color: black;">Txt_3</h6></label>
                                    <input type="text" class="form-control" id="txt_3" name="txt_3" value="<?php echo $textalan->txt_3?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_4" class="form-label"> <h6 style="color: black;">Txt_4</h6></label>
                                    <input type="text" class="form-control" id="txt_4" name="txt_4" value="<?php echo $textalan->txt_4?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_5" class="form-label"> <h6 style="color: black;">Txt_5</h6></label>
                                    <input type="text" class="form-control" id="txt_5" name="txt_5" value="<?php echo $textalan->txt_5?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_6" class="form-label"> <h6 style="color: black;">Txt_6</h6></label>
                                    <input type="text" class="form-control" id="txt_6" name="txt_6" value="<?php echo $textalan->txt_6?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_7" class="form-label"> <h6 style="color: black;">Txt_7</h6></label>
                                    <input type="text" class="form-control" id="txt_7" name="txt_7" value="<?php echo $textalan->txt_7?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_8" class="form-label"> <h6 style="color: black;">Txt_8</h6></label>
                                    <input type="text" class="form-control" id="txt_8" name="txt_8" value="<?php echo $textalan->txt_8?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_9" class="form-label"> <h6 style="color: black;">Txt_9</h6></label>
                                    <input type="text" class="form-control" id="txt_9" name="txt_9" value="<?php echo $textalan->txt_9?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_10" class="form-label"> <h6 style="color: black;">Txt_10</h6></label>
                                    <input type="text" class="form-control" id="txt_10" name="txt_10" value="<?php echo $textalan->txt_10?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_11" class="form-label"> <h6 style="color: black;">Txt_11</h6></label>
                                    <input type="text" class="form-control" id="txt_11" name="txt_11" value="<?php echo $textalan->txt_11?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_12" class="form-label"> <h6 style="color: black;">Txt_12</h6></label>
                                    <input type="text" class="form-control" id="txt_12" name="txt_12" value="<?php echo $textalan->txt_12?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_13" class="form-label"> <h6 style="color: black;">Txt_13</h6></label>
                                    <input type="text" class="form-control" id="txt_13" name="txt_13" value="<?php echo $textalan->txt_13?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_14" class="form-label"> <h6 style="color: black;">Txt_14</h6></label>
                                    <input type="text" class="form-control" id="txt_14" name="txt_14" value="<?php echo $textalan->txt_14?>">
                                </div>
                                <div class="mb-3">
                                    <label for="txt_15" class="form-label"> <h6 style="color: black;">Txt_15</h6></label>
                                    <input type="text" class="form-control" id="txt_15" name="txt_15" value="<?php echo $textalan->txt_15?>">
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