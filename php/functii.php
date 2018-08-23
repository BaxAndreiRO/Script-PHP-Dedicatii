<?php
/////////////////////////////////////////////////
//                                             //
//    Script Dedicatii PHP by BaxAndrei.Ro     //
//          https://www.baxandrei.ro           //
//                                             //
//      © Toate drepturile sunt rezervate      //
//                                             //
/////////////////////////////////////////////////

// Atentie: Daca eliminati unele functii ce verifica anumite lucruri, o faceti degeaba.
// Acele functii sunt puse aici pentru a va avertiza din acest script ca aveti o problema.
// Chiar daca stergeti de aici functiile (spre ex: radio existent, status remote web, status suspendare sau altele), nu rezolvati nimic.
// Tot ceea ce s-ar putea sa reusiti sa faceti este sa fortati scriptul sa ruleze cu erori, asta rezultand la primirea de date irelevante.
// Spre exemplu: daca stergeti functia care verifica statusul remote web sau suspendare, scriptul trimite cereri catre platforma, dar va primi date eronate si scriptul va deveni inutil.

/////////////////////////////////////////////////
// Prevenire SQL injection prin _POST sau _GET.
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
// Sistem afisare pagini.
/////////////////////////////////////////////////
if(!empty($_GET['acp'])) {
  if(!empty($_GET['pagina'])) {
    if($_GET['pagina'] == 'acasa') {
      $pagina = "sabloane/panou_administrare/index.php";
    } else {
      if(file_exists("sabloane/panou_administrare/".$_GET['pagina'].".php")) {
        $pagina = "sabloane/panou_administrare/".$_GET['pagina'].".php";
      } else {
        $pagina = "sabloane/erori_panou_administrare/pagina_inexistenta.php";
      }
    }
  } else {
    $pagina = "sabloane/panou_administrare/index.php";
  }
} else {
  if(!empty($_GET['pagina'])) {
    if(file_exists("sabloane/dedicatii/".$_GET['pagina'].".php")) {
      $pagina = "sabloane/dedicatii/".$_GET['pagina'].".php";
    } else {
      $pagina = "sabloane/dedicatii/index.php";
    }
  } else {
    $pagina = "sabloane/dedicatii/index.php";
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Seteaza nivelul minim de acces pentru fiecare pagina.
/////////////////////////////////////////////////
if(!empty($_GET['pagina']) && !empty($_GET['acp'])) {
  if($_GET['pagina'] == "dedicatii") { define('acces_minim_necesar','1'); }
  if($_GET['pagina'] == "banip") { define('acces_minim_necesar','1'); }
  if($_GET['pagina'] == "istoric-conectari") { define('acces_minim_necesar','2'); }
  if($_GET['pagina'] == "mesaje-personalizate") { define('acces_minim_necesar','2'); }
  if($_GET['pagina'] == "coduri-si-unelte") { define('acces_minim_necesar','2'); }
  if($_GET['pagina'] == "setari-sistem") { define('acces_minim_necesar','3'); }
  if($_GET['pagina'] == "setari-aspect") { define('acces_minim_necesar','3'); }
  if($_GET['pagina'] == "css-personalizat") { define('acces_minim_necesar','3'); }
  if($_GET['pagina'] == "conturi-utilizatori") { define('acces_minim_necesar','3'); }
  if($_GET['pagina'] == "magazin") { define('acces_minim_necesar','3'); }
  if($_GET['pagina'] == "situatie-financiara") { define('acces_minim_necesar','3'); }
}
if(!defined('acces_minim_necesar')) { define('acces_minim_necesar','0'); }
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Seteaza titlul in functie de pagina solicitata.
/////////////////////////////////////////////////
if(!empty($_GET['pagina']) && !empty($_GET['acp'])) {
  if($_GET['pagina'] == "acasa") { $titlu_pagina = "Bun venit in Panoul de administrare."; }
  if($_GET['pagina'] == "conectare") { $titlu_pagina = "Va rugam sa va autentificati."; }
  if($_GET['pagina'] == "parola-pierduta") { $titlu_pagina = "Mi-am uitat parola."; }
  if($_GET['pagina'] == "dedicatii") { $titlu_pagina = "Lista Dedicatii"; }
  if($_GET['pagina'] == "banip") { $titlu_pagina = "BanIP"; }
  if($_GET['pagina'] == "istoric-conectari") { $titlu_pagina = "Istoric Conectari"; }
  if($_GET['pagina'] == "setari-sistem") { $titlu_pagina = "Setari Sistem"; }
  if($_GET['pagina'] == "setari-aspect") { $titlu_pagina = "Setari Aspect"; }
  if($_GET['pagina'] == "css-personalizat") { $titlu_pagina = "CSS Personalizat"; }
  if($_GET['pagina'] == "mesaje-personalizate") { $titlu_pagina = "Mesaje Personalizate"; }
  if($_GET['pagina'] == "conturi-utilizatori") { $titlu_pagina = "Conturi Utilizator"; }
  if($_GET['pagina'] == "coduri-si-unelte") { $titlu_pagina = "Coduri si Scripturi"; }
  if($_GET['pagina'] == "magazin") { $titlu_pagina = "Magazin"; }
  if($_GET['pagina'] == "noutati") { $titlu_pagina = "Noutati si actualizari"; }
  if($_GET['pagina'] == "intrebari-frecvente") { $titlu_pagina = "Intrebari frecvente"; }
  if($_GET['pagina'] == "situatie-financiara") { $titlu_pagina = "Situatie financiara"; }
  if($_GET['pagina'] == "istoric-versiuni-script") { $titlu_pagina = "Istoric versiuni script"; }
}
if(!isset($titlu_pagina)) { $titlu_pagina = "Pagina specificata nu exista!"; }
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Afiseaza alerta in caz ca nu este configurat bine id-ul radioului in setari.
/////////////////////////////////////////////////
if(empty(id_radio)) {
  exit(require_once('sabloane/erori/id_nespecificat.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functie pentru a sterge toate fisierele mai vechi de X secunde dintr-un folder.
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
// Functie pentru obtinere date din Platforma de Dedicatii.
/////////////////////////////////////////////////
function obtine_date_remote($radio='nespecificat',$cerere='nespecificat',$utilizator='nespecificat',$parola='nespecificat') {
  stergere_continut_folder_mai_vechi_de('cache', timp_sergere_cache);
  $cache_ignora = array('exista_radio','remote_web','status_dedicatii','status_preferinte', 'status_suspendare','mentenanta',
  'verifica_autentificare','obtine_nivel_acces','avatar_utilizator','obtine_dedicatii_totale','obtine_vizite_totale',
  'obtine_ultimele_5_autentificari','obtine_limite_radio','obtine_notificarile','obtine_istoric_versiuni',
  'obtine_intrebari_frecvente');
  if(in_array($cerere, $cache_ignora)) {
    if(!empty($radio) && !empty($cerere)) {
      return file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cerere/$utilizator-$parola/");
    } else {
      return "Eroare! Verificati daca radioul si cererea sunt specificate.";
    }
  } else {
    if(!file_exists('cache/'.$cerere)) {
      if(!empty($radio) && !empty($cerere)) {
        $date_cerute = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cerere/$utilizator-$parola/");
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
// Functia care afiseaza (daca este activat in setari) o pagina speciala cand Platforma de Dedicatii este in mentenanta.
/////////////////////////////////////////////////
if(obtine_date_remote(id_radio, 'mentenanta') == "in_lucru=1" &&  alerta_mentenanta == 1) {
  exit(require_once('sabloane/altele/mentenanta_activa.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul specificat exista.
/////////////////////////////////////////////////
if(obtine_date_remote(id_radio, 'exista_radio') != 1) {
  echo obtine_date_remote(id_radio, 'exista_radio');
  exit(require_once('sabloane/erori/radio_inexistent.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul specificat are sau nu remote_web activat.
/////////////////////////////////////////////////
if(obtine_date_remote(id_radio, 'remote_web') != 1) {
  echo obtine_date_remote(id_radio, 'exista_radio');
  exit(require_once('sabloane/erori/remote_web.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul este suspendat sau nu.
/////////////////////////////////////////////////
if(obtine_date_remote(id_radio, 'status_suspendare') != "radio_activ") {
  exit(obtine_date_remote(id_radio, 'status_suspendare'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia pentru criptarea javascript.
/////////////////////////////////////////////////
function criptare_js($cod_js=null) {
  require_once('resurse-php/php-packer/Packer.php');
  $packer = new Tholu\Packer\Packer($cod_js, 'Normal', true, false, true);
  return "// BaxAndrei.Ro Security V1 \r\n".str_replace("\n","",$packer->pack())."\n";
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Definire variabile site.
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
define('mesaj_campuri_necesare',obtine_date_remote(id_radio, 'mesaj_campuri_necesare'));
define('mesaj_acest_ip_a_atins_limita_de_dedicatii',obtine_date_remote(id_radio, 'mesaj_acest_ip_a_atins_limita_de_dedicatii'));
define('limita_de_dedicatii_per_ip',obtine_date_remote(id_radio, 'limita_de_dedicatii_per_ip'));
define('mesaj_eroare_necunoscuta',obtine_date_remote(id_radio, 'mesaj_eroare_necunoscuta'));
define('mesaj_dedicatie_trimisa',obtine_date_remote(id_radio, 'mesaj_dedicatie_trimisa'));
define('tip_banner_acp',obtine_date_remote(id_radio, 'tip_banner_acp'));
define('adresa_radio',obtine_date_remote(id_radio, 'adresa_radio'));
define('timp_refresh_ajax',obtine_date_remote(id_radio, 'timp_refresh_ajax'));
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca vizitatorul este banat.
/////////////////////////////////////////////////
function banat($ip = null) {
  if(!empty($ip)) {
    $status_ban = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_ban/".id_radio."-$ip/");
    if($status_ban != "utilizator_nebanat" && empty($_GET['acp'])) {
      $mesaj_ban = $status_ban;
      exit(require_once('sabloane/altele/ip_banat.php'));
    }
  }
}
if(empty($_GET['acp'])) { banat($_SERVER['REMOTE_ADDR']); }
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia ce obtine adresa curenta.
/////////////////////////////////////////////////
function adresa_curenta() {
	if($_SERVER['SERVER_PORT'] == 443) {
	return "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	} else {
	return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia ce verifica daca utilizatorul este conectat sau nu.
/////////////////////////////////////////////////
function conectat() {
  if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
  if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
  if(obtine_date_remote(id_radio, 'verifica_autentificare', $utilizator, $parola) == 1) {
    return true;
  } else {
    return false;
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine gradul utilizatorului.
/////////////////////////////////////////////////
function obtine_nivel_acces() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_nivel_acces', $utilizator, $parola);
  } else {
    return '0';
  }
}
/////////////////////////////////////////////////


/////////////////////////////////////////////////
// Functia care obtine avatarul utilizatorului.
/////////////////////////////////////////////////
function obtine_avatar_utilizator() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'avatar_utilizator', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care te redirectioneaza catre index daca esti conectat sau catre conectare daca nu esti conectat.
/////////////////////////////////////////////////
if(!empty($_GET['acp'])) {
  $pagini_fara_conectare = array('conectare');
  if(!in_array($_GET['pagina'], $pagini_fara_conectare) && !conectat()) {
    header('Location: '.adresa_url_site.'/admin/conectare/');
    setcookie('redirectionare_dupa_conectare', $_GET['pagina'], time() + (10), "/");
  } elseif(in_array($_GET['pagina'], $pagini_fara_conectare) && conectat()) {
    header('Location: '.adresa_url_site.'/admin/acasa/');
    setcookie('deja_autentificat', '1', time() + (5), "/");
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care preia versiunea curenta a scriptului din fisier.
/////////////////////////////////////////////////
function versiune_script() {
  if(file_exists('versiune_script')) {
    $versiune_script = preg_replace('/[^0-9,.]/','',file_get_contents('versiune_script'));
    $versiune_script = str_replace('...,,.','',$versiune_script);
    return $versiune_script;
  } else {
    return false;
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Funcita pentru deconectare.
/////////////////////////////////////////////////
if(!empty($_POST['trimite_cerere_deconectare'])) {
  if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
exit('utilizator_deconectat');
}
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine numarul total de dedicatii din ultimele 24H.
/////////////////////////////////////////////////
function obtine_dedicatii_totale() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_dedicatii_totale', $utilizator, $parola);
  } else {
    return '0';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine numarul total de vizitatori din ultimele 24H.
/////////////////////////////////////////////////
function obtine_vizite_totale() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_vizite_totale', $utilizator, $parola);
  } else {
    return '0';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine numele nivelului de acces din codul de acces.
/////////////////////////////////////////////////
function nivel_acces() {
  switch (obtine_nivel_acces()) {
    case 1:
        $nivel_acces_user = "Dj";
        break;
    case 2:
        $nivel_acces_user = "Admin";
        break;
    case 3:
        $nivel_acces_user = "Operator";
        break;
  }
  if(empty($nivel_acces_user)) { return "Vizitator"; } else { return $nivel_acces_user; }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine ultimele autentificari in baza de date (maxim ultimele 5).
/////////////////////////////////////////////////
function obtine_ultimele_5_autentificari() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_ultimele_5_autentificari', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine limitele curente ale radioului (minim nivel acces 3 setat din platforma).
/////////////////////////////////////////////////
function obtine_limite_radio() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_limite_radio', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine notificarile necitite.
/////////////////////////////////////////////////
function obtine_notificarile() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_notificarile', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine istoricul versiunilor.
/////////////////////////////////////////////////
function obtine_istoric_versiuni() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote(id_radio, 'obtine_istoric_versiuni', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine noutatile.
/////////////////////////////////////////////////
function obtine_noutatile() {
  if(conectat()) {
    if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_xx',adresa_url_site.'/admin/noutati/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_noutati/".id_radio."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine intrebarile frecvente.
/////////////////////////////////////////////////
function obtine_intrebari_frecvente() {
  return obtine_date_remote(id_radio, 'obtine_intrebari_frecvente');
}
/////////////////////////////////////////////////
