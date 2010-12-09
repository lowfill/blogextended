<?php

	/**
	 * Elgg blog listing
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2010
	 * @link http://elgg.com/
	 */
		$owner = $vars['entity']->getOwnerEntity();
		$friendlytime = elgg_view_friendly_time($vars['entity']->time_created);
		$content_owner = $vars['entity']->container_guid;
		if(get_plugin_setting("iconoverwrite","blogextended")== "yes" && !empty($content_owner)){
		    $icon = elgg_view("profile/icon",array('entity' => get_entity($content_owner), 'size' => 'tiny','entity_id'=>$vars['entity']->guid));
		}
		else{
		    $icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny','entity_id'=>$vars['entity']->guid));
		}
		
		$info = "<p>" . elgg_echo('blog') . ": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a></p>";
		$info .= "<p class=\"owner_timestamp\"><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</p>";
		echo elgg_view_listing($icon,$info);

?>