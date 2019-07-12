<?php namespace Concrete\Package\ImageParallax;

use Concrete\Core\Package\Package;
use Concrete\Core\Block\BlockType\BlockType;
use Database;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

  protected $pkgHandle = 'image_parallax';
  protected $appVersionRequired = '8.5.1';
  protected $pkgVersion = '0.9.1' ;

  public function getPackageDescription()
  {
    return t('Adds simple image parallax block to your web site project.');
  }

  public function getPackageName()
  {
    return t('Simple image parallax.');
  }

 public function install()
  {
     $pkg = parent::install();

     if (!is_object(BlockType::getByHandle('image_parallax'))) {
         BlockType::installBlockType('image_parallax', $pkg);
     }

  }

  public function uninstall()
  {
      parent::uninstall();
      $db = Database::connection();
      $db->executeQuery('DROP TABLE IF EXISTS btImageParallax');
  }

}
?>
