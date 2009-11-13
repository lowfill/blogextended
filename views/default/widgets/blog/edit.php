<?php
/**
 * Edit the widget
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2009
 * @link http://github.com/lowfill/blogextended
 */
?>
<p><?php echo elgg_echo('river:widget:label:displaynum'); ?> <select
	name="params[limit]">
	<option value="3" <?php if ($vars['entity']->limit == 3) echo " selected=\"yes\" "; ?>>3</option>
	<option value="5" <?php if ($vars['entity']->limit == 5) echo " selected=\"yes\" "; ?>>5</option>
	<option value="8" <?php if ((!$vars['entity']->limit) || ($vars['entity']->limit == 8)) echo " selected=\"yes\" "; ?>>8</option>
	<option value="12" <?php if ($vars['entity']->limit == 12) echo " selected=\"yes\" "; ?>>12</option>
	<option value="15" <?php if ($vars['entity']->limit == 15) echo " selected=\"yes\" "; ?>>15</option>
</select></p>
