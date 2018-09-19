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

require_once('php/setari.php');
require_once('php/functii.php');

if(!empty($_GET['acp'])) {
  if(conectat()) {
    $timp_necesar_incarcare_pagina_cronometru = microtime();
    $timp_necesar_incarcare_pagina_cronometru = explode(" ", $timp_necesar_incarcare_pagina_cronometru);
    $timp_necesar_incarcare_pagina_cronometru = $timp_necesar_incarcare_pagina_cronometru[1] + $timp_necesar_incarcare_pagina_cronometru[0];
    $timp_necesar_incarcare_pagina_cronometru_inceput = $timp_necesar_incarcare_pagina_cronometru;
    require_once('sabloane/elemente_panou_administrare/header.php');
    if(obtine_nivel_acces() >= acces_minim_necesar) {
      require_once($pagina);
    } else {
      require_once("sabloane/erori_panou_administrare/nivel_acces_insuficient.php");
    }
    $timp_necesar_incarcare_pagina_cronometru = microtime();
    $timp_necesar_incarcare_pagina_cronometru = explode(" ", $timp_necesar_incarcare_pagina_cronometru);
    $timp_necesar_incarcare_pagina_cronometru = $timp_necesar_incarcare_pagina_cronometru[1] + $timp_necesar_incarcare_pagina_cronometru[0];
    $timp_necesar_incarcare_pagina_cronometru_sfarsit = $timp_necesar_incarcare_pagina_cronometru;
    $timp_necesar_incarcare_pagina_cronometru_total = ($timp_necesar_incarcare_pagina_cronometru_sfarsit - $timp_necesar_incarcare_pagina_cronometru_inceput);
    require_once('sabloane/elemente_panou_administrare/subsol.php');
  } else {
    require_once('sabloane/elemente_panou_administrare/header_neconectat.php');
    require_once($pagina);
    require_once('sabloane/elemente_panou_administrare/subsol_neconectat.php');
  }
} else {
  require_once($pagina);
}
