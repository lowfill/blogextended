<?php
/**
 * Blog category selector view
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2010
 * @link http://github.com/lowfill/blogextended
 *
 */
global $CONFIG;

if(get_plugin_setting("extra_types","blogextended")=="yes"){

  //TODO Add support to 'draft'
  $value = "";
  if(isset($vars["entity"])){
    $value = $vars["entity"]->category;
  }

  $categories=blogextended_get_categories();
?>
<p><label><?php echo elgg_echo("blogextended:type"); ?></label><br />
  <?php echo elgg_view("input/pulldown",
                       array("internalname"=>"category",
                       		 "options_values"=>$categories,
                       		 "value"=>$value)); ?>
</p>
<?php
}
?>