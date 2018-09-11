<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Control Dedicatii</h3>
  </div>
  <div class="panel-body">

  <div id="bxcontrolls">

  <center><h4><i class="fa fa-spinner fa-spin"></i> Se incarca elementul! </h4></center>

</div>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Dedicatii</h3>
  </div>
  <div class="panel-body">
    <center><div id="dedicatii"><h2><i class="fa fa-spinner fa-spin"></i> Se incarca dedicatiile! </h2></div></center>
  </div>
</div>

</div>
</div>

<div class="alert alert-warning avertismentdedicatii" style="
    position: fixed;
    bottom: -30px;
    width: 100%;
    left: 0px;
    text-align: center;
">
  <h4><b>Avertisment!</b></h4>
  <p><b>Dedicatiile sunt oprite!</b></p>
  <bax id="bax_avertizare_dedicatii"><style>.avertismentdedicatii { display:none; }</style></bax>
</div>

<?php if(!activare_ajax) { ?>
<meta http-equiv="refresh" content="<?php echo timp_refresh_ajax; ?>">
<?php } ?>
<?php
if(!defined('id_radio')) { $radio = null; } else { $radio = id_radio; }
if(!defined('cheie_secreta')) { $cheie_secreta = null; } else { $cheie_secreta = cheie_secreta; }
if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }

if(activare_ajax) {
$ded_js1_aj = '
// Reimprospatare nr dedicatii in titlu.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-nr_dedicatii/'.$utilizator.'-'.$parola.'/\', function(adauga_in_titlu_nr_dedicatii) {
document.title = ""+ adauga_in_titlu_nr_dedicatii +"Radio '.nume_radio.' - '. $titlu_pagina.'";
});

// > Inceput sir de functii ce se repeta la fiecare X secunde (se modifica din setari sistem).
window.setInterval(function(){
// Functia care verifica daca exista dedicatii noi
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-nr_dedicatii/'.$utilizator.'-'.$parola.'/\', function(obtine_nr_dedicatii_din_site_pt_js) {
var obtine_nr_dedicatii_din_site_pt_js1 = obtine_nr_dedicatii_din_site_pt_js.replace("(", "");
var obtine_nr_dedicatii_din_site_pt_js2 = obtine_nr_dedicatii_din_site_pt_js1.replace(")", "");
var obtine_nr_dedicatii_din_site_pt_js3 = obtine_nr_dedicatii_din_site_pt_js2.replace(" ", "");
if($.cookie("cookie_temporar_numar_dedicatii") == "undefined") {
var js_data_acum  = new Date();
js_data_acum .setTime(js_data_acum .getTime() + (60*5000));
var js_expires_cookie = "expires="+ js_data_acum .toUTCString();
document.cookie = "cookie_temporar_numar_dedicatii="+obtine_nr_dedicatii_din_site_pt_js3+";"+js_expires_cookie;
} else {
// Functia pentru reinprospatarea dedicatiilor in caz ca se sterge sau se adauga una noua.
if($.cookie("cookie_temporar_numar_dedicatii") != obtine_nr_dedicatii_din_site_pt_js3) {
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_elementul_cu_dedicatii) {
document.getElementById("dedicatii").innerHTML = ""+ reincarca_elementul_cu_dedicatii +"";
//var js_data_acum  = new Date();
//js_data_acum .setTime(js_data_acum .getTime() + (60*5000));
//var js_expires_cookie = "expires="+ js_data_acum .toUTCString();
//document.cookie = "cookie_temporar_numar_dedicatii="+obtine_nr_dedicatii_din_site_pt_js3+";"+js_expires_cookie;

var js_expires_cookie = "expires=Thu, 01 Jan 1970 00:00:01 GMT";
document.cookie = "cookie_temporar_numar_dedicatii="+obtine_nr_dedicatii_din_site_pt_js3+";"+js_expires_cookie;
});
// Functie care reinprospateaza nr dedicatiilor in titlu.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-nr_dedicatii/'.$utilizator.'-'.$parola.'/\', function(adauga_in_titlu_nr_dedicatii) {
document.title = ""+ adauga_in_titlu_nr_dedicatii +"Radio '.nume_radio.' - '. $titlu_pagina.'";
});
}
}
});

// Functia care reincarca automat butoanele de control al dedicatiilor in caz ca se pornesc sau se opresc dedicatiile ori preferintele.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-status_dedicatii_si_preferinte/'.$utilizator.'-'.$parola.'/\', function(obtine_status_dedicati_si_preferintei_din_site_pt_js) {
var obtine_status_dedicati_si_preferintei_din_site_pt_js1 = obtine_status_dedicati_si_preferintei_din_site_pt_js.replace("(", "");
var obtine_status_dedicati_si_preferintei_din_site_pt_js2 = obtine_status_dedicati_si_preferintei_din_site_pt_js1.replace(")", "");
var obtine_status_dedicati_si_preferintei_din_site_pt_js3 = obtine_status_dedicati_si_preferintei_din_site_pt_js2.replace(" ", "");
if($.cookie("cookie_temporar_status_dedicatii_si_preferinte") == "undefined") {
var js_data_acum  = new Date();
js_data_acum .setTime(js_data_acum .getTime() + (60*5000));
var js_expires_cookie = "expires="+ js_data_acum .toUTCString();
document.cookie = "cookie_temporar_status_dedicatii_si_preferinte="+obtine_status_dedicati_si_preferintei_din_site_pt_js3+";"+js_expires_cookie;
} else {
if($.cookie("cookie_temporar_status_dedicatii_si_preferinte") != obtine_status_dedicati_si_preferintei_din_site_pt_js3) {
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
//var js_data_acum  = new Date();
//js_data_acum .setTime(js_data_acum .getTime() + (60*5000));
//var js_expires_cookie = "expires="+ js_data_acum .toUTCString();
//document.cookie = "cookie_temporar_status_dedicatii_si_preferinte="+obtine_status_dedicati_si_preferintei_din_site_pt_js3+";"+js_expires_cookie;

var js_expires_cookie = "expires=Thu, 01 Jan 1970 00:00:01 GMT";
document.cookie = "cookie_temporar_status_dedicatii_si_preferinte="+obtine_status_dedicati_si_preferintei_din_site_pt_js3+";"+js_expires_cookie;
});
}
}
});

