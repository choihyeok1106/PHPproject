/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	  { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	  { name: 'colors', groups: [ 'colors' ] },
	  { name: 'basicstyles', groups: [ 'basicstyles'] },
	  { name: 'others', groups: [ 'others' ] },
	  { name: 'links', groups: [ 'links' ] },
	  { name: 'insert', groups: [ 'insert' ] },
	  { name: 'paragraph', groups: [ 'list', 'align', ] },
	  { name: 'about', groups: [ 'about' ] },
	  { name: 'styles', groups: [ 'styles' ] }
   ];
   config.removeButtons = 'About,Maximize,\\\PasteFromWord';
	config.format_tags = 'p;h1;h2;h3;pre';
	config.filebrowserUploadUrl = '/upload/upload.php'
};
