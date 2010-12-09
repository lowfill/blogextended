<?php
/**
 * Elgg blogextended plugin
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 201
 * @link http://github.com/lowfill/blogextended
 */

/**
 * Blog extended initialization
 *
 * Register css extensions, contentes view for groups, widgets and event handlers
 */
function blogextended_init(){
	global $CONFIG;
	elgg_extend_view("css","blogextended/css");

	elgg_extend_view("blog/fields_before","blogextended/categories");
	elgg_extend_view("blog/fields_before","groups/groupselector");

	// New blog system has a group blog widget
	//elgg_extend_view('groups/left_column', 'groups/groupcontents',1);

	register_elgg_event_handler("create","object","blogextended_blog_type_handler");
	register_elgg_event_handler("update","object","blogextended_blog_type_handler");

	register_elgg_event_handler("create","object","blogextended_group_selector_handler");
	register_elgg_event_handler("update","object","blogextended_group_selector_handler");

	// Registering category_{lang} for be used by tag search
	$translations = get_installed_translations();
	foreach($translations as $key=>$value){
		elgg_register_tag_metadata_name("category_{$key}");
	}

	if(is_plugin_enabled("itemicon")){
		if(!isset($CONFIG->itemicon)){
			$CONFIG->itemicon[]=array();
			$CONFIG->itemicon[] = "blog";
			extend_view("blog/fields_after","itemicon/add");
		}
	}
}

/**
 * Blog type handler. Sets the blog type property
 *
 * @param string $event create | update
 * @param string $object_type object
 * @param object $object Blog object
 * @return boolean
 */
function blogextended_blog_type_handler($event, $object_type, $object){
	global $CONFIG;
	$blog_type = get_input("blog_type");
	switch($event){
		case "create":
		case "update":
			if(!empty($blog_type)){
				$object->clearMetadata("blog_type");
				$object->set("blog_type",$blog_type);;
				if(!empty($blog_type)){
					//Registering metadata in all the registered languages for easy localized search
					$translations = get_installed_translations();
					foreach($translations as $key=>$value){
						$var = "blog_type_{$key}";
						$object->clearMetadata($var);
						$object->set($var,elgg_echo($blog_type,$key));
					}
				}
			}
			break;
	}
	return true;
}

/**
 * Group selector handler
 *
 * Sets the selected group as content_owner for the selected post
 * @param string $event create | update
 * @param string $object_type object
 * @param object $object Blog object
 * @return boolean
 */
function blogextended_group_selector_handler($event, $object_type, $object){
	global $CONFIG;
	$content_owner = get_input("content_owner");
	if(!empty($content_owner)){
		switch($event){
			case "create":
			case "update":
				$object->clearMetadata("content_owner");
				$object->set("content_owner",$content_owner);
				break;
		}
	}
	return true;
}

/**
 * Gets the configured blog categories
 */
function blogextended_get_categories(){
	$resp = array("--"=>elgg_echo("blog:type:other"),
                  "blog:type:news"=>elgg_echo("blog:type:news"),
                  "blog:type:goodpractice"=>elgg_echo("blog:type:goodpractice"),
                  "blog:type:event"=>elgg_echo("blog:type:event"),
	);
	$resp = trigger_plugin_hook('blogextended:fields', 'blogextended', NULL, $resp);
	return $resp;
}
register_elgg_event_handler('init','system','blogextended_init');

?>
