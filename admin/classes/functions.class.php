<?php

class veriGetir extends Db
{
    public function veriGetir($sayfa)
    {
        $query = "SELECT * FROM " .$sayfa ;
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function veriIdGetir($tablo = "", $tablo_id="",$id)
    {
        $query = "SELECT * FROM ".$tablo." WHERE ".$tablo_id."=:".$tablo_id;
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':'.$tablo_id, $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function yoneticiSil($yonetici_id)
    {
        $query = "DELETE FROM yonetici WHERE yonetici_id=:yonetici_id";
        $stmt =$this->connect()->prepare($query);
        $kontrol = $stmt->execute(['yonetici_id' => $yonetici_id]);
    }
    public function deneyimSil($deneyim_id)
    {
        $query = "DELETE FROM deneyim WHERE deneyim_id=:deneyim_id";
        $stmt =$this->connect()->prepare($query);
        $kontrol = $stmt->execute(['deneyim_id' => $deneyim_id]);
    }
    public function yetenekSil($yetenek_id)
    {
        $query = "DELETE FROM yetenek WHERE yetenek_id=:yetenek_id";
        $stmt =$this->connect()->prepare($query);
        $kontrol = $stmt->execute(['yetenek_id' => $yetenek_id]);
    }



}
class yonetici extends Db
{
    public function yoneticiEkle($yonetici_ad, $yonetici_username, $yonetici_password)
    {
        $query = "INSERT INTO yonetici(yonetici_ad, yonetici_username, yonetici_password) VALUES(:yonetici_ad, :yonetici_username, :yonetici_password)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'yonetici_ad' => $yonetici_ad,
            'yonetici_username' => $yonetici_username,
            'yonetici_password' => $yonetici_password
        ]);
    }

