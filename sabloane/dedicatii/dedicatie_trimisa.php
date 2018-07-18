<div class="alert alert-success">
<?php if(!empty(mesaj_dedicatie_trimisa)) { ?>
<?php echo strip_tags(mesaj_dedicatie_trimisa, '<br>'); ?>
<br><br>
In <code style="border-radius:5px;"><code id="radiodedtimer">10</code> secunde</code> o se reincarce pagina!
<?php } else { ?>
<strong>Felicitari!</strong><br>Dedicatia ta a fost adaugata si o sa fie citita de un Dj in scurt timp.<br>Multumim pentru timpul acordat pentru a trimite o dedicatie.<br><br>In <code style="border-radius:5px;"><code id="radiodedtimer">10</code> secunde</code> o se reincarce pagina!
<?php } ?>
</div>
<script>
<?php echo criptare_js('function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(seconds);

        if (--timer < 0) {
            timer = 0;
        }
    }, 1000);
}

jQuery(function ($) {
    var cronometruinvers = 9,
        display = $(\'#radiodedtimer\');
    startTimer(cronometruinvers, display);
});'); ?>
</script>
<meta http-equiv="refresh" content="10">
<br>
