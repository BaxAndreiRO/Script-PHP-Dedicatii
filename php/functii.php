<?php
/////////////////////////////////////////////////
//                                             //
//    Script Dedicatii PHP by BaxAndrei.Ro     //
//          https://www.baxandrei.ro           //
//                                             //
//                License: MIT.                //
//        Copyright (c) 2018 BaxAndrei.        //
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
// Prevenire o posibila eroare nedorita.
/////////////////////////////////////////////////
if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
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
// Functie pentru a sterge complet un folder.
/////////////////////////////////////////////////
function stergere_continut_folder($folder = null) {
if(file_exists($folder)) {
    foreach(glob("{$folder}/*") as $fisier)
    {
        if(is_dir($fisier)) {
            stergere_continut_folder($fisier);
        } else {
            unlink($fisier);
        }
    }
    @rmdir($folder);
	return true;
}
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
            stergere_continut_folder_mai_vechi_de($fisier, $minute);
            @rmdir($fisier);
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
function obtine_date_remote($cerere='nespecificat',$utilizator='nespecificat',$parola='nespecificat') {
  if(!defined('id_radio')) { $radio = null; } else { $radio = id_radio; }
  if(!defined('cheie_secreta')) { $cheie_secreta = null; } else { $cheie_secreta = cheie_secreta; }
  stergere_continut_folder_mai_vechi_de('cache', timp_sergere_cache);
  $cache_ignora = array('exista_radio','remote_web','status_dedicatii','status_preferinte', 'status_suspendare','mentenanta',
  'verifica_autentificare','obtine_nivel_acces','avatar_utilizator','obtine_dedicatii_totale','obtine_vizite_totale',
  'obtine_ultimele_5_autentificari','obtine_limite_radio','obtine_notificarile','obtine_istoric_versiuni',
  'obtine_intrebari_frecvente','validare_cheie_secreta', 'element_manager_financiar', 'obtine_obiecte_magazin',
  'obtine_formular_utilizator_nou');
  if(in_array($cerere, $cache_ignora)) {
    if(!empty($radio) && !empty($cheie_secreta) && !empty($cerere)) {
      return file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cheie_secreta-$cerere/$utilizator-$parola/");
    } else {
      return "Eroare! Verificati daca radioul, cheia secreta si cererea sunt specificate.";
    }
  } else {
    if(!file_exists('cache/'.$cerere)) {
      if(!empty($radio) && !empty($cerere)) {
        $date_cerute = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/$radio-$cheie_secreta-$cerere/$utilizator-$parola/");
        touch('cache/'.$cerere);
        file_put_contents('cache/'.$cerere, $date_cerute);
        return $date_cerute;
      } else {
        return "Eroare! Verificati daca radioul, cheia secreta si cererea sunt specificate.";
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
if(obtine_date_remote('mentenanta') == "in_lucru=1" &&  alerta_mentenanta == 1) {
  exit(require_once('sabloane/altele/mentenanta_activa.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul specificat exista.
/////////////////////////////////////////////////
if(obtine_date_remote('exista_radio') != 1) {
  exit(require_once('sabloane/erori/radio_inexistent.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca cheia specificata pentru radioul curent este sau nu valida.
/////////////////////////////////////////////////
if(obtine_date_remote('validare_cheie_secreta') != 1) {
  exit(require_once('sabloane/erori/cheie_secreta.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul specificat are sau nu remote_web activat.
/////////////////////////////////////////////////
if(obtine_date_remote('remote_web') != 1) {
  exit(require_once('sabloane/erori/remote_web.php'));
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca radioul este suspendat sau nu.
/////////////////////////////////////////////////
if(obtine_date_remote('status_suspendare') != "radio_activ") {
  exit(obtine_date_remote('status_suspendare'));
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
// Functia care sterge automat cache in cazul in care au fost actualizate setarile.
/////////////////////////////////////////////////
$cerere_verificare_modificare = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/".id_radio."-".cheie_secreta."-date_actualizate/nespecificat-nespecificat/");
if($cerere_verificare_modificare == 'datele_au_fost_actualizate_recent') {
  stergere_continut_folder('cache');
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Definire setari site.
/////////////////////////////////////////////////
define('versiune_fisiere_no_cache',obtine_date_remote('versiune_fisiere_no_cache'));
define('nume_radio',obtine_date_remote('nume_radio'));
define('status_dedicatii',obtine_date_remote('status_dedicatii'));
define('status_preferinte',obtine_date_remote('status_preferinte'));
define('tag_descriere',obtine_date_remote('tag_descriere'));
define('tag_cuvinte_cheie',obtine_date_remote('tag_cuvinte_cheie'));
define('tag_og_image',obtine_date_remote('tag_og_image'));
define('favicon',obtine_date_remote('favicon'));
define('tip_fundal',obtine_date_remote('tip_fundal'));
define('imagine_fundal',obtine_date_remote('imagine_fundal'));
define('fundal_transparent_iframe',obtine_date_remote('fundal_transparent_iframe'));
define('imagine_logo',obtine_date_remote('imagine_logo'));
define('fara_logo_iframe',obtine_date_remote('fara_logo_iframe'));
define('tip_acp_buton',obtine_date_remote('tip_acp_buton'));
define('ascunde_acp',obtine_date_remote('ascunde_acp'));
define('mesaj_fara_dj',obtine_date_remote('mesaj_fara_dj'));
define('mesaj_campuri_necesare',obtine_date_remote('mesaj_campuri_necesare'));
define('mesaj_acest_ip_a_atins_limita_de_dedicatii',obtine_date_remote('mesaj_acest_ip_a_atins_limita_de_dedicatii'));
define('limita_de_dedicatii_per_ip',obtine_date_remote('limita_de_dedicatii_per_ip'));
define('mesaj_eroare_necunoscuta',obtine_date_remote('mesaj_eroare_necunoscuta'));
define('mesaj_dedicatie_trimisa',obtine_date_remote('mesaj_dedicatie_trimisa'));
define('tip_banner_acp',obtine_date_remote('tip_banner_acp'));
define('adresa_radio',obtine_date_remote('adresa_radio'));
define('timp_refresh_ajax',obtine_date_remote('timp_refresh_ajax'));
define('elemente_per_pagina',obtine_date_remote('elemente_per_pagina'));
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca vizitatorul este banat.
/////////////////////////////////////////////////
function banat($ip = null) {
  if(!empty($ip)) {
    $status_ban = file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_ban/".id_radio."-".cheie_secreta."-$ip/");
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
  if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
  if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
  if(obtine_date_remote('verifica_autentificare', $utilizator, $parola) == 1) {
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_nivel_acces', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('avatar_utilizator', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care te redirectioneaza catre index daca esti conectat sau catre conectare daca nu esti conectat.
/////////////////////////////////////////////////
if(!empty($_GET['acp'])) {
  $pagini_fara_conectare = array('conectare','parola-pierduta');
  if(!in_array($_GET['pagina'], $pagini_fara_conectare) && !conectat()) {
    header('Location: '.adresa_url_site.'/admin/conectare/');
    setcookie('redirectionare_dupa_conectare', $_GET['pagina'], time() + (10), "/");
  } elseif(in_array($_GET['pagina'], $pagini_fara_conectare) && conectat()) {
    header('Location: '.adresa_url_site.'/admin/acasa/');
    if($_GET['pagina'] == 'conectare') {
      setcookie('deja_autentificat', '1', time() + (5), "/");
    } elseif($_GET['pagina'] == 'parola-pierduta') {
      setcookie('deja_autentificat2', '1', time() + (5), "/");
    }
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care preia versiunea curenta a scriptului din fisier.
/////////////////////////////////////////////////
function versiune_script() {
  if(file_exists('versiune_script')) {
    $versiune_script = preg_replace('/[^0-9,.]/','',file_get_contents('versiune_script'));
    $versiune_script = str_replace('....2018.','',$versiune_script);
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
  // trimite confirmare decoenctare
  file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web/".id_radio."-".cheie_secreta."-confirmare_deconectare/$utilizator-$parola/");
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_dedicatii_totale', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_vizite_totale', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_ultimele_5_autentificari', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_limite_radio', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return str_replace('xx_ADRESA_SITE_xx',adresa_url_site.'/admin/',obtine_date_remote('obtine_notificarile', $utilizator, $parola));
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_istoric_versiuni', $utilizator, $parola);
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
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_PAGINARE_xx',adresa_url_site.'/admin/noutati/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_noutati/".id_radio."-".cheie_secreta."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine intrebarile frecvente.
/////////////////////////////////////////////////
function obtine_intrebari_frecvente() {
  return obtine_date_remote('obtine_intrebari_frecvente');
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine lista cu IP-urile banate.
/////////////////////////////////////////////////
function obtine_banuri() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_PAGINARE_xx',adresa_url_site.'/admin/banip/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_banuri/".id_radio."-".cheie_secreta."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine istoricul conectarilor.
/////////////////////////////////////////////////
function obtine_istoric_conectari() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_PAGINARE_xx',adresa_url_site.'/admin/istoric-conectari/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_istoric_conectari/".id_radio."-".cheie_secreta."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Seteaza cookie ip si redirectionare daca este cazul.
/////////////////////////////////////////////////
if(!empty($_GET['pagina']) && !empty($_GET['acp']) && !empty($_GET['ip_ban'])) {
  if(conectat()) {
    if($_GET['pagina'] == 'banip' && obtine_nivel_acces() >= 1) {
      header("Location: ".adresa_url_site."/admin/banip/");
      setcookie('ip_ban', $_GET['ip_ban'], time() + (1), "/");
    }
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine elementul pentru managerul financiar.
/////////////////////////////////////////////////
function manager_financiar() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('element_manager_financiar', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine istoricul financiar.
/////////////////////////////////////////////////
function obtine_istoric_financiar() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_PAGINARE_xx',adresa_url_site.'/admin/situatie-financiara/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_istoric_financiar/".id_radio."-".cheie_secreta."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine obiectele din magazin.
/////////////////////////////////////////////////
function obtine_obiecte_magazin() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_obiecte_magazin', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine lista utilizatorilor.
/////////////////////////////////////////////////
function obtine_utilizatori() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    if(!empty($_GET['nr-pagina'])) { $pagina_ceruta = $_GET['nr-pagina']; } else { $pagina_ceruta = 1; }
    return str_replace('xx_ADRESA_SITE_PAGINARE_xx',adresa_url_site.'/admin/conturi-utilizatori/',file_get_contents("https://www.main.baxandrei.ro/dedicatii-v2/remote-web_utilizatori/".id_radio."-".cheie_secreta."/$utilizator-$parola/$pagina_ceruta"));
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care obtine formularul pentru adaugarea utilizatorilor noi.
/////////////////////////////////////////////////
function obtine_formular_utilizator_nou() {
  if(conectat()) {
    if(!empty($_COOKIE['dedicatii_utilizator'])) { $utilizator = $_COOKIE['dedicatii_utilizator']; } else { $utilizator = 'nespecificat'; }
    if(!empty($_COOKIE['dedicatii_parola'])) { $parola = $_COOKIE['dedicatii_parola']; } else { $parola = 'nespecificat'; }
    return obtine_date_remote('obtine_formular_utilizator_nou', $utilizator, $parola);
  } else {
    return '';
  }
}
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// Functia care verifica daca codul pentru resetarea parolei este valid.
/////////////////////////////////////////////////
function verificare_cod_resetare_parola($cod=null) {
  if(!empty($cod)) {
    $date_cerere = array(
        'cod_resetare' => $cod,
        'adresa_site' => adresa_url_site
    );
    $date_cerere_prelucrate = http_build_query($date_cerere, '', '&');
    $verifica_cod = "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_parola_pierduta/".id_radio."-".cheie_secreta."-verificare_cod_resetare/";
    $curl = curl_init($verifica_cod);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $date_cerere_prelucrate);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $raspuns_cerere_validare_cod_resetare = curl_exec($curl);
    curl_close($curl);
    return $raspuns_cerere_validare_cod_resetare;
  }
}
/////////////////////////////////////////////////
