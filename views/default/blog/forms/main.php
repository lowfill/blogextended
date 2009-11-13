<?php
/**
 * Defines the fields inside the blog edit form
 *
 * Add the support for pre/post description fields
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <diego@somosmas.org>
 * @copyright Corporación Somos más - 2009
 * @link http://www.somosmas.org
 *
 * @uses $vars['object'] Optionally, the blog post to edit
 * @uses $vars[""]
 */

if (isset($vars['entity'])) {
  $title = sprintf(elgg_echo("blog:editpost"),$object->title);
  $title = $vars['entity']->title;
  $body = $vars['entity']->description;
  $tags = $vars['entity']->tags;
  $access_id = $vars['entity']->access_id;
} else  {
  $title = elgg_echo("blog:addpost");
  $tags = "";
  $title = "";
  $description = "";
  $description = "";
  if (defined('ACCESS_DEFAULT')){
    $access_id = ACCESS_DEFAULT;
  }else{
    $access_id = 0;
  }
}

// Just in case we have some cached details
if (empty($body)) {
  $body = $vars['user']->blogbody;
  if (!empty($body)) {
    $title = $vars['user']->blogtitle;
    $tags = $vars['user']->blogtags;
  }
}

$title_label = elgg_echo('title');
$title_textbox = elgg_view('input/text', array('internalname' => 'blogtitle', 'value' => $title));

$text_label = elgg_echo('blog:text');
$text_textarea = elgg_view('input/longtext', array('internalname' => 'blogbody', 'value' => $body));

$tag_label = elgg_echo('tags');
$tag_input = elgg_view('input/tags', array('internalname' => 'blogtags', 'value' => $tags));

//@todo Check if this would be here
$access_label = elgg_echo('access');
$access_input = elgg_view('input/access', array('internalname' => 'access_id', 'value' => $access_id));

$submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('publish')));


if (isset($vars['entity'])) {
  $entity_hidden = elgg_view('input/hidden', array('internalname' => 'blogpost', 'value' => $vars['entity']->getGUID()));
} else {
  $entity_hidden = '';
}

$fields_before = elgg_view("blog/fields_before",$vars);
$fields_after = elgg_view("blog/fields_after",$vars);

?>

<p>
<label><?php echo $title_label?></label><br />
<?php echo $title_textbox?>
</p>

<!-- start of before fields -->
<?php echo $fields_before?>
<!-- end of before fields -->

<p>
<label><?php echo $text_label?></label><br />
<?php echo $text_textarea?>
</p>

<!-- start of after fields -->
<?php echo $fields_after ?>
<!-- end of after fields -->

<p>
<label><?php echo $tag_label?></label><br />
<?php echo $tag_input?>
</p>

<?php echo $entity_hidden?>

<?php if($vars["form_view"]!="default"){?>
  <p>
  <label><?php echo $access_label?></label><br />
  <?php echo $access_input?>
  </p>

  <p>
  <?php echo $submit_input?>
  </p>
<?php }?>