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
define('timp_sergere_cache','60');
// Se foloseste pentru fisierele cache.
// Daca sunteti sigur ca nu veti mai modifica setarile pe site puteti seta un numar mai mare.
// Daca au fost modificare recent setarile din platforma, iar aici nu apar modificarile, stergeti continulul folderului cache, mai putin fisierul .htaccess

// Doriti sa se afiseze un mesaj cand Platforma de Dedicatii este in lucru?
define('alerta_mentenanta','1');
// Puteti dezactiva aceasta optiune, dar este posibil sa apara erori.
// Lasand aceasta optiune activata, scriptul va intra automat in mentenanta cand se lucreaza la platforma, si va iesi cand platforma este deschisa iar.
// De fiecare data cand vom lucra la platforma, vom anunta pe Facebook cu cateva zile sau ore inainte.
