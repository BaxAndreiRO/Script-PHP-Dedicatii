<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Editare setari sistem</h3>
  </div>
  <div class="panel-body">
<form id="actualizare_setari_sistem">

<div class="form-group">
	<label for="title"><b>Nume radio:</b></label>
	<input type="text" class="form-control" id="nume_radio" name="nume_radio" placeholder="Introduceti adresa catre pagina web oficiala a postului de radio" required="" value="<?php echo nume_radio; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Adresa radio:</b></label>
	<input type="url" class="form-control" id="adresa_radio" name="adresa_radio" placeholder="Introduceti adresa catre pagina web oficiala a postului de radio" required="" value="<?php echo adresa_radio; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Limita dedicatii per IP:</b></label>
	<input type="number" min="1" class="form-control" id="limita_de_dedicatii_per_ip" name="limita_de_dedicatii_per_ip" placeholder="Introduceti numarul maxim de dedicatii permise per adresa IP" required="" value="<?php echo limita_de_dedicatii_per_ip; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Timp reincarcare AJAX:</b></label>
	<input type="number" min="1" class="form-control" id="timp_refresh_ajax" name="timp_refresh_ajax" placeholder="Introduceti perioada de timp la care AJAX sa reincarce elementele (in secunde)" required="" value="<?php echo timp_refresh_ajax; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Numar de elemente per pagina:</b></label>
	<input type="number" min="10" class="form-control" id="elemente_per_pagina" name="elemente_per_pagina" placeholder="Introduceti numarul dorit de elemente per pagina" required="" value="<?php echo elemente_per_pagina; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Imagine reprezentativa site: <a data-toggle="tooltip" data-placement="right" title="Aceasta imagine este utilizata atunci cand site-ul de dedicatii este distribuit pe un site de socializare.">(?)</a></b></label>
	<input type="url" class="form-control" id="tag_og_image" name="tag_og_image" placeholder="Introduceti adresa ULR catre o imagine care doriti sa fie afisata cand site-ul este distribuit pe un site de socializare" required="" value="<?php echo tag_og_image; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Descriere site:</b></label>
	<input type="text" class="form-control" id="tag_descriere" name="tag_descriere" placeholder="Introduceti o scurta descriere a radioului aici pentru motoarele de cautare" required="" value="<?php echo tag_descriere; ?>">
</div>

<div class="form-group">
	<label for="title"><b>Cuvinte cheie:</b></label>
	<input type="text" class="form-control" id="tag_cuvinte_cheie" name="tag_cuvinte_cheie" placeholder="Introduceti cuvinte cheie (separate prin virgula ',') pentru a face site-ul mai usor de gasit de catre motoarele de cautare" required="" value="<?php echo tag_cuvinte_cheie; ?>">
</div>

<center>
<button style="margin-top:3px; margin-bottom:3px;" onclick='toastr["success"]("Modificarile nesalvate fost anulate!");' type="reset" id="resetare_setari" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Resetare modificari curente</button>
<button style="margin-top:3px; margin-bottom:3px;" type="submit" id="actualizare_setari" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare</button>
</center>

  </div>
</div>


</form>
</div>
</div>

<script>
<?php
echo criptare_js('$("#actualizare_setari_sistem").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
					nume_radio: $("#nume_radio").val(),
					adresa_radio: $("#adresa_radio").val(),
					limita_de_dedicatii_per_ip: $("#limita_de_dedicatii_per_ip").val(),
					timp_refresh_ajax: $("#timp_refresh_ajax").val(),
					elemente_per_pagina: $("#elemente_per_pagina").val(),
					tag_og_image: $("#tag_og_image").val(),
					tag_descriere: $("#tag_descriere").val(),
					tag_cuvinte_cheie: $("#tag_cuvinte_cheie").val()
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_actualizare_setari_sistem/'.id_radio.'-'.cheie_secreta.'/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "setari_sistem_actualizate") {
						window.setTimeout(function(){
						$("#actualizare_setari").removeClass(\'btn-primary\');
						$("#actualizare_setari").addClass(\'btn-success\');
						toastr[\'success\']("Setarile au fost actualizate!");
                        $("#actualizare_setari").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>&nbsp;Se finalizeaza actualizara setarilor...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);
                    } else {
						window.setTimeout(function(){
						toastr[\'warning\']("Se pare ca avem o problema temporara! Va rugam sa reincercati din nou.");
						$("#actualizare_setari").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						$("#actualizare_setari").removeClass(\'btn-primary\');
						$("#actualizare_setari").addClass(\'btn-warning\');
						window.setTimeout(function(){
						$("#actualizare_setari").addClass(\'btn-primary\');
						$("#actualizare_setari").removeClass(\'btn-warning\');
                        $("#actualizare_setari").html(\'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare\');
                        $("#actualizare_setari").removeClass(\'disabled\');
						$("#resetare_setari").removeClass(\'disabled\');
                        $(\'#limita_de_dedicatii_per_ip\').attr(\'readonly\', false);
                        $(\'#adresa_radio\').attr(\'readonly\', false);
						$(\'#nume_radio\').attr(\'readonly\', false);
						$(\'#timp_refresh_ajax\').attr(\'readonly\', false);
						$(\'#elemente_per_pagina\').attr(\'readonly\', false);
						$(\'#tag_og_image\').attr(\'readonly\', false);
						$(\'#tag_descriere\').attr(\'readonly\', false);
						$(\'#tag_cuvinte_cheie\').attr(\'readonly\', false);
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta de actualizare este in curs de procesare...");
                    $("#actualizare_setari").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i>&nbsp;Actualizare in curs...\');
                    $("#actualizare_setari").addClass(\'disabled\');
					$("#resetare_setari").addClass(\'disabled\');
                    $(\'#limita_de_dedicatii_per_ip\').attr(\'readonly\', true);
                    $(\'#adresa_radio\').attr(\'readonly\', true);
					$(\'#nume_radio\').attr(\'readonly\', true);
					$(\'#timp_refresh_ajax\').attr(\'readonly\', true);
					$(\'#elemente_per_pagina\').attr(\'readonly\', true);
					$(\'#tag_og_image\').attr(\'readonly\', true);
					$(\'#tag_descriere\').attr(\'readonly\', true);
					$(\'#tag_cuvinte_cheie\').attr(\'readonly\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#actualizare_setari").removeClass(\'btn-primary\');
					$("#actualizare_setari").addClass(\'btn-danger\');
                    $("#actualizare_setari").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;Momentan aceasta functie este indisponibila!\');
					$(\'#actualizare_setari\').attr(\'disabled\', \' \');
					$(\'#resetare_setari\').attr(\'disabled\', \' \');
					$(\'#parola\').attr(\'disabled\', \' \');
					$(\'#nume\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });');

?>
</script>
