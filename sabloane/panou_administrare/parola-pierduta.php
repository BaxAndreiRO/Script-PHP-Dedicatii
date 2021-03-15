<?php if(empty($_GET['cod_resetare'])) { ?>
<div class="col-lg-8 text-center" style="float: none; margin: 0 auto;">

<form class="form-horizontal text-center" name="formular_resetare_parola" id="formular_resetare_parola">

  <fieldset>
    <legend style="color:white">Parola Pierduta</legend>

    <div class="form-group">
        <input type="email" autocomplete="off" required class="form-control" id="email_cont" name="email_cont" placeholder="Adresa mail cont pierdut">
    </div>
    <div class="form-group">
        <input type="text" autocomplete="off" required class="form-control" id="nume_cont" name="nume_cont" placeholder="Nume utilizator cont pierdut">
    </div>
    <div class="form-group">
        <button style="margin-top:3px; margin-bottom:3px;" type="submit" name="trimite_cerere_resetare" id="trimite_cerere_resetare" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Trimite cerere resetare</button>
		<br>
		<a id="spre_autentificare" style="margin-top:3px; margin-bottom:3px;" href="<?php echo adresa_url_site; ?>/admin/conectare/" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Autentificare</a>
   </div>
  </fieldset>
</form>
</div>
<bax id="totul-ok" style="display:none">
<div class="alert alert-info"><strong>Felicitari!<br></strong> Un mail de confirmare a fost trmimis pe adresa de mail (daca nu il primiti, va rugam sa verificati si SPAM-ul!). Adresa de confirmare este valida maxim 5 minute!</div>
<a id="spre_autentificare" style="margin-top:3px; margin-bottom:3px;" href="<?php echo adresa_url_site; ?>/admin/conectare/" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Autentificare</a>
<br>
</bax>
<br>

<script>
<?php echo criptare_js('var css1 = { display : \'none\' };
var css2 = { display : \'block\' };
        $("#formular_resetare_parola").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    email_cont: $("#email_cont").val(),
                    nume_cont: $("#nume_cont").val(),
                    adresa_site: Base64.encode("'.adresa_url_site.'")
                },
                url: "https://main.baxandrei.ro/dedicatii-v2/remote-web_parola_pierduta/'.id_radio.'-'.cheie_secreta.'-trimitere_cerere_resetare/",
                dataType: "json",
                success: function (result) {
					if (result.raspuns == "totul_ok") {
						window.setTimeout(function(){
						$("#trimite_cerere_resetare").removeClass(\'btn-primary\');
						$("#trimite_cerere_resetare").addClass(\'btn-success\');
						toastr[\'success\']("Datele sunt corecte! Un mail de confirmare a fost trimis.");
                        $("#trimite_cerere_resetare").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>  Procesare...\');
						window.setTimeout(function(){
						$("#formular_resetare_parola").css(css1);
						$("#totul-ok").css(css2);
						}, 1000);
						}, 100);
                    } else {
						window.setTimeout(function(){
						$("#trimite_cerere_resetare").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Date incorecte...\');
						$("#trimite_cerere_resetare").removeClass(\'btn-primary\');
						$("#trimite_cerere_resetare").addClass(\'btn-warning\');
                        toastr[\'warning\']("Ne pare rau, nu exista nici un cont cu datele specificate!");
						window.setTimeout(function(){
						$("#trimite_cerere_resetare").removeClass(\'btn-warning\');
						$("#trimite_cerere_resetare").addClass(\'btn-primary\');
                        $("#trimite_cerere_resetare").removeClass(\'disabled\');
                        $(\'#email_cont\').attr(\'readonly\', false);
                        $(\'#nume_cont\').attr(\'readonly\', false);
						$("#trimite_cerere_resetare").html(\'<i class="fa fa-paper-plane" aria-hidden="true"></i>  Trimite cerere resetare\');
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta este in curs de procesare! Se verifica datele introduse...");
                    $("#trimite_cerere_resetare").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i>  Verificam datele introduse...\');
                    $("#trimite_cerere_resetare").addClass(\'disabled\');
                    $(\'#nume_cont\').attr(\'readonly\', true);
                    $(\'#email_cont\').attr(\'readonly\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#trimite_cerere_resetare").removeClass(\'btn-primary\');
					$("#trimite_cerere_resetare").addClass(\'btn-danger\');
                    $("#trimite_cerere_resetare").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan functia solicitata este indisponibila!\');
					$(\'#trimite_cerere_resetare\').attr(\'disabled\', \' \');
					$(\'#nume_cont\').attr(\'disabled\', \' \');
					$(\'#email_cont\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
<?php } else { ?>
<?php if(verificare_cod_resetare_parola($_GET['cod_resetare']) == 'valid') { ?>
<div class="alert alert-info"><strong>Felicitari!<br></strong> Codul introdus este valid! Va vom trimite in cel mai scurt timp posibil noua parola pe adresa de mail a contului specificat.</div>
<a id="spre_autentificare" style="margin-top:3px; margin-bottom:3px;" href="<?php echo adresa_url_site; ?>/admin/conectare/" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Autentificare</a>
<?php } else { ?>
<div class="alert alert-danger"><strong>Upss!<br></strong> Se pare ca ati introdus un cod invalid sau care a exprirat!</div>
<a id="spre_autentificare" style="margin-top:3px; margin-bottom:3px;" href="<?php echo adresa_url_site; ?>/admin/conectare/" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Autentificare</a>
<br>
<?php } ?>
<?php }
