<?php

/**
 * ViewTemplateAdmin is the admin model class to manage view templates
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class ViewTemplateAdmin extends ModelAdmin {
	public static $url_segment = 'viewtemplates';
	public static $menu_title = 'Templates';
	public static $managed_models = array('ViewTemplate');
	public static $menu_icon = 'viewtemplate/images/icon.png';

}
