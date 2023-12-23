<?php
      $tablo = "menu";
      $tablo_id = "menu_id";
      $id = 2;

      $verigetir = new veriGetir();
      $menuGetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id);


?>
<section  class="section" data-section="<?php echo $menuGetir->menu_url ?>">
  <div class="container">

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
       
    ?>

     <?php
      $sayfa = "deneyim";  
      // sayfa değişkenine tablomuzun adını atıyoruz. VeriGetir fonksiyonunu diğer tablolarda da kullanabilmek için dinamik bir hale getirdik.
      $verigetir = new veriGetir(); //verigetir Classından yeni bir nesne üretip değişkene atıyoruz.
      $deneyimgetir = $verigetir->veriGetir($sayfa); //yarattığımız nesne'nin classının içerisinde bulunan veriGetir fonksiyonunu çağırıyoruz ve içerisine sorguya eklenecek olan sayfa değişkenini gönderiyoruz.
      ?>
      <h2 class="text-center mt-4"><?php echo $menuGetir->menu_ad ?></h2>
      <?php
      foreach($deneyimgetir as $dnym)
      {
        ?>
          <!-- Deneyim alanı Başlangıç -->
          <div class="right-image-post">

            <div class="row">
              <div class="col-md-12">
                <div class="left-text">
                  <h4><?php echo $dnym->deneyim_baslik?></h4>
                  <h6><?php echo $dnym->deneyim_sirket?></h6>
                    <p>
                      <?php echo $dnym->deneyim_icerik?>
                    </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Deneyim alanı Sonu -->
        <?php
      }
    ?>

  </div>
</section>