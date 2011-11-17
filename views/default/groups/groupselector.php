<?php
/**
 * Blog owner selector view
 *
 * @package ElggBlogExtended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Diego Andrés Ramírez Aragón <dramirezaragon@gmail.com>
 * @copyright Corporación Somos más - 2009; Diego Andrés Ramirez Aragón 2010
 * @link http://github.com/lowfill/blogextended
 */

if(get_plugin_setting("groupcontents","blogextended")=="yes"){

    $field_label = elgg_echo("content:owner");
    if(isset($vars["label"])){
        $field_label = $vars["label"];
    }

    $value = "";
    if(isset($vars["entity"])){
        $value = $vars["entity"]->content_owner;
    }

    $options_values = array(get_loggedin_userid()=>elgg_echo("my:profile"));

    $options = array('relationship'=>'member',
    				 'relationship_guid'=>page_owner(),
    				 'inverse_relationship'=>false,
    				 'types'=>'group',
    				 'limit'=>50);
    
    $count = elgg_get_entities_from_relationship(array_merge($options,array('count'=>true)));
	if($count>0){
    for($i=0;$i<$count;$i+=50){
    	$options['offset']=$i;
	    $objects = elgg_get_entities_from_relationship($options);
	    if(!empty($objects)){
	        foreach($objects as $object){
	            $options_values["{$object->guid}"]=$object->name;
	        }
	    }
    }
?>
<p><label><?php echo $field_label; ?></label><br />
    <?php echo elgg_view("input/pulldown",array("internalname"=>"container_guid",
    											"options_values"=>$options_values,
    											"value"=>$value)); ?>
</p>
<?php
    }
}
?>