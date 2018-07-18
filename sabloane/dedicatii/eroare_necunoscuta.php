<div class="alert alert-warning">
<?php if(!empty(mesaj_eroare_necunoscuta)) { ?>
<?php echo strip_tags(mesaj_eroare_necunoscuta, '<br>'); ?>
<br><br>
In <code style="border-radius:5px;"><code id="radiodedtimer">10</code> secunde</code> o se reincarce pagina!
<?php } else { ?>
<strong>Ne pare rau!</strong><br>Se pare ca a intervenit o eroare neasteptata.<br>Va rugam sa reincercati, iar daca problema persista sa anuntati un membru staff!<br><br>In <code style="border-radius:5px;"><code id="radiodedtimer">10</code> secunde</code> o se reincarce pagina!
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
