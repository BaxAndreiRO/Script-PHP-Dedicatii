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

// Cheie secreta
define('cheie_secreta','');
// ... in curand mai multe detalii.

// Adresa URL site
define('adresa_url_site','http://localhost:1998/Script-PHP-Dedicatii');
// Adresa URL catre site-ul unde este instalat scriptul.
// De exemplu: https://www.dedicatii.baxandrei.ro sau http://radio.baxandrei.ro/dedicatii
// Atentie: Adresa nu trebuie sa se termine cu "/" la sfarsit!

// Daca doriti sau nu sa se utilizeze AJAX
define('activare_ajax','1');
// Este utilizat pentru a incarca elementele fara a reincarca pagina.
// 0 = oprit, 1 = pornit

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
