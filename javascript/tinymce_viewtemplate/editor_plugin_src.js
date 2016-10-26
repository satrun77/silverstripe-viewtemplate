(function () {
    if (jQuery.inArray(tinymce.settings.language, ['en']) != -1) {
        tinymce.PluginManager.requireLangPack("viewtemplate");
    }

    tinymce.create('tinymce.plugins.ViewTemplate', {
        getInfo: function () {
            return {
                longname: this.editor.getLang('tinymce_viewtemplate.longname'),
                author: 'Mohamed Alsharaf',
                authorurl: 'http://my.geek.nz',
                version: "1.0.1"
            };
        },
        createControl: function (n, cm) {
            var t = this, ed = cm.editor;
            if (n !== 'viewtemplate') {
                return null;
            }

            var list = cm.createListBox('viewtemplate', {
                title: ed.getLang('tinymce_viewtemplate.viewtemplates'),
                onselect: function (v) {
                    if (v != '') {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', false, '{{' + v + '}}');
                    }
                }
            });

            jQuery.each(tinyMCE.activeEditor.settings.viewtemplate, function (value, label) {
                list.add(value, label);
            });

            return list;
        }
    });

    tinymce.PluginManager.add("viewtemplate", tinymce.plugins.ViewTemplate);
})();
