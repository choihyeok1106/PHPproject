<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:35
 * File: local.php
 */
Route::get('/locale/{locale}',
    function ($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('locale');