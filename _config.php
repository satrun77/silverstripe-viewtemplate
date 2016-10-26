<?php

// enable shortcodable buttons and add to HtmlEditorConfig
$htmlEditorNames = Config::inst()->get('ViewTemplate', 'htmleditor_names');
if (is_array($htmlEditorNames)) {
    foreach ($htmlEditorNames as $htmlEditorName) {
        HtmlEditorConfig::get($htmlEditorName)->enablePlugins(['viewtemplate' => Director::BaseURL() . 'viewtemplate/javascript/tinymce_viewtemplate/editor_plugin_src.js']);
        HtmlEditorConfig::get($htmlEditorName)->addButtonsToLine(1, 'viewtemplate');
    }
}