// Functia care deconecteaza utilizatorul in caz ca parola a fost schimbata, numele de utilizator schimbat ori contul sters.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-status_utilizator/'.$utilizator.'-'.$parola.'/\', function(datele_sunt_corecte) {
var status_curent = 1;
if(datele_sunt_corecte != status_curent) { alert("Se pare ca a aparut o problema suspecta! Pagina se va reincarca..."); location.reload(); }
});

// Functie care reinprospateaza statusul dedicatiilor (OFF = avertisment vizual).
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-status_dedicatii_on_sau_off/'.$utilizator.'-'.$parola.'/\', function(status_dedicatii_on_sau_off) {
document.getElementById("bax_avertizare_dedicatii").innerHTML = ""+ status_dedicatii_on_sau_off +"";
});

}, '. timp_refresh_ajax * 1000 .');
// > Sfarsit sir de functii ce se repeta la fiecare X secunde (se modifica din setari sistem).
';
} else {
$ded_js1_aj = '';
}
?>

<script>
<?php echo criptare_js('// Reimprospatare date dedicatii.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_elementul_cu_dedicatii) {
document.getElementById("dedicatii").innerHTML = ""+ reincarca_elementul_cu_dedicatii +"";
});

// Reimprospatare status dedicatii (OFF = avertisment vizual).
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-status_dedicatii_on_sau_off/'.$utilizator.'-'.$parola.'/\', function(status_dedicatii_on_sau_off) {
document.getElementById("bax_avertizare_dedicatii").innerHTML = ""+ status_dedicatii_on_sau_off +"";
});
// Reimprospatare butoane dedicatii.
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
});

'. $ded_js1_aj .'

// Functia pentru pornirea dedicatiilor.
function porneste_dedicatiile() {
            $.ajax({
                type: "POST",
                data: {
                    schimbare_status_dedicatii: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-porneste_dedicatiile/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "dedicatii_pornite") {
						window.setTimeout(function(){
						toastr[\'success\']("Dedicatiile au fost pornite!");
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
						document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}

// Functia pentru oprirea dedicatiilor.
function opreste_dedicatiile() {
            $.ajax({
                type: "POST",
                data: {
                    schimbare_status_dedicatii: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-opreste_dedicatiile/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "dedicatii_oprite") {
						window.setTimeout(function(){
						toastr[\'success\']("Dedicatiile au fost oprite!");
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
						document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}

// Functia pentru pornirea preferintelor muzicale.
function porneste_preferintele() {
            $.ajax({
                type: "POST",
                data: {
                    schimbare_status_preferinte: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-porneste_preferintele/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "preferinte_pornite") {
						window.setTimeout(function(){
						toastr[\'success\']("Preferintele muzicale au fost pornite!");
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
						document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}

// Functia pentru oprirea preferintelor muzicale.
function opreste_preferintele() {
            $.ajax({
                type: "POST",
                data: {
                    schimbare_status_preferinte: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-opreste_preferintele/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "preferinte_oprite") {
						window.setTimeout(function(){
						toastr[\'success\']("Preferintele muzicale au fost oprite!");
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-reincarca_butoanele_control_dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_butoanele_control_dedicatii) {
						document.getElementById("bxcontrolls").innerHTML = ""+ reincarca_butoanele_control_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}

function sterge_o_dedicatie(id_intern,id_afisat) {
            $.ajax({
                type: "POST",
                data: {
                    id_dedicatie: id_intern
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-sterge_o_dedicatie/'.$utilizator.'-'.$parola.'/",
                dataType: "json",
                success: function (result) {
					if (result.raspuns == "dedicatie_stearsa") {
						window.setTimeout(function(){
						toastr[\'success\']("Dedicatia specificata este in curs de stergere!" + " (ID#" + id_afisat + ")" );
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_elementul_cu_dedicatii) {
						document.getElementById("dedicatii").innerHTML = ""+ reincarca_elementul_cu_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](result.raspuns);
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}

function sterge_toate_dedicatiile() {
            $.ajax({
                type: "POST",
                data: {
                    stergere_dedicatii: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-sterge_toate_dedicatiile/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "dedicatii_sterse") {
						window.setTimeout(function(){
						toastr[\'success\']("Toate dedicatiile au fost sterse!" );
						$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_dedicatii/'.$radio.'-'.$cheie_secreta.'-dedicatii/'.$utilizator.'-'.$parola.'/\', function(reincarca_elementul_cu_dedicatii) {
						document.getElementById("dedicatii").innerHTML = ""+ reincarca_elementul_cu_dedicatii +"";
						});
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					toastr[\'info\'](\'Operatiune in curs de desfasurare...\');
                },
                error: function () {
					window.setTimeout(function(){
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}'); ?>
</script>

<script type="text/javascript">
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.4\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.4\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/www.baxandrei.ro\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.5"}};
!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56692,8205,9792,65039],[55357,56692,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<style type="text/css">
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1.3em !important;
	width: 1.3em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
