<?php

/**
 * MO_ViewTemplate is the database model class for the view template table
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class MO_ViewTemplate extends DataObject {
	public static $db = array(
		'Title'			 => 'Varchar(127)',
		'ViewTemplate'	 => 'Text',
	);

	/**
	 * Human-readable singular name.
	 * @var string
	 * @config
	 */
	private static $singular_name = 'View Template';

	/**
	 * Human-readable plural name
	 * @var string
	 * @config
	 */
	private static $plural_name = 'View Templates';

	/**
	 * The DataModel from this this object comes
	 */
	protected $model = 'ViewTemplate';

}
