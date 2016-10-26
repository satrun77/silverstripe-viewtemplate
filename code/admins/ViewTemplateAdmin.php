<?php

/**
 * ViewTemplateAdmin is the admin model class to manage view templates.
 *
 * @author  Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 *
 * @package viewtemplate
 */
class ViewTemplateAdmin extends ModelAdmin
{
    private static $url_segment    = 'viewtemplates';
    private static $menu_title     = 'Templates';
    private static $managed_models = ['ViewTemplate'];
    private static $menu_icon      = 'viewtemplate/images/icon.png';
}
