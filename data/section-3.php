<?php
$tablo = "textalanlari";
$tablo_id = "txt_id";
$id = 0;

$verigetir = new veriGetir();
$txtalangetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id);

$tablo = "menu";
$tablo_id = "menu_id";
$id = 4;

$verigetir = new veriGetir(); //verigetir Classından yeni bir nesne üretip değişkene atıyoruz.
$menuGetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id);


$sayfa = "referans"; 
$Verigetir = new veriGetir();
$referansGetir = $Verigetir->veriGetir($sayfa);

?>

<section class="section my-work" data-section="<?php echo $menuGetir->menu_url ?>">
        <div class="container">
          <div class="section-heading">
            <h2><?php echo $txtalangetir->txt_5?></h2>
            <div class="line-dec"></div>
            <span>
              <?php echo $txtalangetir->txt_6?>
            </span>
          </div>
          <div class="row">
            <div class="isotope-wrapper">

              <div class="isotope-box">

                <?php
                  foreach($referansGetir as $ref)
                  {
                    ?>      

                      <div class="isotope-item" data-type="nature">
                        <figure class="snip1321">
                          <img class="img-fluid" src="./admin/images/referans/<?php echo $ref->referans_resim ?>" alt="<?php echo $ref->referans_baslik ?>"/>
                          <figcaption>
                            <a target="_blank" href="<?php echo $ref->referans_url ?>"><i class="fa fa-search"></i></a>
                            <h4><?php echo $ref->referans_baslik ?></h4>
                          </figcaption>
                        </figure>
                      </div>

                    <?php      
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>