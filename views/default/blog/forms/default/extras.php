<?php
/**
 * Defines the fields inside the extras form
 *
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2009
 * @link http://github.com/lowfill/blogextended
 *
 */


$cat = elgg_echo('categories');
$extras = elgg_view('categories',$vars);
if (!empty($extras)){
?>

<div id="blog_edit_sidebar">
<?php echo $extras;?>
</div>
<?php }?>