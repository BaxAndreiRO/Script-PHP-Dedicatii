<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Editare setari aspect</h3>
  </div>
  <div class="panel-body">

<form id="actualizare_setari_aspect">

<div class="form-group">
	<label for="title"><b>Adresa logo:</b></label>
	<input autocomplete="off" type="url" class="form-control" id="imagine_logo" name="imagine_logo" placeholder="Introduceti adresa pentru imaginea ce se va utiliza drept logo pentru site" required="" value="<?php echo imagine_logo; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Modul de afisare in ACP a logo-ului:</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="tip_banner_acp" id="tip_banner_acp" required="">
	 <option value="<?php echo tip_banner_acp; ?>"><?php if(tip_banner_acp == 1) { echo "Doresc ca logo-ul in acp sa fie de tip imagine"; } elseif(tip_banner_acp == 2) { echo "Doresc ca logo-ul in acp sa fie de tip text"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Doresc ca logo-ul in acp sa fie de tip imagine</option>
	 <option value="2">Doresc ca logo-ul in acp sa fie de tip text</option>
	 <option disabled=""></option>
	</select>
</div>

<div class="form-group">
	<label for="title"><b>Adresa imagine fundal:</b></label>
	<input autocomplete="off" type="url" class="form-control" id="imagine_fundal" name="imagine_fundal" placeholder="Introduceti adresa pentru imaginea de fundal" required="" value="<?php echo imagine_fundal; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Tip imagine fundal:</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="tip_fundal" id="tip_fundal" required="">
	 <option value="<?php echo tip_fundal; ?>"><?php if(tip_fundal == 1) { echo "Fundal care se repeta la infinit"; } elseif(tip_fundal == 2) { echo "Fundal care se adjusteaza perfect pe ecran"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Fundal care se repeta la infinit</option>
	 <option value="2">Fundal care se adjusteaza perfect pe ecran</option>
	 <option disabled=""></option>
	</select>
</div>

<div class="form-group">
	<label for="title"><b>Adresa favicon:</b></label>
	<input autocomplete="off" type="url" class="form-control" id="favicon" name="favicon" placeholder="Introduceti adresa pentru imaginea ce se va utiliza drept favicon pentru site" required="" value="<?php echo favicon; ?>">
</div>


<div class="form-group">
	<label for="title"><b>Modul de afisare a butonului catre ACP:</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="tip_acp_buton" id="tip_acp_buton" required="">
	 <option value="<?php echo tip_acp_buton; ?>"><?php if(tip_acp_buton == 1) { echo "Doresc ca butonul catre ACP sa fie invizibil si sa apara cand este mouse-ul pe el in coltul din stanga jos"; } elseif(tip_acp_buton == 2) { echo "Doresc ca butonul catre ACP sa fie vizibil"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Doresc ca butonul catre ACP sa fie invizibil si sa apara cand este mouse-ul pe el in coltul din stanga jos</option>
	 <option value="2">Doresc ca butonul catre ACP sa fie vizibil</option>
	 <option disabled=""></option>
	</select>
</div>

<div class="form-group">
	<label for="title"><b>Imaginea de fundal transparenta (doar in iframe):</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="fundal_transparent_iframe" id="fundal_transparent_iframe" required="">
	 <option value="<?php echo fundal_transparent_iframe; ?>"><?php if(fundal_transparent_iframe == 1) { echo "Da, doresc fundal transparent daca site-ul este incarcat prin iframe"; } elseif(fundal_transparent_iframe == 2) { echo "Nu, nu doresc fundal transparent daca site-ul este incarcat prin iframe"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Da, doresc fundal transparent daca site-ul este incarcat prin iframe</option>
	 <option value="2">Nu, nu doresc fundal transparent daca site-ul este incarcat prin iframe</option>
	 <option disabled=""></option>
	</select>
</div>

<div class="form-group">
	<label for="title"><b>Logo transparent (doar in iframe):</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="fara_logo_iframe" id="fara_logo_iframe" required="">
	 <option value="<?php echo fara_logo_iframe; ?>"><?php if(fara_logo_iframe == 1) { echo "Da, doresc sa ascund logoul daca site-ul este incarcat prin iframe"; } elseif(fara_logo_iframe == 2) { echo "Nu, nu doresc sa ascund logoul daca site-ul este incarcat prin iframe"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Da, doresc sa ascund logoul daca site-ul este incarcat prin iframe</option>
	 <option value="2">Nu, nu doresc sa ascund logoul daca site-ul este incarcat prin iframe</option>
	 <option disabled=""></option>
	</select>
</div>

<div class="form-group">
	<label for="title"><b>Sterge butonul catre ACP (doar in iframe):</b></label>
	<select class="form-control show-tick selectpicker show-menu-arrow" name="ascunde_acp" id="ascunde_acp" required="">
	 <option value="<?php echo ascunde_acp; ?>"><?php if(ascunde_acp == 1) { echo "Da, doresc sa ascund butonul catre ACP daca site-ul este incarcat prin iframe"; } elseif(ascunde_acp == 2) { echo "Nu, nu doresc sa ascund butonul catre ACP daca site-ul este incarcat prin iframe"; } else { echo 'Optiune invalida'; }?> (optiunea curenta)</option>
	 <option disabled=""></option>
	 <option value="1">Da, doresc sa ascund butonul catre ACP daca site-ul este incarcat prin iframe</option>
	 <option value="2">Nu, nu doresc sa ascund butonul catre ACP daca site-ul este incarcat prin iframe</option>
	 <option disabled=""></option>
	</select>
</div>

<center>
<button style="margin-top:3px; margin-bottom:3px;" type="reset" onclick='toastr["info"]("Anulare modificari nesalvate in curs...");$("#resetare_modificari").addClass("disabled");$("#resetare_modificari").html(" <i class=\"fa fa-cog fa-spin\"></i> In curs de resetare...");window.setTimeout(function(){toastr["success"]("Modificarile nesalvate fost anulate! Se reincarca pagina...");window.setTimeout(function(){location.reload();}, 3010);}, 1000);' id="resetare_setari" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Resetare modificari curente</button>
<button style="margin-top:3px; margin-bottom:3px;" type="submit" id="actualizare_setari" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare</button>
</center>


</form>
  </div>
</div>

</div>
</div>

<script>
<?php echo criptare_js('        $("#actualizare_setari_aspect").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    imagine_fundal: $("#imagine_fundal").val(),
					tip_fundal: $("#tip_fundal").val(),
					imagine_logo: $("#imagine_logo").val(),
					tip_banner_acp: $("#tip_banner_acp").val(),
					favicon: $("#favicon").val(),
					tip_acp_buton: $("#tip_acp_buton").val(),
					fundal_transparent_iframe: $("#fundal_transparent_iframe").val(),
					fara_logo_iframe: $("#fara_logo_iframe").val(),
					ascunde_acp: $("#ascunde_acp").val()
                },
                url: "https://main.baxandrei.ro/dedicatii-v2/remote-web_actualizare_setari_aspect/'.id_radio.'-'.cheie_secreta.'/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "setari_aspect_actualizate") {
						window.setTimeout(function(){
						$("#actualizare_setari").removeClass(\'btn-primary\');
						$("#actualizare_setari").addClass(\'btn-success\');
						toastr[\'success\']("Setarile au fost actualizate!");
                        $("#actualizare_setari").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Se finalizeaza actualizara setarilor...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);
                    } else {
						window.setTimeout(function(){
						$("#actualizare_setari").removeClass(\'btn-primary\');
						$("#actualizare_setari").addClass(\'btn-warning\');
						$("#actualizare_setari").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
                        toastr[\'warning\']("Se pare ca avem o problema temporara! Va rugam sa reincercati din nou.");
						window.setTimeout(function(){
						$("#actualizare_setari").removeClass(\'btn-warning\');
						$("#actualizare_setari").addClass(\'btn-primary\');
                        $("#actualizare_setari").html(\'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare\');
                        $("#actualizare_setari").removeClass(\'disabled\');
						$("#resetare_setari").removeClass(\'disabled\');
						$(\'#imagine_fundal\').attr(\'readonly\', false);
						$(\'#tip_fundal\').attr(\'disabled\', false);
						$(\'#imagine_logo\').attr(\'readonly\', false);
						$(\'#tip_banner_acp\').attr(\'disabled\', false);
						$(\'#favicon\').attr(\'readonly\', false);
						$(\'#tip_acp_buton\').attr(\'disabled\', false);
						$(\'#fundal_transparent_iframe\').attr(\'disabled\', false);
						$(\'#fara_logo_iframe\').attr(\'disabled\', false);
						$(\'#ascunde_acp\').attr(\'disabled\', false);
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta de actualizare este in curs de procesare...");
                    $("#actualizare_setari").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i> Actualizare in curs...\');
                    $("#actualizare_setari").addClass(\'disabled\');
					$("#resetare_setari").addClass(\'disabled\');
                    $(\'#imagine_fundal\').attr(\'readonly\', true);
                    $(\'#tip_fundal\').attr(\'disabled\', true);
                    $(\'#imagine_logo\').attr(\'readonly\', true);
                    $(\'#tip_banner_acp\').attr(\'disabled\', true);
                    $(\'#favicon\').attr(\'readonly\', true);
                    $(\'#tip_acp_buton\').attr(\'disabled\', true);
                    $(\'#fundal_transparent_iframe\').attr(\'disabled\', true);
                    $(\'#fara_logo_iframe\').attr(\'disabled\', true);
					$(\'#ascunde_acp\').attr(\'disabled\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#actualizare_setari").removeClass(\'btn-primary\');
					$("#actualizare_setari").addClass(\'btn-danger\');
                    $("#actualizare_setari").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Momentan aceasta functie este indisponibila!\');
					$(\'#actualizare_setari\').attr(\'disabled\', \' \');
					$(\'#resetare_setari\').attr(\'disabled\', \' \');
					$(\'#parola\').attr(\'disabled\', \' \');
					$(\'#nume\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>

<style>
button.btn.dropdown-toggle.btn-default {
    background: white!important;
}
</style>
