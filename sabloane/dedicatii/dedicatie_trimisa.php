<div class="alert alert-success">
<?php if(!empty(mesaj_dedicatie_trimisa)) { ?>
<?php echo strip_tags(mesaj_dedicatie_trimisa, '<br>'); ?>
<br><br>
In <code style="border-radius:5px;"><code id="id_cronometru">10</code> secunde</code> o se reincarce pagina!
<?php } else { ?>
<strong>Felicitari!</strong><br>Dedicatia ta a fost adaugata si o sa fie citita de un Dj in scurt timp.<br>Multumim pentru timpul acordat pentru a trimite o dedicatie.<br><br>In <code style="border-radius:5px;"><code id="id_cronometru">10</code> secunde</code> o se reincarce pagina!
<?php } ?>
</div>
<script>
<?php echo criptare_js('function PornireCronometru(durata, afisaj) {
    var cronometru = durata, minute, secunde;
    setInterval(function () {
        minute = parseInt(cronometru / 60, 10);
        secunde = parseInt(cronometru % 60, 10);

        minute = minute < 10 ? "0" + minute : minute;
        secunde = secunde < 10 ? "0" + secunde : secunde;

        afisaj.text(secunde);

        if (--cronometru < 0) {
            cronometru = 0;
        }
    }, 1000);
}

jQuery(function ($) {
    var cronometruinvers = 9,
        afisaj = $(\'#id_cronometru\');
    PornireCronometru(cronometruinvers, afisaj);
});'); ?>
</script>
<meta http-equiv="refresh" content="10">
<br>
