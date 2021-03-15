<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Magazin</h3>
  </div>
  <div class="panel-body">

<?php echo obtine_obiecte_magazin(); ?>

  </div>
</div>
</div>
</div>

<script>
<?php echo criptare_js('function incepe_achizitionare_produs(id_produs) {
var id_produs = Base64.decode(id_produs);
            $.ajax({
                type: "POST",
                data: {
                    produs_dorit: id_produs
                },
                url: "https://main.baxandrei.ro/dedicatii-v2/remote-web_achizitionare_produs/'.id_radio.'-'.cheie_secreta.'/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "produs_achizitionat") {
						window.setTimeout(function(){
						$("#cumpara_produs-"+id_produs).removeClass(\'btn-primary\');
						$("#cumpara_produs-"+id_produs).addClass(\'btn-success\');
						toastr[\'success\']("Articolul a fost adaugat in contul curent! Pagina se reincarca...");
						$("#cumpara_produs-"+id_produs).html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Finalizare achizitie...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
						$("#cumpara_produs-"+id_produs).removeClass(\'btn-primary\');
						$("#cumpara_produs-"+id_produs).addClass(\'btn-warning\');
						toastr[\'warning\'](result);
						$("#cumpara_produs-"+id_produs).html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						window.setTimeout(function(){
						$("#cumpara_produs-"+id_produs).removeClass(\'btn-warning\');
						$("#cumpara_produs-"+id_produs).addClass(\'btn-primary\');
						$("#cumpara_produs-"+id_produs).html(\'<i class="fa fa-cart-plus" aria-hidden="true"></i> Cumpara\');
						$("#cumpara_produs-"+id_produs).removeClass(\'disabled\');
						}, 3000);
						}, 1000);
                    }
				},
                beforeSend: function () {
					$("#cumpara_produs-"+id_produs).addClass(\'disabled\');
					$("#cumpara_produs-"+id_produs).html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i> Procesare...\');
					toastr[\'info\']("Istoricul conectarilor este in curs de golire...");
                },
                error: function () {
					window.setTimeout(function(){
					$(\'.btn-magazin.btn.btn-primary\').attr(\'onclick\', \' \');
					$(\'.btn-magazin.btn.btn-primary\').addClass(\'disabled\');
					$("#cumpara_produs-"+id_produs).addClass(\'disabled\');
					$("#cumpara_produs-"+id_produs).removeClass(\'btn-primary\');
					$("#cumpara_produs-"+id_produs).addClass(\'btn-danger\');
					$("#cumpara_produs-"+id_produs).html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan indisponibil!\');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}'); ?>
</script>
