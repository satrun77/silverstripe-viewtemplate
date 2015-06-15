<?php

/**
 * ViewTemplate is the database model class for the view template table
 *
 * @author  Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class ViewTemplate extends DataObject {
	private static $db = [
		'Title'        => 'Varchar(127)',
		'ViewTemplate' => 'Text',
	];

	/**
	 * Human-readable singular name.
	 *
	 * @var string
	 * @config
	 */
	private static $singular_name = 'View Template';

	/**
	 * Human-readable plural name
	 *
	 * @var string
	 * @config
	 */
	private static $plural_name = 'View Templates';

}
