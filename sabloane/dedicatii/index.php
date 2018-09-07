<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" id="min-width" lang="ro" xml:lang="ro" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<title>Radio <?php echo nume_radio; ?> - Dedicatii LIVE - Dedicatiile sunt <?php if(status_dedicatii) { echo 'pornite'; } else { echo 'oprite'; } ?>.</title>
<meta charset="utf-8">
<meta name="description" content="<?php echo tag_descriere; ?>">
<meta name="keywords" content="<?php echo tag_cuvinte_cheie; ?>">
<meta property="og:image" content="<?php echo tag_og_image; ?>" />
<link rel="icon" href="<?php echo favicon; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://www.cdn.baxandrei.ro/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/bootstrap/css/lumen.css">
<link rel="stylesheet" href="https://www.main.baxandrei.ro/dedicatii-v2/public/css/baxandrei.ro.css?<?php echo versiune_fisiere_no_cache; ?>">
<link rel="stylesheet" href="https://www.main.baxandrei.ro/dedicatii-v2/css-personalizat/<?php echo id_radio; ?>.css">
<script src="https://www.main.baxandrei.ro/dedicatii-v2/public/js/baxandrei.ro.js?<?php echo versiune_fisiere_no_cache; ?>"></script>
<?php if(tip_fundal == 2) { ?><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
<script>jQuery(document).ready(function(){$.backstretch("<?php echo imagine_fundal; ?>");});</script>
<?php } ?>
</head>
<body<?php if(tip_fundal == 1) { ?> style="background: url(<?php echo imagine_fundal; ?>) repeat;"<?php } ?><?php if(fundal_transparent_iframe == 1) { ?> id="transparent"<?php } ?>>
<div class="container">
		<div class="row">
			<div class="col-lg-6 text-center" style="float: none; margin: 0 auto;">
<br>
<center><img src="<?php echo imagine_logo; ?>" class="img-responsive"<?php if(fara_logo_iframe == 1) { ?> id="transparent_logo"<?php } ?> /></center>
<br>
<br>

<?php
if(isset($_POST['pentru']) && isset($_POST['dela']) && isset($_POST['mesaj'])) {
  require_once('php/adauga_dedicatia.php');
} else {
  if(status_dedicatii) { require_once('sabloane/dedicatii/dedicatii_pornite.php'); } else { require_once('sabloane/dedicatii/dedicatii_oprite.php'); }
}
?>
			</div>
		</div>
</div>

<div id="link-admin"<?php if(tip_acp_buton == 2) { ?> style="opacity:1!important;"<?php } ?>>
<div class="btn-group-vertical">
    <a style="margin-bottom:6px;margin-right:6px;" href="<?php echo adresa_url_site; ?>/admin/" target="_blank" class="btn btn-default">Panou de Administrare</a>
</div>
</div>
<?php if(tip_fundal == 1 && fundal_transparent_iframe == 1) { ?><script>if (top != self) { document.getElementById('transparent').style.cssText = 'background:transparent!important;';}</script><?php } ?>
<?php if(tip_fundal == 2 && fundal_transparent_iframe == 1) { ?><script>if (top != self) { document.write("<style>.backstretch { display:none!important;}</style>"); }</script><?php } ?>
<?php if(ascunde_acp == 1) { ?><script>if (top != self) { document.write("<style>div#link-admin { display:none!important;}</style>"); }</script><?php } ?>
<?php if(fara_logo_iframe == 1) { ?><script>if (top != self) { document.getElementById('transparent_logo').style.cssText = 'display:none!important;';}</script><?php } ?>

<?php if(activare_ajax == 1 && !isset($_POST['pentru']) && !isset($_POST['dela']) && !isset($_POST['mesaj'])) { ?>
<?php if(status_dedicatii == 1) { ?>
<div class="modal fade" id="alerta-dedicatii-modal" tabindex="-1" role="dialog" aria-labelledby="alerta-dedicatii-modal">
<div style="display: table;position: absolute;height: 100%;width: 100%;">
  <div style="display: table-cell;vertical-align: middle;">
    <div style="margin-left: auto;margin-right: auto; width:100%;padding: 100px 0px 100px 0px;background: #eeeeee; z-index:1000;">
      <h4><center>Hey! Imi pare rau, dar se pare ca nu mai este nici un DJ in emisie! Te rugam sa te reintorci mai tarziu.</center></h4>
	  <br><br>
	  <center>
	  <button type="button" class="btn btn-primary" onclick="location.reload();"> <i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Reincarca pagina</button>
	  </center>
    </div>
  </div>
</div>
</div>
<script>
<?php echo criptare_js('if ($.fn.modal) {
window.setInterval(function(){
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web/'.id_radio.'-'.cheie_secreta.'-status_dedicatii/vizitator-vizitator/\', function(status_dedicatii) {
var status_dedicatii1 = status_dedicatii.replace("(", "");
var status_dedicatii2 = status_dedicatii1.replace(")", "");
var status_dedicatii3 = status_dedicatii2.replace(" ", "");
var status_acum = 1;
if(status_acum != status_dedicatii) {
$(\'#alerta-dedicatii-modal\').modal(\'show\');
} else {
$(\'#alerta-dedicatii-modal\').modal(\'hide\');
}
});
}, '.timp_refresh_ajax * 1000 .');
}'); ?>
</script>
<?php } else { ?>
<div class="modal fade" id="alerta-dedicatii-modal" tabindex="-1" role="dialog" aria-labelledby="alerta-dedicatii-modal">
<div style="display: table;position: absolute;height: 100%;width: 100%;">
  <div style="display: table-cell;vertical-align: middle;">
    <div style="margin-left: auto;margin-right: auto; width:100%;padding: 100px 0px 100px 0px;background: #eeeeee; z-index:1000;">
      <h4><center>Hey! Se pare ca un DJ a intrat in emisie si asteapta dedicatiile tale!</center></h4>
	  <br><br>
	  <center>
	  <button type="button" class="btn btn-primary" onclick="location.reload();"> <i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Reincarca pagina</button>
	  </center>
    </div>
  </div>
</div>
</div>
<script>
<?php echo criptare_js('if ($.fn.modal) {
window.setInterval(function(){
$.get(\'https://www.main.baxandrei.ro/dedicatii-v2/remote-web/'.id_radio.'-'.cheie_secreta.'-status_dedicatii/vizitator-vizitator/\', function(status_dedicatii) {
var status_dedicatii1 = status_dedicatii.replace("(", "");
var status_dedicatii2 = status_dedicatii1.replace(")", "");
var status_dedicatii3 = status_dedicatii2.replace(" ", "");
var status_acum = 0;
if(status_acum != status_dedicatii) {
$(\'#alerta-dedicatii-modal\').modal(\'show\');
} else {
$(\'#alerta-dedicatii-modal\').modal(\'hide\');
}
});
}, '.timp_refresh_ajax * 1000 .');
}'); ?>
</script>
<?php } ?>
<?php } ?>
</body>
</html>
