<?php
/**
 * Elgg blogextended plugin
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 200
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

    elgg_extend_view('groups/left_column', 'groups/groupcontents',1);

    register_elgg_event_handler("create","object","blogextended_blog_type_handler");
    register_elgg_event_handler("update","object","blogextended_blog_type_handler");

    register_elgg_event_handler("create","object","blogextended_group_selector_handler");
    register_elgg_event_handler("update","object","blogextended_group_selector_handler");

    $translations = get_installed_translations();
    foreach($translations as $key=>$value){
        elgg_register_tag_metadata_name("category_{$key}");
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
    $blog_type = get_input("category");
    switch($event){
        case "create":
        case "update":
            if(!empty($blog_type)){
                $object->clearMetadata("category");
                $object->set("category",$blog_type);;
                if(!empty($blog_type)){
                    //Registering metadata in all the registered languages for easy localized search
                    $translations = get_installed_translations();
                    foreach($translations as $key=>$value){
                        $var = "category_{$key}";
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

function blogextended_get_categories(){
    $resp = array(
        '--'=>elgg_echo("blogextended:type:other"),
        'blogextended:type:news'=>elgg_echo('blogextended:type:news'),
    );
    return $resp;
}
register_elgg_event_handler('init','system','blogextended_init');

?>
