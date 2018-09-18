<div class="row" style="margin-left: auto!important;margin-right: auto!important;">
<div class="col-md-12 col-sm-12 col-xs-12">

<?php echo manager_financiar(); ?>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Istoric financiar</h3>
  </div>
  <div class="panel-body">

<?php echo obtine_istoric_financiar(); ?>

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
