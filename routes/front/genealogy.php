<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:38
 * File: genealogy.php
 */

// genealogy
Route::get('/genealogy', 'GenealogyController@binary')->name('genealogy.binary');
Route::get('/genealogy/sponsor', 'GenealogyController@sponsor')->name('genealogy.sponsor');