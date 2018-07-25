<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" id="min-width" lang="ro" xml:lang="ro" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<title>Radio <?php echo nume_radio; ?> - <?php echo $titlu_pagina; ?></title>
<meta charset="utf-8">
<meta name="description" content="<?php echo tag_descriere; ?>">
<meta name="keywords" content="<?php echo tag_cuvinte_cheie; ?>">
<meta property="og:image" content="<?php echo tag_og_image; ?>" />
<link rel="icon" href="<?php echo favicon; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.main.baxandrei.ro/dedicatii-v2/public/css/meniu.css">
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/bootstrap/css/yeti.css">
<link rel="stylesheet" href="https://www.main.baxandrei.ro/dedicatii-v2/public/css/baxandrei.ro.css?<?php echo versiune_fisiere_no_cache; ?>">
<link rel="stylesheet" href="https://www.main.baxandrei.ro/dedicatii-v2/css-personalizat/<?php echo id_radio; ?>.css">
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/toastr/toastr.min.css">
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css">
<link rel="stylesheet" href="https://www.cdn.baxandrei.ro/bootstrap-select/css/bootstrap-select.min.css">
<script src="https://www.cdn.baxandrei.ro/toastr/toastr.min.js"></script>
<script src="https://www.cdn.baxandrei.ro/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="https://www.cdn.baxandrei.ro/bootstrap/js/bootstrap.js"></script>
<script src="https://www.cdn.baxandrei.ro/javascript-md5/md5.min.js"></script>
<script src="https://www.cdn.baxandrei.ro/js-base64/base64.min.js"></script>
<script src="https://www.cdn.baxandrei.ro/jquery-cookie/jquery.cookie.js"></script>
<script src="https://www.main.baxandrei.ro/dedicatii-v2/public/js/baxandrei.ro.js?<?php echo versiune_fisiere_no_cache; ?>"></script>
<script src="https://www.cdn.baxandrei.ro/chart.js/Chart.bundle.js"></script>
<script>toastr.options = {"closeButton": true,"debug": false,"newestOnTop": true,"progressBar": true,"positionClass": "toast-top-right","preventDuplicates": true,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "3000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"}</script>
<?php if(tip_fundal == 2) { ?><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
<script>jQuery(document).ready(function(){$.backstretch("<?php echo imagine_fundal; ?>");});</script>
<?php } ?>
</head>
<body id="pagina_<?php echo $_GET['pagina']; ?>"<?php if(tip_fundal == 1) { ?> style="background: url(<?php echo imagine_fundal; ?>) repeat;"<?php } ?>>

<?php require_once('sabloane/elemente_panou_administrare/meniu.php'); ?>

<div id="container" class="pagina_<?php echo $_GET['pagina']; ?>">
	<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
