<?php
      $tablo = "menu";
      $tablo_id = "menu_id";
      $id = 1;

      $verigetir = new veriGetir();
      $menuGetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id);


?>

<section style="  display: flex; justify-content: center; align-items: center;" class="section " data-section="<?php echo $menuGetir->menu_url ?>">
  <div class="container">
    <?php  
      $tablo = "textalanlari";
      $tablo_id = "txt_id";
      $id = 0;

      $verigetir = new veriGetir();
      $txtalangetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id); 
    ?>
      <!-- Hakkımızda Alanı -->
      <div class="section-heading" > 
        <h2><?php echo $txtalangetir->txt_1?></h2>
        <div class="line-dec"></div>
          <span style="text-align: left;">
            <?php echo $txtalangetir->txt_2?>
          </span>
      </div>
      <!-- Hakkımızda Alanı Sonu -->
  </div>
</section>