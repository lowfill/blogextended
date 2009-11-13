<?php
/**
 * Defines the edit form layout
 *
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <diego@somosmas.org>
 * @copyright Corporación Somos más - 2009
 * @link http://www.somosmas.org
 *
 */

$publication_form = $vars["publication_form"];
$conversation_form = $vars["conversation_form"];
$extras = $vars["extras_form"];
$form_body = $vars["main_form"];

?>
<div id="two_column_left_sidebar_210">

    <div id="blog_edit_sidebar">
    	<?php echo $publication_form?>
	</div>

	<div id="blog_edit_sidebar">
		<?php echo $conversation_form?>
	</div>

	<?php  echo $extras?>

</div><!-- /two_column_left_sidebar_210 -->

<!-- main content -->
<div id="two_column_left_sidebar_maincontent">

<?php echo $form_body?>

</div><div class="clearfloat"></div><!-- /two_column_left_sidebar_maincontent -->
