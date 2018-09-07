
<center><kbd><a style="text-decoration:none;" href="https://github.com/BaxAndreiRO/Script-PHP-Dedicatii" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a> Script de Dedicatii <?php if(!empty(versiune_script())) { echo "- Versiunea <a href='".adresa_url_site."/admin/istoric-versiuni-script/' target='_blank'>".versiune_script()."</a>"; } ?> - By <a href="https://www.baxandrei.ro" style="text-decoration:none;" target="_blank">BaxAndrei.Ro</a></kbd></center><br>
<center><kbd>Pagina a fost generata in <?php echo substr($timp_necesar_incarcare_pagina_cronometru_total,0,6); ?> secunde.</kbd></center><br>

	</div>
</div>

<!-- Schimba Parola -->
<form id="schimba_parola">
<div class="modal fade" id="schimba-parola-modal" tabindex="-1" role="dialog" aria-labelledby="schimba-parola-modal">
<div style="display: table;position: absolute;height: 100%;width: 100%;">
  <div style="display: table-cell;vertical-align: middle;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Schimba Parola</h4>
      </div>
      <div class="modal-footer">
      <div class="col-lg-12" style="text-align: left;">
	        <label style="text-align:left;">Parola Curenta:</label>
        <input type="password" required class="form-control" autocomplete="off" placeholder="Introduceti parola curenta" name="parola_veche" id="parola_veche">
      <br></div>
      <div class="col-lg-12" style="text-align: left;">
	        <label style="text-align:left;">Parola Noua:</label>
        <input type="password" required class="form-control" autocomplete="off" placeholder="Introduceti parola noua" name="parola_noua_1" id="parola_noua_1">
      <br></div>
      <div class="col-lg-12" style="text-align: left;">
	        <label style="text-align:left;">Parola Noua: <sup>(Repetare)</sup></label>
        <input type="password" required class="form-control" autocomplete="off" placeholder="Introdu din nou parola noua" name="parola_noua_2" id="parola_noua_2">
      <br></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="schimba_parola_anulare"> <i class="fa fa-times-circle" aria-hidden="true"></i> Anuleaza</button>
        <button type="submit" name="schimba_parola" id="trimite_schimbare_parola" value="schimba_parola" class="btn btn-success"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Schimba Parola</button>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
</form>

<!-- Schimba Avatar -->
<form id="schimbare_avatar">
<div class="modal fade" id="schimba-avatar-modal" tabindex="-1" role="dialog" aria-labelledby="schimba-avatar-modal">
<div style="display: table;position: absolute;height: 100%;width: 100%;">
  <div style="display: table-cell;vertical-align: middle;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Schimbare Avatar</h4>
      </div>
      <div class="modal-footer">
      <div class="col-lg-12" style="text-align: left;">
	        <label style="text-align:left;">Introdu adresa avatarului:</label>
        <input type="url" required class="form-control avatar-activ" autocomplete="off" placeholder="Introduceti adresa catre imaginea dorita pentru avatar" name="avatar" id="avatar" value="<?php echo obtine_avatar_utilizator(); ?>">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="schimba_avatar_anulare"> <i class="fa fa-times-circle" aria-hidden="true"></i> Anuleaza</button>
        <button type="submit" name="schimba_avatar" id="trimite_schimba_avatar" value="schimba_avatar" class="btn btn-success"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare Avatar</button>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
</form>

<!-- Deconectare -->
<div class="modal fade" id="deconectare-modal" tabindex="-1" role="dialog" aria-labelledby="deconectare-modal">
<div style="display: table;position: absolute;height: 100%;width: 100%;">
  <div style="display: table-cell;vertical-align: middle;">
    <div style="margin-left: auto;margin-right: auto; width:100%;padding: 100px 0px 100px 0px;background: #eeeeee; z-index:1000;">
      <h4><center><?php echo $_COOKIE['utilizator']; ?>, esti sigur ca doresti sa te deconectezi?</center></h4>
	  <br><br>
	  <center><form id="form_deconectare">
	  <button type="button" class="btn btn-default" data-dismiss="modal" id="deconectare_anulare"> <i class="fa fa-times-circle" aria-hidden="true"></i> Anuleaza</button>
	  <button type="submit" name="deconectare" id="trimite_cerere_deconectare" value="deconectare" class="btn btn-success"> <i class="fa fa-sign-out" aria-hidden="true"></i> Deconectare</button>
	  </form></center>
    </div>
  </div>
