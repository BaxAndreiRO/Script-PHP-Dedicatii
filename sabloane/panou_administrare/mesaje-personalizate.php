<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Editare mesaje personalizate</h3>
  </div>
  <div class="panel-body">

<div class="alert alert-info">
  Daca doriti sa dezactivati un mesaj, va rugam sa lasati casuta acelui mesaj libera, iar sistemul va dezactiva automat afisarea mesajului respectiv!
</div>

<form id="actualizare_mesaje_personalizate">


<div class="form-group">
	<label for="title"><b>Mesaj afisat cand nu e nici un Dj online: <a data-toggle="tooltip" data-placement="right" title="Daca doriti, aici puteti introduce o adresa URL catre o imagine care doriti sa fie afisata in locul textului normal.">(?)</a></b></label>
	<input autocomplete="off" type="text" class="form-control" id="mesaj_fara_dj" name="mesaj_fara_dj" placeholder="Introduceti mesajul pe care doriti sa il vada un vizitator cand nu este nici un DJ in emisie" value="<?php echo mesaj_fara_dj; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Mesaj afisat cand dedicatia a fost trimisa:</b></label>
	<input autocomplete="off" type="text" class="form-control" id="mesaj_dedicatie_trimisa" name="mesaj_dedicatie_trimisa" placeholder="Introduceti mesajul pe care doriti sa il vada un vizitator cand dedicatia lui a fost trimisa" value="<?php echo mesaj_dedicatie_trimisa; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Mesaj afisat cand nu au fost completate toate campurile:</b></label>
	<input autocomplete="off" type="text" class="form-control" id="mesaj_campuri_necesare" name="mesaj_campuri_necesare" placeholder="Introduceti mesajul pe care doriti sa il vada un vizitator nu completeaza toate campurile necesare inainte de a trimite dedicatia" value="<?php echo mesaj_campuri_necesare; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Mesaj afisat cand un utilizator a atins limita de dedicatii per IP:</b></label>
	<input autocomplete="off" type="text" class="form-control" id="mesaj_acest_ip_a_atins_limita_de_dedicatii" name="mesaj_acest_ip_a_atins_limita_de_dedicatii" placeholder="Introduceti mesajul pe care doriti sa il vada un vizitator cand depaseste limita maxima de dedicatii permise de pe o adresa IP" value="<?php echo mesaj_acest_ip_a_atins_limita_de_dedicatii; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Mesaj afisat cand apare o eroare necunoscuta:</b></label>
	<input autocomplete="off" type="text" class="form-control" id="mesaj_eroare_necunoscuta" name="mesaj_eroare_necunoscuta" placeholder="Introduceti mesajul pe care doriti sa il vada un vizitator atunci cand apare o eroare necunoscuta" value="<?php echo mesaj_eroare_necunoscuta; ?>">
</div>

<center>
<button style="margin-top:3px; margin-bottom:3px;" type="reset" onclick='toastr["success"]("Modificarile nesalvate fost anulate!");' id="resetare_mesaje" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Resetare modificari curente</button>
<button style="margin-top:3px; margin-bottom:3px;" type="submit" id="salvare_mesaje" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare</button>
</center>

</form>

  </div>
</div>

</div>
</div>


<script>
<?php echo criptare_js('$("#actualizare_mesaje_personalizate").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    mesaj_fara_dj: $("#mesaj_fara_dj").val(),
					mesaj_dedicatie_trimisa: $("#mesaj_dedicatie_trimisa").val(),
					mesaj_campuri_necesare: $("#mesaj_campuri_necesare").val(),
					mesaj_acest_ip_a_atins_limita_de_dedicatii: $("#mesaj_acest_ip_a_atins_limita_de_dedicatii").val(),
					mesaj_eroare_necunoscuta: $("#mesaj_eroare_necunoscuta").val()
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_actualizare_mesaje_personalizate/'.id_radio.'-'.cheie_secreta.'/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "mesaje_actualizate") {
						window.setTimeout(function(){
						$("#salvare_mesaje").removeClass(\'btn-primary\');
						$("#salvare_mesaje").addClass(\'btn-success\');
						toastr[\'success\']("Mesajele au fost actualizate!");
                        $("#salvare_mesaje").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Se finalizeaza actualizara mesajelor...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);
                    } else {
						window.setTimeout(function(){
						$("#salvare_mesaje").removeClass(\'btn-primary\');
						$("#salvare_mesaje").addClass(\'btn-warning\');
						$("#salvare_mesaje").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						toastr[\'warning\']("Se pare ca avem o problema temporara! Va rugam sa reincercati din nou.");
						window.setTimeout(function(){
						$("#salvare_mesaje").removeClass(\'btn-warning\');
						$("#salvare_mesaje").addClass(\'btn-primary\');
                        $("#salvare_mesaje").html(\'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare\');
                        $("#salvare_mesaje").removeClass(\'disabled\');
						$("#resetare_mesaje").removeClass(\'disabled\');
                        $(\'#mesaj_fara_dj\').attr(\'readonly\', false);
                        $(\'#mesaj_dedicatie_trimisa\').attr(\'readonly\', false);
                        $(\'#mesaj_campuri_necesare\').attr(\'readonly\', false);
                        $(\'#mesaj_acest_ip_a_atins_limita_de_dedicatii\').attr(\'readonly\', false);
                        $(\'#mesaj_eroare_necunoscuta\').attr(\'readonly\', false);
						}, 3000);
						}, 1000);

                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta de actualizare este in curs de procesare...");
                    $("#salvare_mesaje").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i> Actualizare in curs...\');
                    $("#salvare_mesaje").addClass(\'disabled\');
					$("#resetare_mesaje").addClass(\'disabled\');
					$(\'#mesaj_fara_dj\').attr(\'readonly\', true);
					$(\'#mesaj_dedicatie_trimisa\').attr(\'readonly\', true);
					$(\'#mesaj_campuri_necesare\').attr(\'readonly\', true);
					$(\'#mesaj_acest_ip_a_atins_limita_de_dedicatii\').attr(\'readonly\', true);
					$(\'#mesaj_eroare_necunoscuta\').attr(\'readonly\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#salvare_mesaje").removeClass(\'btn-primary\');
					$("#salvare_mesaje").addClass(\'btn-danger\');
                    $("#salvare_mesaje").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Momentan aceasta functie este indisponibila!\');
					$(\'#salvare_mesaje\').attr(\'disabled\', \' \');
					$(\'#resetare_mesaje\').attr(\'disabled\', \' \');
					$(\'#parola\').attr(\'disabled\', \' \');
					$(\'#nume\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
