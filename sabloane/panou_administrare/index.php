<?php if(isset($_COOKIE['deja_autentificat'])) { ?>
<script>
toastr['info']("Se pare ca deja esti autentificat, nu mai este nevoie sa te conectezi iar.");
</script>
<?php } ?>
<?php if(isset($_COOKIE['deja_autentificat2'])) { ?>
<script>
toastr['warning']("Se pare ca esti autentificat, pentru a reseta parola unui cont pierdut trebuie sa fi deconectat.");
</script>
<?php } ?>

<?php echo obtine_notificarile(); ?>

<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Statistici Vizitatori si Dedicatii</h3>
  </div>
  <div class="panel-body">
    <canvas id="pieChart"></canvas>
	<script>
var ctxP = document.getElementById("pieChart").getContext('2d');
new Chart(ctxP, {
    type: 'pie',
    data: {
        labels: ["Dedicatii Primite", "Vizitatori"],
        datasets: [
            {
                data: [<?php echo obtine_dedicatii_totale(); ?>, <?php echo obtine_vizite_totale(); ?>],
                backgroundColor: ["#F7464A", "#46BFBD"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
            }
        ]
    },
    options: {
        responsive: true
    }
});
	</script>
	<br>
	<center><b>Atentie:</b> Statisticile sunt bazate pe datele din ultimele 24 de ore!</center>
  </div>
  </div>
	</div>

    <div class="clearfix visible-xs visible-sm visible-md"></div>

    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Bun venit in panoul de administrare, <?php echo $_COOKIE['utilizator']; ?>.</h3>
  </div>
  <div class="panel-body">

<img src="<?php echo obtine_avatar_utilizator(); ?>" class="img-responsive img-thumbnail" align="left" width="100px" style="border-radius:5px; margin-right:5px; margin-botton:3px;"> Salutare <?php echo $_COOKIE['utilizator']; ?> si bun venit pe pagina principala de administrare a radioului <?php echo nume_radio; ?>.
<br><br>Nivelul tau de acces curent: <?php echo nivel_acces(); ?>
<br><i><small>Daca vei incerca sa accesezi o pagina ce necesita un nivel mai mare de acces decat cel pe care il ai in prezent, vei primi o notificare asupra acestui fapt.</small></i>
  </div>
  </div>
	</div>
</div>

<?php echo obtine_ultimele_5_autentificari(); ?>

<?php echo obtine_limite_radio(); ?>
