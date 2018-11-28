/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/


CKEDITOR.config.extraPlugins = 'photobucket','flickr';


CKEDITOR.config.toolbar = 'Full';
CKEDITOR.config.toolbar_Full =
[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    //['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['BidiLtr', 'BidiRtl'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize','ShowBlocks','-','About','photobucket']
];



CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = 500;
	config.height = 960;  
    
    config.filebrowserUploadUrl = '/ckupload.php';
    config.baseHref = "http://www.gosocialcms.com/";
    config.filebrowserBrowseUrl = 'http://192.168.2.206/gosocialcms/js/ckfinder/ckfinder.html';
    config.filebrowserWindowWidth = '800';
    config.filebrowserWindowHeight = '700';
    //config.baseDir = 'd:\inetpub\wwwroot\www.yourdomain.com\website\assets\images\';
    
};


CKEDITOR.on('instanceReady', function (ev) {
// Ends self closing tags the HTML4 way, like <br>.
ev.editor.dataProcessor.htmlFilter.addRules(
    {
        elements:
        {
            $: function (element) {
                // Output dimensions of images as width and height
                if (element.name == 'img') {
                    var style = element.attributes.style;

                    if (style) {
                        // Get the width from the style.
                        var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                            width = match && match[1];

                        // Get the height from the style.
                        match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                        var height = match && match[1];

                        if (width) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                            element.attributes.width = width;
                        }

                        if (height) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                            element.attributes.height = height;
                        }
                    }
                }
                if (!element.attributes.style)
                    delete element.attributes.style;

                return element;
            }
        }
    });
});
