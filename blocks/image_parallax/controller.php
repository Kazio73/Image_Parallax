<?php
namespace Concrete\Package\ImageParallax\Block\ImageParallax;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{

  protected $btTable = "btImageParallax";
  protected $btInterfaceWidth = "350";
  protected $btInterfaceHeight = "290";
  protected $btDefaultSet = 'multimedia';
  protected $btIgnorePageThemeGridFrameworkContainer = true;
  public $fID = "";

    public function getBlockTypeDescription()
    {
        return t('Simple parallax image for image block');
    }


    public function getBlockTypeName()
    {
        return t('Image Parallax');
    }

    public function on_start()
    {
      $al = \Concrete\Core\Asset\AssetList::getInstance();
      $al->register(
        'javascript', 'jsparallax', 'blocks/image_parallax/jsparallax/parallax.js',
        array('version' => '1.5.0', 'minify' => false, 'combine' => true),'image_parallax'
      );
      $al->register (
        'css', 'jsparallax', 'blocks/image_parallax/jsparallax/jsparallax.css',
          array('version' => '1.5.0', 'minify' => false, 'combine' => true) ,'image_parallax'
      );
      $al->registerGroup('jsparallax', array (
        array('javascript', 'jquery'),
        array('javascript', 'jsparallax'),
        array('css', 'jsparallax')
      ));

       $this->set('app', $this->app);

    }


  public function registerViewAssets ($outputContent = '')
    // public function view()
  {
    $this->requireAsset('jsparallax');
  }

 public function validate($data) {
         $e = $this->app->make('error');

      if ($data['height'] < 20 || $data['height'] > 100) {
          $e->add(t('You must put the number between 20 and 100.'));
      }
      return $e;
  }

}

?>
