<div class="col-lg-8 text-center" style="float: none; margin: 0 auto;">

<form class="form-horizontal text-center" name="formular_conectare" id="formular_conectare">

  <fieldset>
    <legend id="legenda_conectare" style="color:white">Autentificare DJ</legend>

    <div class="form-group">
        <input type="text" required class="form-control" id="nume" name="nume" placeholder="Nume utilizator">
    </div>
    <div class="form-group">
        <input type="password" required class="form-control" id="parola" name="parola" placeholder="Parola utilizator">
    </div>
    <div class="form-group">
        <button style="margin-top:3px; margin-bottom:3px;" type="submit" name="trimite_login" id="trimite_login" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Autentificare</button>
		<br>
		<a style="margin-top:3px; margin-bottom:3px;" id="resetare_parola" href="parola-pierduta" class="btn btn-default"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;Parola pierduta</a>
    </div>
  </fieldset>
</form>
</div>

<br>

<script>
<?php

echo criptare_js('
            $("#formular_conectare").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    nume: $("#nume").val(),
                    parola: md5($("#parola").val())
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_conectare/'.id_radio.'/",
                dataType: "json",
                success: function (result) {
					if (result.date_corecte == "da") {
						window.setTimeout(function(){
						$("#trimite_login").removeClass(\'btn-primary\');
						$("#trimite_login").addClass(\'btn-success\');
						toastr[\'success\']("Datele sunt corecte! Autentificare in curs!");
            $("#trimite_login").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>  Va redirectionam imediat...\');
            var js_data_acum  = new Date();
            js_data_acum .setTime(js_data_acum .getTime() + (86400000));
            var js_expires_cookie = "expires="+ js_data_acum .toUTCString();
            document.cookie = "utilizator="+result.nume_db+";"+js_expires_cookie+";path=/";
            document.cookie = "parola="+md5($("#parola").val())+";"+js_expires_cookie+";path=/";
            window.setTimeout(function(){
            window.location.href = "acasa";
            }, 3010);
            }, 1000);
                    } else {
						window.setTimeout(function(){
						$("#trimite_login").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Date incorecte...\');
						$("#trimite_login").removeClass(\'btn-primary\');
						$("#trimite_login").addClass(\'btn-warning\');
                        toastr[\'warning\']("Parola introdusa sau numele de utilizator sunt incorecte. Sunteti sigur ca acestea sunt datele contului sau ca exista contul?");
						window.setTimeout(function(){
						$("#trimite_login").removeClass(\'btn-warning\');
						$("#trimite_login").addClass(\'btn-primary\');
                        $("#trimite_login").removeClass(\'disabled\');
                        $(\'#nume\').attr(\'readonly\', false);
                        $(\'#parola\').attr(\'readonly\', false);
						$("#trimite_login").html(\'<i class="fa fa-sign-in" aria-hidden="true"></i>  Autentificare\');
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta este in curs de procesare! Se verifica datele introduse...");
                    $("#trimite_login").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i>  Verificam datele introduse...\');
                    $("#trimite_login").addClass(\'disabled\');
                    $(\'#parola\').attr(\'readonly\', true);
                    $(\'#nume\').attr(\'readonly\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#trimite_login").removeClass(\'btn-primary\');
					$("#trimite_login").addClass(\'btn-danger\');
                    $("#trimite_login").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan autentificare este indisponibila!\');
					$(\'#trimite_login\').attr(\'disabled\', \' \');
					$(\'#parola\').attr(\'disabled\', \' \');
					$(\'#nume\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });
        '); ?>
</script>
