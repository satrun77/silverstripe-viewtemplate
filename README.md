silverstripe-viewtemplate
=========================

This module allows CMS administrators to create partial templates that can be re-used in the contnet of the CMS pages.

## Instalation

### 1. Download silverstripe-viewtemplate with composer.

``` bash
$ php composer.phar require moo/viewtemplate:*
```

### 2. Clear CMS cache.
* Login as administrator.
* Navigation to http://yousite.com/dev/build

## Documentation

### 1. Create a view template
* On the left side of the CMS there should be a new menu item labeled "Templates".
* Navigate to the "Templates" page to add a template title and content.
* The content of the template can include SilverStripe markdown syntax.

### 2. Using the view template
* Assuming you have create a template with the following details:
    - Title: Welcome
    - View Template: `<% if $CurrentMember %>Welcome Back, $CurrentMember.FirstName<% end_if %>`
- In the HTML editor you can place `{{Welcome}}` anywhere in the page content.
- The module will replace the placeholder `{{Welcome}}` with the content of the view template.
- By default the plugin is disabled in all page types. You can enable it in the page settings tab **Enable view template**.

## License

This bundle is under the MIT license. View the [LICENSE.md](LICENSE.md) file for the full copyright and license information.