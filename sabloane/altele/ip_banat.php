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
<script src="https://cdn.baxandrei.ro/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="https://cdn.baxandrei.ro/bootstrap/css/lumen.css">
<link rel="stylesheet" href="https://main.baxandrei.ro/dedicatii-v2/public/css/baxandrei.ro.css?<?php echo versiune_fisiere_no_cache; ?>">
<link rel="stylesheet" href="https://main.baxandrei.ro/dedicatii-v2/css-personalizat/<?php echo id_radio; ?>.css">
<script src="https://main.baxandrei.ro/dedicatii-v2/public/js/baxandrei.ro.js?<?php echo versiune_fisiere_no_cache; ?>"></script>
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

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Se pare ca aceasta adresa IP nu are permisiunea de a naviga pe acest radio.</h3>
  </div>
  <div class="panel-body">
    <?php echo $mesaj_ban; ?>
	</div>
</div>

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

</body>
</html>
