<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Manager BanIP</h3>
  </div>
  <div class="panel-body">

<form id="restrictionare_ip">
<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12" style="padding: 3px;">
<input name="ban_ip" id="ban_ip" required="" autocomplete="off" placeholder="Aici introduceti adresa IP pe care doriti sa o restrictionati" class="form-control" <?php if(isset($_COOKIE['ip_ban'])) { echo ' value="'.$_COOKIE['ip_ban'].'"'; } ?>>
<input type='hidden' id='ban_ip2' name='ban_ip2' value='<?php echo $_SERVER['REMOTE_ADDR']; ?>'>
</div>

<div class="clearfix visible-xs visible-sm visible-md"></div>

<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12" style="padding: 3px;">
<input name="motiv_ban" id="motiv_ban" autocomplete="off" placeholder="Aici introduceti motivul pentru care a fost banata adresa IP. Ex: spam" class="form-control">
</div>

<div class="clearfix visible-xs visible-sm visible-md"></div>

<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding: 3px;">
<center><button id="trimite_cerere_ban_ip" class="btn btn-primary" type="submit"><i class="fa fa-ban" aria-hidden="true"></i> Restrictionare IP</button></center>
</div>
</form>

  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Lista IP-uri restrictionate</h3>
  </div>
  <div class="panel-body">

<?php
if(!defined('id_radio')) { $radio = null; } else { $radio = id_radio; }
if(!defined('cheie_secreta')) { $cheie_secreta = null; } else { $cheie_secreta = cheie_secreta; }
if(!empty($_COOKIE['utilizator'])) { $utilizator = $_COOKIE['utilizator']; } else { $utilizator = 'nespecificat'; }
if(!empty($_COOKIE['parola'])) { $parola = $_COOKIE['parola']; } else { $parola = 'nespecificat'; }

echo obtine_banuri();
?>

  </div>
</div>

  </div>
</div>


<style id="personalizat">
.pagination > li > a, .pagination > li:first-child > a, .pagination > li:last-child > a, .pagination > li > span, .pagination > li:first-child > span, .pagination > li:last-child > span {
    border-radius: 3px;
    border: solid 1px rgba(128, 128, 128, 0.18);
}
</style>

<script>
<?php echo criptare_js('function sterge_ban_ip(id,ip) {
            $.ajax({
                type: "POST",
                data: {
                    id: id,
                    ip: ip
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_banip/'.$radio.'-'.$cheie_secreta.'-unban_ip/'.$utilizator.'-'.$parola.'/",
                dataType: "json",
                success: function (result) {
					if (result.ip_debanat) {
						window.setTimeout(function(){
						toastr[\'success\']("Adresa IP specificata nu mai este restrictionata! Se reincarca pagina...");
						window.setTimeout(function(){
                        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
                        toastr[\'warning\'](result.raspuns);
						$("#buton_unelte"+id).removeClass(\'disabled\');
						}, 1000);
                    }
				},
                beforeSend: function () {
					$("#buton_unelte"+id).addClass(\'disabled\');
					toastr[\'info\']("Cererea ta este in curs de procesare...");
                },
                error: function () {
					window.setTimeout(function(){
					$(\'#buton_unelte\').attr(\'data-toggle\', \' \');
                    toastr[\'error\']("Se pare ca a aparut o eroare neasteptata... Va rugam sa reincercati, iar daca problema persista sa anuntati un administrator la <a href=\'mailto:contact@baxandrei.ro\'>contact@baxandrei.ro</a>!");
					}, 1000);
                }
            });
            return false;
}'); ?>
</script>
<script>
<?php echo criptare_js('$("#restrictionare_ip").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: {
                    ip: $("#ban_ip").val(),
                    ip2: $("#ban_ip2").val(),
                    motiv: $("#motiv_ban").val()
                },
                url: "https://www.main.baxandrei.ro/dedicatii-v2/remote-web_control_banip/'.$radio.'-'.$cheie_secreta.'-ban_ip/'.$utilizator.'-'.$parola.'/",
                dataType: "json",
                success: function (result) {
					if (result.ip_banat) {
						window.setTimeout(function(){
						$("#trimite_cerere_ban_ip").removeClass(\'btn-primary\');
						$("#trimite_cerere_ban_ip").addClass(\'btn-success\');
						toastr[\'success\']("Adresa IP specificata a fost restrictionata! Se finalizeaza procesul...");
						$("#trimite_cerere_ban_ip").html(\'<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>  Finalizare proces restrictionare...\');
						window.setTimeout(function(){
						        location.reload();
						}, 3010);
						}, 1000);

                    } else {
						window.setTimeout(function(){
						$("#trimite_cerere_ban_ip").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Eroare temporara...\');
						$("#trimite_cerere_ban_ip").removeClass(\'btn-primary\');
						$("#trimite_cerere_ban_ip").addClass(\'btn-warning\');
                        toastr[\'warning\'](result.raspuns);
						window.setTimeout(function(){
						$("#trimite_cerere_ban_ip").removeClass(\'btn-warning\');
						$("#trimite_cerere_ban_ip").addClass(\'btn-primary\');
                        $("#trimite_cerere_ban_ip").removeClass(\'disabled\');
                        $(\'#ban_ip\').attr(\'readonly\', false);
                        $(\'#motiv_ban\').attr(\'readonly\', false);
						$("#trimite_cerere_ban_ip").html(\'<i class="fa fa-ban" aria-hidden="true"></i> Restrictionare IP\');
						}, 3000);
						}, 1000);
                    }
                },
                beforeSend: function () {
					toastr[\'info\']("Cererea ta este in curs de procesare...");
                    $("#trimite_cerere_ban_ip").html(\'<i class="fa fa-cog fa-spin" aria-hidden="true"></i>  Procesare in curs...\');
                    $("#trimite_cerere_ban_ip").addClass(\'disabled\');
                    $(\'#ban_ip\').attr(\'readonly\', true);
                    $(\'#motiv_ban\').attr(\'readonly\', true);
                },
                error: function () {
					window.setTimeout(function(){
					$("#trimite_cerere_ban_ip").removeClass(\'btn-primary\');
					$("#trimite_cerere_ban_ip").addClass(\'btn-danger\');
                    $("#trimite_cerere_ban_ip").html(\'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Momentan indisponibil!\');
					$(\'#trimite_cerere_ban_ip\').attr(\'disabled\', \' \');
					$(\'#ban_ip\').attr(\'disabled\', \' \');
					$(\'#motiv_ban\').attr(\'disabled\', \' \');
                    toastr[\'error\']("O eroare necunoscuta a aparut! Va rugam sa reincercati, iar daca problema persista sa contactati echipa noastra!");
					}, 1000);
                }
            });
            return false;
        });'); ?>
</script>
