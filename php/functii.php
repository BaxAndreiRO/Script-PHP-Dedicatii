<?php
/////////////////////////////////////////////////
//                                             //
//    Script Dedicatii PHP by BaxAndrei.Ro     //
//          https://www.baxandrei.ro           //
//                                             //
//      © Toate drepturile sunt rezervate      //
//                                             //
/////////////////////////////////////////////////

/////////////////////////////////////////////////
foreach ($_POST as $cheie => $valoare) {
  $valoare = str_replace('"', "&#x22;", $valoare);
  $valoare = str_replace("'", "&#x27;", $valoare);
  $_POST[$cheie] = $valoare;
}
foreach ($_GET as $cheie => $valoare) {
  $valoare = str_replace('"', "&#x22;", $valoare);
  $valoare = str_replace("'", "&#x27;", $valoare);
  $_GET[$cheie] = $valoare;
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
if(!empty($_GET['acp'])) {
  if(!empty($_GET['pagina'])) {
    if(file_exists("sabloane/acp/".$_GET['pagina'])) {
      $pagina = "sabloane/acp/".$_GET['pagina'];
    } else {
      $pagina = "sabloane/acp/index.php";
    }
  } else {
    $pagina = "sabloane/acp/index.php";
  }
} else {
  if(!empty($_GET['pagina'])) {
    if(file_exists("sabloane/dedicatii/".$_GET['pagina'])) {
      $pagina = "sabloane/dedicatii/".$_GET['pagina'];
    } else {
      $pagina = "sabloane/dedicatii/index.php";
    }
  } else {
    $pagina = "sabloane/dedicatii/index.php";
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
if(empty(id_radio)) {
  exit(require_once('sabloane/erori/id_nespecificat.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
function stergere_continut_folder_mai_vechi_de($folder = null, $minute = null) {
  $secunde = $minute*60;
  if(file_exists($folder)) {
    foreach(glob("{$folder}/*") as $fisier) {
        if(is_dir($fisier)) {
            stergere_continut_folder($fisier);
        } else {
          if(file_exists($fisier)) {
            if (time() - filemtime($fisier) >= $secunde) {
              @unlink($fisier);
            }
          }
        }
    }
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
function obtine_date_remote($radio='nespecificat',$cerere='nespecificat',$utilizator='nespecificat',$parola='nespecificat') {
  stergere_continut_folder_mai_vechi_de('cache', timp_sergere_cache);
  $cache_ignora = array('exista_radio','remote_web','status_dedicatii','status_preferinte');
  if(in_array($cerere, $cache_ignora)) {
    if(!empty($radio) && !empty($cerere)) {
      return file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cerere/$utilizator-$parola");
    } else {
      return "Eroare! Verificati daca radioul si cererea sunt specificate.";
    }
  } else {
    if(!file_exists('cache/'.$cerere)) {
      if(!empty($radio) && !empty($cerere)) {
        $date_cerute = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cerere/$utilizator-$parola");
        touch('cache/'.$cerere);
        file_put_contents('cache/'.$cerere, $date_cerute);
        return $date_cerute;
      } else {
        return "Eroare! Verificati daca radioul si cererea sunt specificate.";
      }
    } else {
      return file_get_contents('cache/'.$cerere);
    }
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
if(obtine_date_remote(id_radio, 'exista_radio') != 1) {
  echo obtine_date_remote(id_radio, 'exista_radio');
  exit(require_once('sabloane/erori/radio_inexistent.php'));
}
if(obtine_date_remote(id_radio, 'remote_web') != 1) {
  echo obtine_date_remote(id_radio, 'exista_radio');
  exit(require_once('sabloane/erori/remote_web.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
function criptare_js($cod_js=null) {
  require_once('criptator_js.php');
  $packer = new Tholu\Packer\Packer($cod_js, 'Normal', true, false, true);
  return "// BaxAndrei.Ro Security V1 \r\n".str_replace("\n","",$packer->pack())."\n";
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
define('versiune_fisiere_no_cache',obtine_date_remote(id_radio, 'versiune_fisiere_no_cache'));
define('nume_radio',obtine_date_remote(id_radio, 'nume_radio'));
define('status_dedicatii',obtine_date_remote(id_radio, 'status_dedicatii'));
define('status_preferinte',obtine_date_remote(id_radio, 'status_preferinte'));
define('tag_descriere',obtine_date_remote(id_radio, 'tag_descriere'));
define('tag_cuvinte_cheie',obtine_date_remote(id_radio, 'tag_cuvinte_cheie'));
define('tag_og_image',obtine_date_remote(id_radio, 'tag_og_image'));
define('favicon',obtine_date_remote(id_radio, 'favicon'));
define('tip_fundal',obtine_date_remote(id_radio, 'tip_fundal'));
define('imagine_fundal',obtine_date_remote(id_radio, 'imagine_fundal'));
define('fundal_transparent_iframe',obtine_date_remote(id_radio, 'fundal_transparent_iframe'));
define('imagine_logo',obtine_date_remote(id_radio, 'imagine_logo'));
define('fara_logo_iframe',obtine_date_remote(id_radio, 'fara_logo_iframe'));
define('tip_acp_buton',obtine_date_remote(id_radio, 'tip_acp_buton'));
define('ascunde_acp',obtine_date_remote(id_radio, 'ascunde_acp'));
define('mesaj_fara_dj',obtine_date_remote(id_radio, 'mesaj_fara_dj'));


/////////////////////////////////////////////////

/////////////////////////////////////////////////
function adresa_curenta() {
	if($_SERVER['SERVER_PORT'] == 443) {
	return "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	} else {
	return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
}
/////////////////////////////////////////////////
