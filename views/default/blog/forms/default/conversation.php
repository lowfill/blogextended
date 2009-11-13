<?php
/**
 * Defines the fields inside the conversation form
 *
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2009
 * @link http://github.com/lowfill/blogextended
 *
 */


if(isset($vars["entity"])){
  if ($vars['entity']->comments_on == 'Off') {
    $comments_on = false;
  } else {
    $comments_on = true;
  }
}
else{
    $comments_on = true;
}
$conversation = elgg_echo('Conversation');
$allowcomments = elgg_echo('blog:comments:allow');

if($comments_on){
  $comments_on_switch = "checked=\"checked\"";
}else{
  $comment_on_switch = "";
}

?>
<div id="content_area_user_title"><h2><?php echo $conversation?></h2></div>
<div class="allow_comments">
<p>
<label>
	<input type="checkbox" name="comments_select"  <?php echo $comments_on_switch?> /> <?php echo $allowcomments?>
</label>
</p>
</div>
