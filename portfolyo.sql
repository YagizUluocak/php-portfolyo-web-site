-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Ara 2023, 02:21:32
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `portfolyo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_isim` varchar(100) DEFAULT NULL,
  `ayar_resim` varchar(255) DEFAULT NULL,
  `ayar_meslek` varchar(255) DEFAULT NULL,
  `ayar_linkedin` varchar(255) DEFAULT NULL,
  `ayar_instagram` varchar(255) DEFAULT NULL,
  `ayar_github` varchar(255) DEFAULT NULL,
  `ayar_mail` varchar(255) DEFAULT NULL,
  `ayar_tel` varchar(100) DEFAULT NULL,
  `ayar_adres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_isim`, `ayar_resim`, `ayar_meslek`, `ayar_linkedin`, `ayar_instagram`, `ayar_github`, `ayar_mail`, `ayar_tel`, `ayar_adres`) VALUES
(1, 'Yağız Uluocak', 'resim.jpg', 'Jr. Back-End Developer', 'linkedin.com/in/yağız-uluocak-b36039258', 'https://www.instagram.com/yagiz_uluocak/', 'https://github.com/YagizUluocak', 'uluocak.yagiz0@gmail.com', '0506 691 36 47', 'Ankara');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneyim`
--

CREATE TABLE `deneyim` (
  `deneyim_id` int(11) NOT NULL,
  `deneyim_baslik` varchar(100) NOT NULL,
  `deneyim_icerik` text NOT NULL,
  `deneyim_sirket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `deneyim`
--

INSERT INTO `deneyim` (`deneyim_id`, `deneyim_baslik`, `deneyim_icerik`, `deneyim_sirket`) VALUES
(1, 'Junior Web Developer', 'web site template giydirme ve back-end\'de çıkan sorunları çözmeye yönelik iş yürüttüm', 'Alva Grup'),
(6, 'Stajer', 'Unity oyun motorunu kullanarak basit içerikli 2D ve 3D olarak mobil ve masaüstü oyunlar geliştirdim', 'Bordo Yazılım'),
(7, 'Back-end Web Developer', 'Ön yüzü yazılmış web siteleri php ile admin paneli bağlantısı yaparak kişiselleştirilmiş web siteleri yazdım', 'BMO Ajans'),
(8, 'Sosyal Medya Danışmanı', 'İşletmelerin sosyal medya içeriklerinin oluşturulması, sayfanın düzenlenmesi, paylaşım planı oluşturulması ve paylaşılması gibi işlemler yaptım.', 'Freelance'),
(11, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ad`, `menu_url`) VALUES
(1, 'Hakkımda', 'hakkimda'),
(2, 'Deneyimler', 'deneyim'),
(3, 'Yetkinlikler', 'yetkinlikler'),
(4, 'Çalışmalarım', 'calismalar'),
(5, 'İletişim', 'iletisim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `referans_id` int(11) NOT NULL,
  `referans_baslik` varchar(250) NOT NULL,
  `referans_resim` varchar(250) NOT NULL,
  `referans_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`referans_id`, `referans_baslik`, `referans_resim`, `referans_url`) VALUES
