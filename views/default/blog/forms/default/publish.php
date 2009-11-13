<?php
/**
 * Defines the fields inside the publish form
 *
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <diego@somosmas.org>
 * @copyright Corporación Somos más - 2009
 * @link http://www.somosmas.org
 *
 */

if(isset($vars["entity"])){
  $access_id = $vars['entity']->access_id;
}
else{
  if (defined('ACCESS_DEFAULT')){
    $access_id = ACCESS_DEFAULT;
  }else{
    $access_id = 0;
  }
}

$preview = elgg_echo('blog:preview');
$publish = elgg_echo('publish');
$savedraft = elgg_echo('blog:draft:save');
$draftsaved = elgg_echo('blog:draft:saved');
$never = elgg_echo('blog:never');
$privacy = elgg_echo('access');

$access_input = elgg_view('input/access', array('internalname' => 'access_id', 'value' => $access_id));
$submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('publish')));

?>
<div id="content_area_user_title">
	<!-- <div class="preview_button"><a  onclick="javascript:saveDraft(true);return true;"><?php echo $preview?></a></div> -->
	<h2><?php echo $publish?></h2>
</div>
<div class="publish_controls">
	<p>
		<a href="#" onclick="javascript:saveDraft(false);return false;"><?php echo $savedraft?></a>
	</p>
</div>
<div class="publish_options">
	<!-- <p><b>{$publish}:</b> now <a href="">edit</a></p> -->
	<p class="auto_save"><?php echo $draftsaved?>: <span id="draftSavedCounter"><?php echo $never?></span></p>
</div>
<div class="blog_access">
	<p><?php echo $privacy?>: <?php echo $access_input?>
</p></div>
<div class="publish_blog">
	<?php echo $submit_input?>
</div>
