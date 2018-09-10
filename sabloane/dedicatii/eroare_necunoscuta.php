<div class="alert alert-warning">
<?php if(!empty(mesaj_eroare_necunoscuta)) { ?>
<?php echo strip_tags(mesaj_eroare_necunoscuta, '<br>'); ?>
<br><br>
In <code style="border-radius:5px;"><code id="id_cronometru">10</code> secunde</code> o se reincarce pagina!
<?php } else { ?>
<strong>Ne pare rau!</strong><br>Se pare ca a intervenit o eroare neasteptata.<br>Va rugam sa reincercati, iar daca problema persista sa anuntati un membru staff!<br><br>In <code style="border-radius:5px;"><code id="id_cronometru">10</code> secunde</code> o se reincarce pagina!
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
