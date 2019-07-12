<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$c = Page::getCurrentPage();

if ($c->isEditMode()) { ?>
  <div class="ccm-edit-mode-disabled-item"
       style="padding: 10px 0px 10px 0px"><?php echo t('Parallax disabled in edit mode.') ?></div>
<? }

else {

 $file = File::getByID($fID);

 if (is_object($file)) { ?>

        <div class="parallax-window"
          data-parallax="scroll"
          data-image-src="<?=$file->getRelativePath()?>"
          data-speed="<?=$speed?>"
          style="min-height:<?=$height."vh;"?>">
        </div>


<? }
};
