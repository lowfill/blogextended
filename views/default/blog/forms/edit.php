<?php
/**
 * Elgg blog extended edit/add page. Overwrite blog/views/default/blog/forms/edit.php
 *
 * Add the support for pre/post description fields
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2009
 * @link http://github.com/lowfill/blogextended
 *
 * @uses $vars['object'] Optionally, the blog post to edit
 */

$blog_context = get_context();

if (isset($vars['entity'])) {
  $title = sprintf(elgg_echo("blog:editpost"),$object->title);
  $action = "blog/edit";
} else  {
  $title = elgg_echo("blog:addpost");
  $action = "blog/add";
}

$form = get_plugin_setting("edit_form","blogextended");
$form = (!empty($form))?$form:"default";

$publish_form = elgg_view("blog/forms/{$form}/publish",$vars);
$conversation_form = elgg_view("blog/forms/{$form}/conversation",$vars);
$extras_form = elgg_view("blog/forms/{$form}/extras",$vars);
$main_form = elgg_view("blog/forms/main",array_merge($vars,array("form_view"=>$form)));

$form_body = elgg_view("blog/forms/{$form}/edit",array("publication_form"=>$publish_form,
													   "conversation_form"=>$conversation_form,
                                                       "extras_form"=>$extras,
                                                       "main_form"=>$main_form));

echo elgg_view('input/form', array('action' => "{$vars['url']}action/$action", 'body' => $form_body, 'internalid' => 'blogPostForm',"enctype"=>"multipart/form-data"));
?>
<script type="text/javascript">
	setInterval( "saveDraft(false)", 120000);
	function saveDraft(preview) {

		temppreview = preview;

		var drafturl = "<?php echo $vars['url']; ?>mod/blog/savedraft.php";
		var temptitle = $("input[name='blogtitle']").val();
		var tempbody = $("textarea[name='blogbody']").val();
		var temptags = $("input[name='blogtags']").val();

		var postdata = { blogtitle: temptitle, blogbody: tempbody, blogtags: temptags };

		$.post(drafturl, postdata, function() {
			var d = new Date();
			var mins = d.getMinutes() + '';
			if (mins.length == 1) mins = '0' + mins;
			$("span#draftSavedCounter").html(d.getHours() + ":" + mins);
			if (temppreview == true) {
				$("form#blogPostForm").attr("action","<?php echo $vars['url']; ?>mod/blog/preview.php");
				$("input[name='submit']").click();
				//$("form#blogPostForm").submit();
				//document.blogPostForm.submit();
			}
		});

	}
</script>