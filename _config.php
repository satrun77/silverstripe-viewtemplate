<?php

HtmlEditorConfig::get('cms')->enablePlugins(['viewtemplate' => Director::BaseURL() . 'viewtemplate/javascript/tinymce_viewtemplate/editor_plugin_src.js']);
HtmlEditorConfig::get('cms')->addButtonsToLine(1, 'viewtemplate');
