<div class="col-lg-12 text-center" style="float: none; margin: 0 auto;">
<form class="form-horizontal" method="POST" action="<?php echo adresa_curenta(); ?>">
  <fieldset>
    <div class="form-group">
        <input type="text" required autocomplete="off" class="form-control" id="dela" name="dela" placeholder="De la:">
    </div>

    <div class="form-group">
        <input type="text" required autocomplete="off" class="form-control" id="pentru" name="pentru" placeholder="Pentru:">
    </div>

    <div class="form-group">
        <textarea required autocomplete="off" class="form-control" rows="3" id="mesaj" name="mesaj" placeholder="Mesaj dedicatie:" style="resize:none;"></textarea>
		<div required id="mesaj_emoji_area"></div>
    </div>

	<?php if(status_preferinte) { ?>
    <div class="form-group">
        <input type="text" autocomplete="off" class="form-control" id="preferinta" name="preferinta" placeholder="Preferinta muzicala:">
    </div>
	<?php } else { ?>
    <div class="form-group">
        <input type="text" autocomplete="off" class="form-control" id="preferinta" name="preferinta" disabled placeholder="Preferintele muzicale sunt dezactivate.">
    </div>
	<?php } ?>

    <div class="form-group">
        <button style="margin-top:3px; margin-bottom:3px;" type="reset" class="btn btn-default"><i class="fa fa-undo" aria-hidden="true"></i> Sterge tot</button>
        <button style="margin-top:3px; margin-bottom:3px;" type="submit" name="trimite" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Trimite dedicatia</button>
    </div>
  </fieldset>
</form>
</div>
<br>

<script type="text/javascript" src="https://cdn.baxandrei.ro/mervick-emojionearea/emojionearea.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.baxandrei.ro/mervick-emojionearea/emojionearea.min.css" media="screen">
<script type="text/javascript">
<?php echo criptare_js('if (top == self) {
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
{ } else {
if ($.fn.emojioneArea) {
$(document).ready(function() {
$("#mesaj").emojioneArea({
container: "#mesaj_emoji_area",
hideSource: true,
useSprite: false
});
});
}
}
}'); ?>
</script>
<style>
.emojionearea-editor {
text-align: left!important;
}
</style>