(1, 'Çetaş İnşaat ve Mimarlık', 'cetaş.png', 'https://cetasinsaat.com/'),
(2, 'Bilge Cam Balkon', 'bilge.png', 'https://www.bilgecambalkon.com/'),
(3, 'Ankara Elektrik Tamircisi', 'elektrik.png', 'https://ankaraelektriktamircisi.com.tr/'),
(4, 'İsor Yapı', 'isor.png', 'https://isoryapi.com.tr/'),
(5, 'Koza Pastaneleri', 'koza.png', 'https://kozapastaneleri.com/'),
(6, 'Tarot Cassandra', 'tarot.png', 'https://tarotcassandra.com/'),
(7, 'Xy Plant', 'xyplant.png', 'https://xyplant.com/'),
(8, 'Eraslan Turizm', 'eraslan.png', 'https://eraslanturizm.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `textalanlari`
--

CREATE TABLE `textalanlari` (
  `txt_id` int(1) NOT NULL,
  `txt_1` varchar(255) DEFAULT NULL,
  `txt_2` text DEFAULT NULL,
  `txt_3` varchar(255) DEFAULT NULL,
  `txt_4` varchar(500) DEFAULT NULL,
  `txt_5` varchar(500) DEFAULT NULL,
  `txt_6` varchar(500) DEFAULT NULL,
  `txt_7` varchar(500) DEFAULT NULL,
  `txt_8` varchar(500) DEFAULT NULL,
  `txt_9` varchar(255) DEFAULT NULL,
  `txt_10` varchar(255) DEFAULT NULL,
  `txt_11` varchar(255) DEFAULT NULL,
  `txt_12` varchar(255) DEFAULT NULL,
  `txt_13` varchar(255) DEFAULT NULL,
  `txt_14` varchar(255) DEFAULT NULL,
  `txt_15` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `textalanlari`
--

INSERT INTO `textalanlari` (`txt_id`, `txt_1`, `txt_2`, `txt_3`, `txt_4`, `txt_5`, `txt_6`, `txt_7`, `txt_8`, `txt_9`, `txt_10`, `txt_11`, `txt_12`, `txt_13`, `txt_14`, `txt_15`) VALUES
(0, 'Hakkımda', '<b>Merhaba, Ben Yağız Uluocak!</b> </br> Lise eğitimimden bu yana web siteleri oluşturarak kendimi sürekli geliştirdim. Ayrıca Google Ads ve sosyal medya yönetimi gibi belirli alanlarda da temel seviyede kavradım </br>  Küçük yaşlardan itibaren kodlamaya ilgi duydum ve bu tutkum, Bordo Yazılım ve Başaran Medya Ajansı gibi şirketlerdeki staj ve iş deneyimlerimle şekillendi. Bordo Yazılım\'daki staj dönemimde Unity oyun motoruyla mobil ve masaüstü oyunlar geliştirirken, Başaran Medya Ajansı\'nda remote web developer olarak temel site çalışmaları yürüttüm. </br> Ayrıca freelance olarak çeşitli şirketlerin web siteleri üzerinde çalıştım. SEO uyumlu içerik girişleri ve Google reklamları oluşturma gibi alanlarda da kendimi geliştirerek sosyal medya hesaplarının yönetimini üstlendim. </br>  Staj ve çalışma sürecim boyunca Alva Grup\'ta, web programlama dışında sosyal medya yönetimi, Google Ads, video editörlüğü ve içerik yazarlığı gibi farklı alanlarda da deneyim kazandım. </br>Eğitimimi Ulus Mesleki ve Teknik Anadolu Lisesi\'nde tamamladıktan sonra Kırıkkale Üniversitesi\'nde Veritabanı Programcılığı ve Bilgisayar Programcılığı üzerine eğitim aldım.', 'Yetkinlikler', 'Uzmanlık alanım back-end web geliştirme. Veri yönetimi, işlevsellik ve güvenlik odaklı projelerdeki derin deneyimimle, işlevsel ve güvenilir çözümler sunuyorum. Kullanıcı deneyimini ön planda tutarak, teknolojiyle iş sürekliliği ve performansı bir araya getiriyorum.', 'Çalışmalarım', 'Bu portfolyoda, geçmişte çalıştığım şirketler bünyesinde gerçekleştirdiğim web projelerinden bazı örnekleri paylaşıyorum. Bu projeler, farklı endüstrilere ve ihtiyaçlara yönelik çeşitlilik gösteriyor. Her biri, kullanıcı odaklı tasarımlar ve işlevsellik üzerine odaklanarak, benzersiz ve etkileyici web deneyimleri oluşturmayı hedefliyor.', '', '', '', 'text 2', 'text 3', '', '', '', ''),
(1, 'asd', 'asddd', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetenek`
--

CREATE TABLE `yetenek` (
  `yetenek_id` int(11) NOT NULL,
  `yetenek_baslik` varchar(250) NOT NULL,
  `yetenek_icerik` text NOT NULL,
  `yetenek_icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yetenek`
--

INSERT INTO `yetenek` (`yetenek_id`, `yetenek_baslik`, `yetenek_icerik`, `yetenek_icon`) VALUES
(1, 'Html Css', 'HTML ve CSS\'de orta/ortaüstü seviyede yeteneklere sahibim. Bu becerilerimle web sayfalarını etkili bir şekilde yapılandırıp tasarlayarak, kullanıcı dostu ve estetik açıdan tatmin edici deneyimler oluşturuyorum', 'fa-brands fa-html5 fa-2xl'),
(2, 'Php', 'PHP\'de orta/ortaüstü seviyede yeteneklere sahibim. Veri yönetimi, kullanıcı etkileşimi ve dinamik içerik oluşturma konusundaki becerilerimle, işlevsel ve ölçeklenebilir web çözümleri geliştiriyorum. Kullanıcı deneyimini ön planda tutarak, işlevselliği estetikle birleştiriyorum.', 'fa-brands fa-php fa-2xl'),
(4, 'Google Ads', 'Google Ads konusunda reklam oluşturma, yayınlama ve optimizasyon gibi işlemleri başarıyla gerçekleştirebiliyorum. Hedef kitleye yönelik etkili reklam stratejileri oluşturarak, bütçe yönetimi ve analitik verileri kullanarak kampanyaları optimize ediyorum. İyi bir dönüşüm oranı ve etkili reklam performansı için sürekli olarak iyileştirme ve testler yapıyorum.', 'fa-brands fa-google fa-2xl'),
(5, 'Sosyal Medya Yönetimi', 'Sosyal Medya Yönetimi konusunda, görsel içerik oluşturma, Reels ve Story hazırlama, reklam verme ve etiket çalışmaları gibi işlemleri başarıyla gerçekleştirebiliyorum. İçerik stratejileri geliştirerek, hedef kitleye uygun ve etkili mesajlarla marka bilinirliğini artırıyorum. Analitik verileri kullanarak kampanya performansını izliyor, içerikleri optimize etme konusunda sürekli olarak geliştirme yapıyorum', 'fa-solid fa-hashtag fa-2xl');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `yonetici_id` int(11) NOT NULL,
  `yonetici_ad` varchar(100) NOT NULL,
  `yonetici_username` varchar(150) NOT NULL,
  `yonetici_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`yonetici_id`, `yonetici_ad`, `yonetici_username`, `yonetici_password`) VALUES
(14, 'Yağız', 'wodex', 'wodex.1881');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `deneyim`
--
ALTER TABLE `deneyim`
  ADD PRIMARY KEY (`deneyim_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`referans_id`);

--
-- Tablo için indeksler `textalanlari`
--
ALTER TABLE `textalanlari`
  ADD PRIMARY KEY (`txt_id`);

--
-- Tablo için indeksler `yetenek`
--
ALTER TABLE `yetenek`
  ADD PRIMARY KEY (`yetenek_id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`yonetici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `deneyim`
--
ALTER TABLE `deneyim`
  MODIFY `deneyim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `referans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yetenek`
--
ALTER TABLE `yetenek`
  MODIFY `yetenek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `yonetici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
