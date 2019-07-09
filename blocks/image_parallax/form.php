<?php

defined('C5_EXECUTE') or die (_("Access Denied."));
$al = Core::make('helper/concrete/asset_library');

$imageFile = false;
if(isset($fID) && $fID > 0) {
$imageFile  = File::getByID($fID);
};

if (!isset($height) || !isset($speed) || !isset($alt) ){
    $height = 20;
    $speed = 0.5;
    $alt = '';
};

?>

<div class="form-group">
  <label class="control-label"><?=t('Image File')?></label>
  <?=$al->image('fID','fID', t('Image File'), $imageFile);?>
</div>

<div class="form-group">
  <label class="control-label" for="height"><?=t('Parallx block height in vh (20 - 100 %)')?></label>
  <input type="number" class="form-control" name="height" min="10" max="100" value="<?= $height?>">
</div>

<div class="form-group">
  <label class="control-label" for="speed"><?=t('Parallx speed (0 - 1) use dot as the decimal separator')?></label>
  <input type="number" class="form-control" name="speed" min="0" max="1" step="0.1" value="<?=$speed?>">
</div>

<div class="form-group">
  <label class="control-label" for="alt"><?=t('Alt tag for SEO')?></label>
  <input type="text" class="form-control" name="alt" value="<?=$alt?>">
</div>
