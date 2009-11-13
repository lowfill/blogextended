<?php
/**
 * Group contents view
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2009
 * @link http://github.com/lowfill/blogextended
 *
 */

?>
<div id="group_pages_widget">
<h2><?php echo elgg_echo("group:contents"); ?></h2>
<?php
set_context("search");
$objects = list_entities_from_metadata("content_owner",page_owner(), "object","blog",0, 5, false,false,false);
if(!empty($objects)){
  echo $objects;
}
else{
  echo elgg_echo("group:contents:empty");
}

?></div>
