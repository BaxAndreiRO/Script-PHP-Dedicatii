<?php
/////////////////////////////////////////////////
//                                             //
//    Script Dedicatii PHP by BaxAndrei.Ro     //
//          https://www.baxandrei.ro           //
//                                             //
//      © Toate drepturile sunt rezervate      //
//                                             //
/////////////////////////////////////////////////

require_once('php/setari.php');
require_once('php/functii.php');

if(!empty($_GET['acp'])) {
  if(conectat()) {
    require_once('sabloane/elemente_panou_administrare/header.php');
    if(obtine_nivel_acces() >= acces_minim_necesar) {
      require_once($pagina);
    } else {
      require_once("sabloane/erori_panou_administrare/nivel_acces_insuficient.php");
    }
    require_once('sabloane/elemente_panou_administrare/subsol.php');
  } else {
    require_once('sabloane/elemente_panou_administrare/header_neconectat.php');
    require_once($pagina);
    require_once('sabloane/elemente_panou_administrare/subsol_neconectat.php');
  }
} else {
  require_once($pagina);
}
