<?php
/////////////////////////////////////////////////
//                                             //
//    Script Dedicatii PHP by BaxAndrei.Ro     //
//          https://www.baxandrei.ro           //
//                                             //
//      © Toate drepturile sunt rezervate      //
//                                             //
/////////////////////////////////////////////////

// Ientificator unic radio
define('id_radio','baxandrei');
// Acesta se obtine foarte simplu din adresa de pe Platforma de Dedicatii.
// De exemplu, avem adresa radioului: https://www.main.baxandrei.ro/dedicatii-v2/radio-baxandrei/
// ID-ul este cea ce urmeaza dupa /radio- pana la / adica baxandrei.

// Daca doriti sau nu sa se utilizeze AJAX
define('activare_ajax','1');

// Timp refresh AJAX in secunde
define('timp_refresh_ajax','1');

// Sterge fisierele mai vechi de X minute.
define('timp_sergere_cache','5');
// Se foloseste pentru fisierele cache.
