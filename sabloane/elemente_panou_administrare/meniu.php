<?php
$nivel_actual_acces_user = obtine_nivel_acces();

if(tip_banner_acp == 1) {
$afisare_meniu = '<center><img src="'.imagine_logo.'" class="img-responsive" /></center>';
} else {
$afisare_meniu = '<center><strong>Radio '.nume_radio.'</strong></center>';
}
?>
<!-- Doar PC -->
<nav class="navbar navbar-default" id="bara-bax" STYLE="max-height:45px!important;">
  <div class="container-fluid">
    <div id="meniul_bx">
      <ul class="nav navbar-nav navbar-right">
		<li data-toggle="tooltip" data-placement="bottom" title="Accesare site radio" ><a target="_blank" href="<?php echo adresa_radio; ?>"><strong>&nbsp;<i class="fa fa-globe" aria-hidden="true"></i>&nbsp;</strong></a></li>
		<li data-toggle="tooltip" data-placement="bottom" title="Comutare la interfata utilizatorilor" ><a target="_blank" href="<?php echo adresa_url_site; ?>/"><strong>&nbsp;<i class="fa fa-external-link-square" aria-hidden="true"></i>&nbsp;</strong></a></li>
		<li data-toggle="tooltip" data-placement="bottom" title="Schimba avatarul"><a href="javascript:void(0);" data-toggle="modal" data-target="#schimba-avatar-modal"><strong>&nbsp;<i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;</strong></a></li>
		<li data-toggle="tooltip" data-placement="bottom" title="Schimba parola"><a href="javascript:void(0);" data-toggle="modal" data-target="#schimba-parola-modal"><strong>&nbsp;<i class="fa fa-key" aria-hidden="true"></i>&nbsp;</strong></a></li>
		<li data-toggle="tooltip" data-placement="bottom" title="Deconectare"><a href="javascript:void(0);" data-toggle="modal" data-target="#deconectare-modal"><strong>&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;</strong></a></li>
	  </ul>

    </div>
  </div>
</nav>

<div class="nav-side-menu">
    <div class="brand"><?php echo $afisare_meniu; ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li <?php if($_GET['pagina'] == 'acasa') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/acasa/';"<?php if($nivel_actual_acces_user < 0) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-home" aria-hidden="true"></i> Acasa
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'noutati') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/noutati/';"<?php if($nivel_actual_acces_user < 0) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-newspaper-o" aria-hidden="true"></i> Noutati
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'intrebari-frecvente') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/intrebari-frecvente/';"<?php if($nivel_actual_acces_user < 0) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-question-circle" aria-hidden="true"></i> Intrebari frecvente
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'dedicatii') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/dedicatii/';"<?php if($nivel_actual_acces_user < 1) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-list-alt" aria-hidden="true"></i> Dedicatii
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'banip') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/banip/';"<?php if($nivel_actual_acces_user < 1) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-ban" aria-hidden="true"></i> BanIP
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'istoric-conectari') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/istoric-conectari/';"<?php if($nivel_actual_acces_user < 2) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-sign-in" aria-hidden="true"></i> Istoric Conectari
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'coduri-si-unelte') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/coduri-si-unelte/';"<?php if($nivel_actual_acces_user < 2) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-wrench" aria-hidden="true"></i> Coduri si unelte
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'mesaje-personalizate') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/mesaje-personalizate/';"<?php if($nivel_actual_acces_user < 2) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-file-text-o" aria-hidden="true"></i> Mesaje Personalizate
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'setari-sistem') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/setari-sistem/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-cogs" aria-hidden="true"></i> Setari Sistem
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'setari-aspect') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/setari-aspect/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-object-group" aria-hidden="true"></i> Setari Aspect
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'css-personalizat') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/css-personalizat/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-file-text" aria-hidden="true"></i> CSS Personalizat
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'conturi-utilizatori') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/conturi-utilizatori/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-users" aria-hidden="true"></i> Conturi Utilizatori
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'situatie-financiara') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/situatie-financiara/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-university" aria-hidden="true"></i> Situatie financiara
                  </a>
                </li>

                <li <?php if($_GET['pagina'] == 'magazin') { echo " class='active'"; } ?> onclick="location.href = '<?php echo adresa_url_site; ?>/admin/magazin/';"<?php if($nivel_actual_acces_user < 3) { echo "style='opacity:0.4;'"; } ?>>
                  <a>
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Magazin
                  </a>
                </li>

				<!-- Doar telefon -->
				<li class="divider" id='buton_sr'></li><li class="divider" id='buton_sr'></li><li class="divider" id='buton_sr'></li><li class="divider" id='buton_sr'></li><li class="divider" id='buton_sr'></li><li class="divider" id='buton_sr'></li>
                 <li id='buton_sr' onclick="window.open('<?php echo adresa_radio; ?>','_blank');">
                  <a>
                  <i class="fa fa-globe" aria-hidden="true"></i> Site radio
                  </a>
                </li>

				<li id='buton_sr' onclick="window.open('<?php echo adresa_url_site; ?>/','_blank');">
                  <a>
                  <i class="fa fa-external-link-square" aria-hidden="true"></i> Interfata utilizatori
                  </a>
                </li>

				<li id='buton_sr' data-toggle="modal" data-target="#schimba-avatar-modal">
                  <a>
                  <i class="fa fa-file-image-o" aria-hidden="true"></i> Schimba Avatarul
                  </a>
                </li>

				<li id='buton_sr' data-toggle="modal" data-target="#schimba-parola-modal">
                  <a>
                  <i class="fa fa-key" aria-hidden="true"></i> Schimba Parola
                  </a>
                </li>

                 <li id='buton_sr' data-toggle="modal" data-target="#deconectare-modal">
                  <a>
                  <i class="fa fa-sign-out" aria-hidden="true"></i> Deconectare
                  </a>
                </li>
            </ul>
     </div>
</div>