</div>
</div>

</body>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script>
<?php echo criptare_js('        $("#schimba_parola").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    parolanoua: md5($("#parola_noua_1").val()),
                    parolanouaconfirmare: md5($("#parola_noua_2").val()),
										nume: "'.$_COOKIE["utilizator"].'",
										parola: md5($("#parola_veche").val())
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_actualizare_parola/'.id_radio.'-'.cheie_secreta.'",
                dataType: "json",
                success: function (result) {
					if (result.raspuns == "parola_schimbata") {
						window.setTimeout(function(){
						$("#trimite_schimbare_parola").removeClass(\'btn-info\');
						$("#trimite_schimbare_parola").addClass(\'btn-success\');
						toastr[\'success\']("Datele introduse au fost corecte, iar parola a fost schimbata! Va vom deconecta din motive de securitate...");
                        $("#trimite_schimbare_parola").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> In curs de deconectare...\');
						window.setTimeout(function(){
                        window.location = "'.adresa_url_site.'/admin/acasa/";
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
                        $("#trimite_schimbare_parola").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Datele introduse sunt incorecte...\');
                        toastr[\'warning\'](result.raspuns);
					$("#trimite_schimbare_parola").removeClass(\'btn-info\');
					$("#trimite_schimbare_parola").addClass(\'btn-warning\');
							window.setTimeout(function(){
							$("#trimite_schimbare_parola").removeClass(\'btn-warning\');
							$("#trimite_schimbare_parola").addClass(\'btn-success\');
							$("#trimite_schimbare_parola").html(\' <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Schimba Parola\');
							$("#trimite_schimbare_parola").removeClass(\'disabled\');
							$(\'#parola_veche\').attr(\'readonly\', false);
							$(\'#parola_noua_1\').attr(\'readonly\', false);
							$(\'#parola_noua_2\').attr(\'readonly\', false);
							$("#schimba_parola_anulare").removeClass(\'disabled\');
							}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					$(\'#parola_veche\').attr(\'readonly\', true);
					$(\'#parola_noua_1\').attr(\'readonly\', true);
					$(\'#parola_noua_2\').attr(\'readonly\', true);
					$("#schimba_parola_anulare").addClass(\'disabled\');
                    $("#trimite_schimbare_parola").html(\' <i class="fa fa-cog fa-spin"></i> Schimbare parola in curs...\');
                    $("#trimite_schimbare_parola").addClass(\'disabled\');
					$("#trimite_schimbare_parola").removeClass(\'btn-success\');
					$("#trimite_schimbare_parola").addClass(\'btn-info\');
					toastr[\'info\']("Cererea ta de schimbare a parolei este in curs de procesare...");
                },
                error: function () {
					window.setTimeout(function(){
					$("#schimba_parola_anulare").removeClass(\'disabled\');
					$(\'#parola_veche\').attr(\'readonly\', true);
					$(\'#parola_noua_1\').attr(\'readonly\', true);
					$(\'#parola_noua_2\').attr(\'readonly\', true);
					$("#trimite_schimbare_parola").attr(\'disabled\', \' \');
					$("#trimite_schimbare_parola").removeClass(\'btn-info\');
					$("#trimite_schimbare_parola").addClass(\'btn-danger\');
                    $("#trimite_schimbare_parola").html(\' <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> A aparut o eroare necunoscuta...\');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
<script>
<?php echo criptare_js('        $("#form_deconectare").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    trimite_cerere_deconectare: $("#trimite_cerere_deconectare").val()
                },
                url: "'.adresa_url_site.'/admin/acasa&deconectare",
                dataType: "text",
                success: function (result) {
					if (result == "utilizator_deconectat") {
						window.setTimeout(function(){
						$("#trimite_cerere_deconectare").removeClass(\'btn-info\');
						$("#trimite_cerere_deconectare").addClass(\'btn-success\');
						toastr[\'success\']("Deconectarea a fost efecutata! In curs de deleogare...");
						$("#trimite_cerere_deconectare").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> In curs de delogare...\');
						window.setTimeout(function(){
						window.location = "'.adresa_url_site.'/admin/acasa/";
						}, 3010);
						}, 1000);
						} else {
						window.setTimeout(function(){
						$("#trimite_cerere_deconectare").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
					$("#trimite_cerere_deconectare").removeClass(\'btn-info\');
					$("#trimite_cerere_deconectare").addClass(\'btn-warning\');
							window.setTimeout(function(){
							$("#trimite_cerere_deconectare").removeClass(\'btn-warning\');
							$("#trimite_cerere_deconectare").addClass(\'btn-success\');
							$("#trimite_cerere_deconectare").html(\' <i class="fa fa-sign-out" aria-hidden="true"></i> Deconectare\');
							$("#trimite_cerere_deconectare").removeClass(\'disabled\');
							$("#deconectare_anulare").removeClass(\'disabled\');
							}, 3000);
						}, 1000);
						}
				},
                beforeSend: function () {
					$("#deconectare_anulare").addClass(\'disabled\');
						$("#trimite_cerere_deconectare").html(\' <i class="fa fa-cog fa-spin"></i> Deconectare in curs...\');
						$("#trimite_cerere_deconectare").addClass(\'disabled\');
					$("#trimite_cerere_deconectare").removeClass(\'btn-success\');
					$("#trimite_cerere_deconectare").addClass(\'btn-info\');
					toastr[\'info\']("Cererea ta de deconectare este in curs de procesare...");
						},
						error: function () {
					window.setTimeout(function(){
					$("#trimite_cerere_deconectare").removeClass(\'btn-info\');
					$("#trimite_cerere_deconectare").attr(\'disabled\', \' \');
					$("#deconectare_anulare").removeClass(\'disabled\');
					$("#trimite_cerere_deconectare").addClass(\'btn-danger\');
						$("#trimite_cerere_deconectare").html(\' <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> A aparut o eroare necunoscuta...\');
						toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
<script>
<?php echo criptare_js('
  $("#schimbare_avatar").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    avatar: $("#avatar").val(),
										nume: "'.$_COOKIE["utilizator"].'",
										parola: "'.$_COOKIE["parola"].'"
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_actualizare_avatar/'.id_radio.'-'.cheie_secreta.'",
                dataType: "text",
                success: function (result) {
					if (result == "avatar_actualizat") {
						window.setTimeout(function(){
						$("#trimite_schimba_avatar").removeClass(\'btn-info\');
						$("#trimite_schimba_avatar").addClass(\'btn-success\');
						toastr[\'success\']("Avatarul a fost actualizat! Pagina se va reincarca...");
                        $("#trimite_schimba_avatar").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Se reincarca pagina...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
                        $("#trimite_schimba_avatar").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
                        toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
                        $("#trimite_schimba_avatar").removeClass(\'btn-info\');
                        $("#trimite_schimba_avatar").addClass(\'btn-warning\');
							window.setTimeout(function(){
							$("#trimite_schimba_avatar").removeClass(\'btn-warning\');
							$("#trimite_schimba_avatar").addClass(\'btn-success\');
							$("#trimite_schimba_avatar").html(\' <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare Avatar\');
							$("#trimite_schimba_avatar").removeClass(\'disabled\');
							$("#schimba_avatar_anulare").removeClass(\'disabled\');
							$("#avatar").removeClass(\'disabled\');
							$(\'#avatar\').attr(\'readonly\', false);
							}, 3000);
						}, 1000);
                    }
				},
                beforeSend: function () {
					$("#schimba_avatar_anulare").addClass(\'disabled\');
					$(\'#avatar\').attr(\'readonly\', true);
                    $("#trimite_schimba_avatar").html(\' <i class="fa fa-cog fa-spin"></i> Actualizare avatar in curs...\');
                    $("#trimite_schimba_avatar").addClass(\'disabled\');
					$("#trimite_schimba_avatar").removeClass(\'btn-success\');
					$("#trimite_schimba_avatar").addClass(\'btn-info\');
					toastr[\'info\']("Cererea ta de actualizare a avatarului in curs de procesare...");
                },
                error: function () {
					window.setTimeout(function(){
					$("#trimite_schimba_avatar").removeClass(\'btn-info\');
					$("#schimba_avatar_anulare").removeClass(\'disabled\');
					$(\'#avatar\').attr(\'readonly\', true);
					$("#trimite_schimba_avatar").attr(\'disabled\', \' \');
					$("#trimite_schimba_avatar").addClass(\'btn-danger\');
                    $("#trimite_schimba_avatar").html(\' <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> A aparut o eroare necunoscuta...\');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>

</html>
