<?php

/**
 * MO_ViewTemplateAdmin is the admin model class to manage view templates
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class MO_ViewTemplateAdmin extends ModelAdmin {
	public static $url_segment = 'templates';
	public static $menu_title = 'Templates';
	public static $managed_models = array('Mo_ViewTemplate');
	public static $menu_icon = 'viewtemplate/images/icon.png';

}
