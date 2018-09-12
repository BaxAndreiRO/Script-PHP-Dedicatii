<?php echo obtine_istoric_conectari(); ?>

<style id="personalizat">
.pagination > li > a, .pagination > li:first-child > a, .pagination > li:last-child > a, .pagination > li > span, .pagination > li:first-child > span, .pagination > li:last-child > span {
    border-radius: 3px;
    border: solid 1px rgba(128, 128, 128, 0.18);
}
</style>

<script>
<?php echo criptare_js('function executa_golire() {
            $.ajax({
                type: "POST",
                data: {
                    golire_istoric: \'da\'
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web/'.id_radio.'-'.cheie_secreta.'-golire_istoric_conectari/'.$utilizator.'-'.$parola.'/",
                dataType: "text",
                success: function (result) {
					if (result == "istoric_golit") {
						window.setTimeout(function(){
						$("#resetare_istoric").removeClass(\'btn-primary\');
						$("#resetare_istoric").addClass(\'btn-success\');
						toastr[\'success\']("Istoricul conectarilor a fost golit! Pagina se reincarca...");
						$("#resetare_istoric").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Se goleste...\');
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
						$("#resetare_istoric").removeClass(\'btn-primary\');
						$("#resetare_istoric").addClass(\'btn-warning\');
						toastr[\'warning\'](\'Se pare ca a aparut o eroare neasteptata. Va rugam sa reincercati!\');
						$("#resetare_istoric").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						window.setTimeout(function(){
						$("#resetare_istoric").removeClass(\'btn-warning\');
						$("#resetare_istoric").addClass(\'btn-primary\');
						$("#resetare_istoric").html(\'<i class="fa fa-trash" aria-hidden="true"></i> Golire istoric\');
						$("#resetare_istoric").removeClass(\'disabled\');
						}, 3000);
						}, 1000);
                    }
				},
                beforeSend: function () {
					$("#resetare_istoric").addClass(\'disabled\');
					$("#resetare_istoric").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i> Procesare...\');
					toastr[\'info\']("Istoricul conectarilor este in curs de golire...");
                },
                error: function () {
					window.setTimeout(function(){
					$(\'#resetare_istoric\').attr(\'disabled\', \' \');
					$("#resetare_istoric").removeClass(\'btn-primary\');
					$("#resetare_istoric").addClass(\'btn-danger\');
					$("#resetare_istoric").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan indisponibil!\');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}'); ?>
</script>
