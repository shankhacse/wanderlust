/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	/*
		config.filebrowserBrowseUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
	   config.filebrowserImageBrowseUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
	   config.filebrowserFlashBrowseUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
	   config.filebrowserUploadUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
	   config.filebrowserImageUploadUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
	   config.filebrowserFlashUploadUrl = 'https://www.mantrahealthclub.com/blog/assets/bower_components/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';
	  */ 
	config.extraPlugins = 'autogrow';
	config.autoGrow_minHeight = 200;
	config.autoGrow_maxHeight = 600;
	config.autoGrow_bottomSpace = 50;
};