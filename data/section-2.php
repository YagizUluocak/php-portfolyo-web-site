<?php  
      // Tek kayıt olan tablolarımızda veriIdGetir fonksiyonu ile id'sine göre koşul yazdığımız fonksiyonu çağırabilmek için 
      // tablo = tablo ismi, 
      // tablo_id = tablonun id'sinin ismi,
      // id = tablonun tek kaydının id'si.
      // Burda amaçlanan tek kayıtlı tablolarda İd'ye göre veriçekmek istediğimiz tablolardan tek fonksiyonda değişkenlerin içlerine tablonun gerekli bilgilerini yazarak yeni bir fonksiyon yazmaya gerek duymadan tek fonksiyonda halledebilmek.
      $tablo = "textalanlari";
      $tablo_id = "txt_id";
      $id = 0;

      $verigetir = new veriGetir(); //verigetir Classından yeni bir nesne üretip değişkene atıyoruz.
      $txtalangetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id); //yarattığımız nesne'nin classının içerisinde bulunan veriIdGetir fonksiyonunu çağırıyoruz.
    
      $tablo = "menu";
      $tablo_id = "menu_id";
      $id = 3;

      $verigetir = new veriGetir(); //verigetir Classından yeni bir nesne üretip değişkene atıyoruz.
      $menuGetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id);

    ?>

<section class="section my-services" data-section="<?php echo $menuGetir->menu_url ?>">

  <div class="container">
    <div class="section-heading">
      <h2><?php echo $txtalangetir->txt_3?></h2>
      <div class="line-dec"></div>
      <span>
        <?php echo $txtalangetir->txt_4?>
      </span>
    </div>

    <div class="row">
      <?php
    
        $sayfa = "yetenek"; 
        $Verigetir = new veriGetir();
        $yetenekGetir = $Verigetir->veriGetir($sayfa);
        foreach($yetenekGetir as $ytnk)
        {
          ?>
            <div class="col-md-6">
              <div class="service-item" style="height: 380px; overflow:hidden; display: flex; flex-direction: column;  justify-content: center; ">
                <div class="mb-4">
                  <i class="<?php echo $ytnk->yetenek_icon?>"></i> 
                </div>
                <h4><?php echo $ytnk->yetenek_baslik?></h4>
                <p>
                <?php echo $ytnk->yetenek_icerik?>
                </p>
              </div>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</section>