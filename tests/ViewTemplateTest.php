<?php

/**
 * ViewTemplateTest contains test cases for the module classes
 *
 * @author  Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 * @package viewtemplate
 */
class ViewTemplateTest extends FunctionalTest {
	protected static $fixture_file = 'ViewTemplateTest.yml';

	public function testModifyViewTemplate() {
		// Create a template object
		$template = $this->objFromFixture('ViewTemplate', 'template1');

		// Login as admin
		$this->logInWithPermission('ADMIN');

		// Assert: Update the template
		$this->assertNotEmpty($template->Title);
		$template->Title = 'tempalate1_update';
		$template->write();

		$this->assertEquals($template->Title, 'tempalate1_update');
	}

	public function testRenderTemplatePlaceholder() {
		// Create page object
		$page = $this->objFromFixture('Page', 'page1');
		$templateTitle = 'template1';
		$templatePlaceHolder = '{{' . $templateTitle . '}}';

		// Assert: render page
		$this->assertContains($templatePlaceHolder, $page->Content());

		// Create template
		$template = $this->objFromFixture('ViewTemplate', $templateTitle);
		$templatePlaceHolder = '{{' . $template->Title . '}}';

		// Page disable template view
		$page->EnableViewTemplate = false;

		// Assert: render page without view template
		$this->assertContains($templatePlaceHolder, $page->Content());

		// Page enable template view
		$page->EnableViewTemplate = true;

		// Assert: render page with view template
		$this->assertNotContains($templatePlaceHolder, $page->Content());

		// Login admin
		$this->logInWithPermission('ADMIN');

		// Assert: Publish page
		$published = $page->doPublish();
		$this->assertTrue($published);

		// Assert: page visible to public with render view template
		Member::currentUser()->logOut();
		$response = Director::test(Director::makeRelative($page->Link()));
		$this->assertNotContains($templatePlaceHolder, $response->getBody());
		$this->assertContains($template->ViewTemplate, $response->getBody());
	}

	public function testGetSettingsFields() {
		// Login as admin
		$this->logInWithPermission('ADMIN');

		// Create page object
		$page = $this->objFromFixture('Page', 'page1');

		// Get Page settings fields
		$fields = $page->getSettingsFields();
		$field = $fields->dataFieldByName('EnableViewTemplate');

		// Assert view template field is added
		$this->assertTrue($field !== null);
		$this->assertInstanceOf('CheckboxField', $field);
	}

	public function testRenderViewTemplatePlaceholderOnly() {
		// Login admin
		$this->logInWithPermission('ADMIN');

		// Create page object & template
		$page = $this->objFromFixture('Page', 'page2');
		$page->EnableViewTemplate = true;
		$template = $this->objFromFixture('ViewTemplate', 'template2');
		$templatePlaceHolder = '{{' . $template->Title . '}}';

		// Assert: render page with view template
		$content = $page->Content();
		$this->assertNotContains($templatePlaceHolder, $content);
		$this->assertContains('Welcome Back, ADMIN', $content);
		$this->assertContains('$CurrentMember.FirstName', $content);
		$this->assertNotContains('I should not be here! Default Admin', $content);
	}

}
