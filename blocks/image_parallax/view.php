<?php  defined('C5_EXECUTE') or die("Access Denied.");?>

<?php $c = Page::getCurrentPage();

if ($c->isEditMode()) { ?>
  <div class="ccm-edit-mode-disabled-item"
       style="padding: 10px 0px 10px 0px"><?php echo t('Parallax disabled in edit mode.') ?></div>

<?php  } else {

 $file = File::getByID($fID);

 if (is_object($file)) { ?>

        <div class="parallax-window"
          data-parallax="scroll"
          data-image-src="<?php echo $file->getRelativePath()?>"
          data-speed="<?php echo $speed?>"
          style="min-height:<?php  echo $height."vh;"?>">
        </div>

<?php }?>
<?php  }?>