    public function yoneticiDuzenle($yonetici_id, $yonetici_ad, $yonetici_username, $yonetici_password)
    {
        $query = "UPDATE yonetici SET yonetici_ad=:yonetici_ad, yonetici_username=:yonetici_username, yonetici_password=:yonetici_password WHERE yonetici_id=:yonetici_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
        'yonetici_id' => $yonetici_id,
        'yonetici_ad' => $yonetici_ad,
        'yonetici_username' => $yonetici_username,
        'yonetici_password' => $yonetici_password
        ]);
    }
    public function login($yonetici_username, $yonetici_password)
    {
        $query = "SELECT * FROM yonetici WHERE yonetici_username=:yonetici_username AND yonetici_password=:yonetici_password";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            'yonetici_username' => $yonetici_username,
            'yonetici_password' => $yonetici_password
        ]);
        $result = $stmt->fetch();

        if ($result) {
            // Kullanıcı adı daha önce kullanılmış
            return true;
        } else {
            // Kullanıcı adı kullanılabilir
            return false;
        }
    }
    
}
class referans extends Db
{
    public function referansEkle($referans_baslik, $referans_resim, $referans_url)
    {
        $query = "INSERT INTO referans(referans_baslik, referans_resim, referans_url) VALUES(:referans_baslik, :referans_resim, :referans_url)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'referans_baslik' => $referans_baslik,
            'referans_resim' => $referans_resim,
            'referans_url' => $referans_url
        ]);
    }
    public function referansResimyYukle(array $file)
    {
        if(isset($file))
        {
            $dest_path="../images/referans/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function referansDuzenle($referans_id, $referans_baslik, $referans_resim, $referans_url)
    {
        $resimadi = null;

        if(isset($_FILES['referans_resim'])&& $_FILES['referans_resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES['referans_resim']['name'];
            $hedefKlasor = '../images/referans/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['referans_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu!";
            }
        }

        $query = "UPDATE referans SET referans_baslik=:referans_baslik";

        if($resimadi)
        {
            $query .=", referans_resim=:referans_resim";
        }

        $query .= ", referans_url=:referans_url WHERE referans_id=:referans_id";
        $stmt =$this->connect()->prepare($query);

        $params = [
            'referans_id'=> $referans_id,
            'referans_baslik' => $referans_baslik,
            'referans_url' => $referans_url
        ];
        if($resimadi)
        {
            $params['referans_resim'] = $resimadi;
        }

      return $stmt->execute($params);
    }
    public function referansSil($referans_id)
    {
        $query = "DELETE FROM referans WHERE referans_id=:referans_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['referans_id' => $referans_id]);

        if($kontrol)
        {
            header("location:referans.php?referansSil=ok");
        }
        else
        {
            header("location:referans.php?referansSil=no");
        }
    }
}
class Deneyim extends Db
{
    public function deneyimEkle($deneyim_baslik, $deneyim_icerik, $deneyim_sirket)
    {
        $query = "INSERT INTO deneyim(deneyim_baslik, deneyim_icerik, deneyim_sirket) VALUES(:deneyim_baslik, :deneyim_icerik, :deneyim_sirket)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'deneyim_baslik' => $deneyim_baslik,
            'deneyim_icerik' => $deneyim_icerik,
            'deneyim_sirket' => $deneyim_sirket
        ]);
    }
    public function deneyimDuzenle($deneyim_id, $deneyim_baslik, $deneyim_icerik, $deneyim_sirket)
    {
        $query = "UPDATE deneyim SET deneyim_baslik=:deneyim_baslik, deneyim_icerik=:deneyim_icerik, deneyim_sirket=:deneyim_sirket WHERE deneyim_id=:deneyim_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
        'deneyim_id' => $deneyim_id,
        'deneyim_baslik' => $deneyim_baslik,
        'deneyim_icerik' => $deneyim_icerik,
        'deneyim_sirket' => $deneyim_sirket
        ]);
    }

}
class Yetenek extends Db
{
    public function yetenekEkle($yetenek_baslik, $yetenek_icerik, $yetenek_icon)
    {
        $query = "INSERT INTO yetenek(yetenek_baslik, yetenek_icerik, yetenek_icon) VALUES(:yetenek_baslik, :yetenek_icerik, :yetenek_icon)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'yetenek_baslik' => $yetenek_baslik,
            'yetenek_icerik' => $yetenek_icerik,
            'yetenek_icon' => $yetenek_icon
        ]);
    }
    public function yetenekDuzenle($yetenek_id, $yetenek_baslik, $yetenek_icerik, $yetenek_icon)
    {
        $query = "UPDATE yetenek SET yetenek_baslik=:yetenek_baslik, yetenek_icerik=:yetenek_icerik, yetenek_icon=:yetenek_icon WHERE yetenek_id=:yetenek_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
        'yetenek_id' => $yetenek_id,
        'yetenek_baslik' => $yetenek_baslik,
        'yetenek_icerik' => $yetenek_icerik,
        'yetenek_icon' => $yetenek_icon
        ]);
    }
}
class Text extends Db
{
    public function textDuzenle($txt_id, $txt_1, $txt_2, $txt_3, $txt_4, $txt_5, $txt_6, $txt_7, $txt_8, $txt_9, $txt_10, $txt_11, $txt_12, $txt_13, $txt_14, $txt_15)
    {
        $query = "UPDATE textalanlari SET txt_1=:txt_1, txt_2=:txt_2, txt_3=:txt_3, txt_4=:txt_4, txt_5=:txt_5, txt_6=:txt_6, txt_7=:txt_7, txt_8=:txt_8, txt_9=:txt_9, txt_10=:txt_10, txt_11=:txt_11, txt_12=:txt_12, txt_13=:txt_13, txt_14=:txt_14, txt_15=:txt_15 WHERE txt_id=:txt_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'txt_id' => $txt_id,
            'txt_1' => $txt_1,
            'txt_2' => $txt_2,
            'txt_3' => $txt_3,
            'txt_4' => $txt_4,
            'txt_5' => $txt_5,
            'txt_6' => $txt_6,
            'txt_7' => $txt_7,
            'txt_8' => $txt_8,
            'txt_9' => $txt_9,
            'txt_10' => $txt_10,
            'txt_11' => $txt_11,
            'txt_12' => $txt_12,
            'txt_13' => $txt_13,
            'txt_14' => $txt_14,
            'txt_15' => $txt_15
        ]);
    }
    public function textget()
    {
        $query = "SELECT * FROM textalanlari WHERE txt_id = 0";
        $stmt =$this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
class Ayar extends Db
{
    public function ayarGetir()
    {
        $query = "SELECT * FROM ayar WHERE ayar_id = 1";
        $stmt =$this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function genelAyarDuzenle($ayar_id, $ayar_isim, $ayar_resim, $ayar_meslek, $ayar_mail, $ayar_tel, $ayar_adres)
    {

        $resimadi = null;
        if(isset($_FILES['ayar_resim'])&& $_FILES['ayar_resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES['ayar_resim']['name'];
            $hedefKlasor = '../images/ayar/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['ayar_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu!";
            }
        }
        $query = "UPDATE ayar SET ayar_isim=:ayar_isim";
        if($resimadi)
        {
            $query .=", ayar_resim=:ayar_resim";
        }
        $query.=", ayar_meslek=:ayar_meslek, ayar_mail=:ayar_mail, ayar_tel=:ayar_tel, ayar_adres=:ayar_adres WHERE ayar_id=1";
        $stmt = $this->connect()->prepare($query);

        $params = [
            'ayar_isim' => $ayar_isim,
            'ayar_meslek' => $ayar_meslek,
            'ayar_mail' => $ayar_mail,
            'ayar_tel' => $ayar_tel,
            'ayar_adres' => $ayar_adres         
        ];
        if($resimadi)
        {
            $params['ayar_resim'] = $resimadi;
        }
        return $stmt->execute($params);
    }
    public function sosyalAyarDuzenle($ayar_id, $ayar_linkedin, $ayar_instagram, $ayar_github)
    {
        $query = "UPDATE ayar SET ayar_linkedin=:ayar_linkedin, ayar_instagram=:ayar_instagram, ayar_github=:ayar_github WHERE ayar_id=1";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'ayar_linkedin' => $ayar_linkedin,
            'ayar_instagram' => $ayar_instagram,
            'ayar_github' => $ayar_github
        ]);
    }
    
}
class Menu extends Db
{
    public function menuDuzenle($menu_id, $menu_ad, $menu_url)
    {
        $query = "UPDATE menu SET menu_ad=:menu_ad, menu_url=:menu_url WHERE menu_id=:menu_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'menu_id' => $menu_id,
            'menu_ad' => $menu_ad,
            'menu_url' => $menu_url
        ]);
    }
}

?>