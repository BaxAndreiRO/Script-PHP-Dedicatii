<?php if(!empty(mesaj_fara_dj)) { ?>
<?php if(filter_var(strip_tags(mesaj_fara_dj), FILTER_VALIDATE_URL)) { ?>
<center><img src="<?php echo strip_tags(mesaj_fara_dj); ?>" class="img-responsive" /></center>
<?php } else { ?>
<div class="alert alert-warning">
<?php echo strip_tags(mesaj_fara_dj); ?>
</div>
<?php } ?>
<?php } else { ?>
<div class="alert alert-warning">
  <strong>Ne pare rau!</strong><br>Nu este nici un Dj in emisie, iar dedicatiile sunt oprite.<br> De asemenea este posibil ca Dj-ul sa nu preia dedicatii momentan.</div>
<?php } ?>
<br>
