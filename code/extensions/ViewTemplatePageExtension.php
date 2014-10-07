<?php

/**
 * MO_ViewTemplatePageExtension is the admin model class to manage view templates
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class MO_ViewTemplatePageExtension extends DataExtension {
	/**
	 * Page setting field for module status
	 *
	 * @var array
	 */
	private static $db = array(
		"EnableViewTemplate" => "Boolean",
	);

	/**
	 * Override the Content property from the page object
	 *
	 * @return string
	 */
	public function Content() {
		// Page content
		$content = $this->owner->Content;

		// Return original content
		if(!$this->owner->EnableViewTemplate) {
			return $content;
		}

		// Replace placeholders
		return $this->replacePlaceholders($content);
	}

	/**
	 * Replaces placeholders within the $content property their actual value
	 *
	 * @param string $content
	 * @return string
	 */
	public function replacePlaceholders($content) {
		// Find placeholders
		preg_match_all("/{{(.*?)}}/", $this->owner->Content, $matches);

		// If placeholders found
		if(!empty($matches[1])) {
			// Fetch view templates
			$templates = DataObject::get('MO_ViewTemplate')->filter(array(
					'Title' => $matches[1]
				))->getIterator();

			// Replace placeholders with their templates
			foreach($matches[0] as $key => $templateHolder) {
				if($templates->offsetExists($key)) {
					// Remove <p> if TinyMCE added them
					$content = str_replace('<p>' . $templateHolder . '</p>', $templateHolder, $content);
					// Process the template
					$template = SSViewer::fromString($templates->offsetGet($key)->ViewTemplate)->process($this->owner);
					// Replace the placeholder with its template
					$content = str_replace($templateHolder, $template, $content);
				}
			}
		}

		// Set and return content
		$this->owner->Content = $content;

		return $content;
	}

	/**
	 * Add an element to the page settings tab to set the status of this module (enabled or not enabled)
	 *
	 * @param \FieldList $fields
	 */
	public function updateSettingsFields(\FieldList $fields) {
		$field = new FieldGroup(
			new CheckboxField('EnableViewTemplate', _t("ViewTemplate.YES", "Yes"), 0)
		);
		$field->setTitle(_t("ViewTemplate.ViewTemplate", "Enable view template"));
		$fields->addFieldToTab("Root.Settings", $field);
	}

}
