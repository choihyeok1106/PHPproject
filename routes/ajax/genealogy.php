<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:26
 * File: genealogy.php
 */

Route::get('/a/genealogy/binary', 'Ajax\GenealogyAjax@binary');
Route::get('/a/genealogy/binary/{repNumber}', 'Ajax\GenealogyAjax@binary');
Route::get('/a/genealogy/{repNumber}', 'Ajax\GenealogyAjax@view');