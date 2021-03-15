<link rel="stylesheet" href="https://codemirror.net/lib/codemirror.css">
<script src="https://codemirror.net/lib/codemirror.js"></script>
<script src="https://codemirror.net/mode/css/css.js"></script>

<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Editare CSS personalizat</h3>
  </div>
  <div class="panel-body">

<div class="alert alert-info">
Trebuie mentionat faptul ca echipa BaxAndrei.Ro nu isi asuma nici o raspundere pentru pagubele generate de modificarile instabile sau distructive adaugate aici! Daca aveti probleme va rugam sa ne contactati in cel mai scurt timp prin una din metodele disponibile.
<br><br>
Daca doriti sa importati un fisier CSS mai mare, va recomandam sa folositi <code>@import url("URL");</code> pentru a micsora timpul de incarcare! De asemenea, editorul isi schimba inaltimea automat in functie de inaltimea codului tau.
</div>

<form id="form_actualizare_css_personalizat">
<textarea id="editor_css_personalizat"><?php echo file_get_contents('https://main.baxandrei.ro/dedicatii-v2/css-personalizat/'.id_radio.'.css'); ?></textarea>
<br>
<center>
<button style="margin-top:3px; margin-bottom:3px;" type="button" onclick='toastr["info"]("Anulare modificari nesalvate in curs...");$("#resetare_modificari").addClass("disabled");$("#resetare_modificari").html(" <i class=\"fa fa-cog fa-spin\"></i> In curs de resetare...");window.setTimeout(function(){toastr["success"]("Modificarile nesalvate fost anulate! Se reincarca pagina...");window.setTimeout(function(){location.reload();}, 3010);}, 1000);' id="resetare_modificari" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Resetare modificari curente</button>
<button style="margin-top:3px; margin-bottom:3px;" type="submit" id="trimite_actualizare_css" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare</button>
</center>
</form>
  </div>
</div>

</div>
</div>

<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("editor_css_personalizat"), {
    lineNumbers: true,
	viewportMargin: Infinity,
	lineWrapping: true,
	save: true
  });
</script>
<style>
.CodeMirror {
  border: 1px solid #eee;
  height: auto;
}
</style>
<script>
<?php echo criptare_js('        $("#form_actualizare_css_personalizat").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    css: Base64.encode($("#editor_css_personalizat").val()),
                    utilizator: "'.$utilizator.'",
                    hash_p: "'.$parola.'"
                },
                url: "https://main.baxandrei.ro/dedicatii-v2/remote-web_css_personalizat/'.id_radio.'-'.cheie_secreta.'",
                dataType: "text",
                success: function (result) {
					if (result == "css_actualizat") {
						window.setTimeout(function(){
						$("#trimite_actualizare_css").removeClass(\'btn-info\');
						$("#trimite_actualizare_css").addClass(\'btn-success\');
						toastr[\'success\']("Codul CSS personalizat a fost actualizat! Pagina se va reincarca...");
                        $("#trimite_actualizare_css").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Finalizare modificari...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
                        $("#trimite_actualizare_css").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
                        toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
					$("#trimite_actualizare_css").removeClass(\'btn-info\');
					$("#trimite_actualizare_css").addClass(\'btn-warning\');
							window.setTimeout(function(){
							$("#trimite_actualizare_css").removeClass(\'btn-warning\');
							$("#trimite_actualizare_css").addClass(\'btn-success\');
							$("#trimite_actualizare_css").html(\' <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizare\');
							$("#trimite_actualizare_css").removeClass(\'disabled\');
							$("#resetare_modificari").removeClass(\'disabled\');
							}, 3000);
						}, 1000);
                    }
				},
                beforeSend: function () {
					$("#resetare_modificari").addClass(\'disabled\');
                    $("#trimite_actualizare_css").html(\' <i class="fa fa-cog fa-spin"></i> Actualizare in curs...\');
                    $("#trimite_actualizare_css").addClass(\'disabled\');
					$("#trimite_actualizare_css").removeClass(\'btn-success\');
					$("#trimite_actualizare_css").addClass(\'btn-info\');
					toastr[\'info\']("Cererea ta de actualizare este in curs de procesare...");
                },
                error: function () {
					window.setTimeout(function(){
					$("#trimite_actualizare_css").removeClass(\'btn-info\');
					$("#trimite_actualizare_css").attr(\'disabled\', \' \');
					$("#resetare_modificari").attr(\'disabled\', \' \');
					$("#trimite_actualizare_css").addClass(\'btn-danger\');
                    $("#trimite_actualizare_css").html(\' <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> A aparut o eroare necunoscuta...\');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
