<?php
$tablo = "ayar";
$tablo_id = "ayar_id";
$id = 1;

$verigetir = new veriGetir();
$ayarGetir = $verigetir->veriIdGetir($tablo , $tablo_id, $id); 

$sayfa = "menu"; 
$Verigetir = new veriGetir();
$menuGetir = $Verigetir->veriGetir($sayfa);

?>         
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
              <a href="#"><img src="./admin/images/ayar/<?php echo $ayarGetir->ayar_resim?>" alt="" /></a>
            </div>
            <div class="author-content">
              <h4><?php echo $ayarGetir->ayar_isim?></h4>
              <span><?php echo $ayarGetir->ayar_meslek?></span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <?php

                  foreach($menuGetir as $mnu)
                  {
                    ?>
                       <li><a href="#<?php echo $mnu->menu_url?>"><?php echo $mnu->menu_ad ?></a></li>
                    <?php
                  }
                ?>
              </ul>
            </nav>
            <div class="social-network">
              <ul class="soial-icons">
                <li>
                  <a href="https://fb.com/templatemo"
                    ><i class="fa fa-facebook"></i
                  ></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-rss"></i></a>
                </li>
              </ul>
            </div>
            <div class="copyright-text">
              <p>Casdasopyright 2019 Reflux Design</p>
            </div>
          </div>
        </div>
      </div>