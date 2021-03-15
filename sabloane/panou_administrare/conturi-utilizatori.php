<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Manager Utilizatori  <bx style="float:right;"><a href="#adauga-utilizator-modal" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-plus-square" aria-hidden="true"></i> Adauga utilizator</a></bx></h3>
  </div>
  <div class="panel-body">

<?php echo obtine_utilizatori(); ?>

  </div>
</div>

</div>
</div>

<?php echo obtine_formular_utilizator_nou(); ?>

<style>
button.btn.dropdown-toggle.btn-default {
    background: white!important;
}
</style>

<script>
<?php echo criptare_js('        $("#adaugare_utilizator_form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    utilizator: $("#adauga_utilizator_nou_nume").val(),
                    email: $("#adauga_utilizator_nou_email").val(),
                    grad: $("#adauga_utilizator_nou_grad").val(),
                    parola: md5($("#adauga_utilizator_nou_parola").val())
                },
                url: "https://main.baxandrei.ro/dedicatii-v2/remote-web_control_utilizatori/'.id_radio.'-'.cheie_secreta.'-adaugare_utilizator/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "utilizator_adaugat") {
						window.setTimeout(function(){
						$("#adauga_utilizator_nou").removeClass(\'btn-primary\');
						$("#adauga_utilizator_nou").addClass(\'btn-success\');
						toastr[\'success\']("Contul a fost adaugat! Se finalizeaza procesul...");
                        $("#adauga_utilizator_nou").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>  Finalizare proces...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
						$("#adauga_utilizator_nou").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						$("#adauga_utilizator_nou").removeClass(\'btn-primary\');
						$("#adauga_utilizator_nou").addClass(\'btn-warning\');
                        toastr[\'warning\'](result);
						window.setTimeout(function(){
						$("#adauga_utilizator_nou").removeClass(\'btn-warning\');
						$("#adauga_utilizator_nou").addClass(\'btn-primary\');
                        $("#adauga_utilizator_nou").removeClass(\'disabled\');
                        $(\'#adauga_utilizator_nou_nume\').attr(\'disabled\', false);
                        $(\'#adauga_utilizator_nou_email\').attr(\'disabled\', false);
                        $(\'#adauga_utilizator_nou_grad\').attr(\'disabled\', false);
                        $(\'#adauga_utilizator_nou_parola\').attr(\'disabled\', false);
						$("#adauga_utilizator_nou").html(\'<i class="fa fa-plus-circle" aria-hidden="true"></i> Adauga utilizator\');
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Procesam cererea ta...");
                    $("#adauga_utilizator_nou").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i>  Procesare...\');
                    $("#adauga_utilizator_nou").addClass(\'disabled\');
                    $(\'#adauga_utilizator_nou_nume\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_email\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_grad\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_parola\').attr(\'disabled\', \' \');
                },
                error: function () {
					window.setTimeout(function(){
					$("#adauga_utilizator_nou").removeClass(\'btn-primary\');
					$("#adauga_utilizator_nou").addClass(\'btn-danger\');
                    $("#adauga_utilizator_nou").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan autentificare este indisponibila!\');
					$(\'#adauga_utilizator_nou\').attr(\'disabled\', \' \');
                    $(\'#adauga_utilizator_nou_nume\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_email\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_grad\').attr(\'disabled\', \' \');
					$(\'#adauga_utilizator_nou_parola\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
