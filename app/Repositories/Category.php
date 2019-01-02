<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 6:16
 */

namespace App\Repositories;


/**
 * @property mixed               id
 * @property mixed               parent_id
 * @property mixed               country
 * @property mixed               name
 * @property mixed               explanation
 * @property mixed               sorting
 * @property mixed               children
 * @property CategoryTranslate   translate
 * @property CategoryTranslate[] translates
 */
class Category extends RepositoryAbstract {

    /**
     * @return Category
     */
    public function transform() {
        $this->id       = $this->get('id');
        $this->name     = $this->name();
        $this->children = $this->children();
        return $this;
    }


    /**
     * @return mixed|null
     */
    public function name() {
        $translate = $this->translate();
        return $translate ? $translate->name : $this->get('name');
    }

    /**
     * @return array
     */
    public function children() {
        return Category::Items($this->get('children'), false);
    }

    /**
     * @return CategoryTranslate
     */
    public function translate() {
        $translates = $this->translates();
        foreach ($translates as $translate) {
            if ($this->locale == $translate->locale) {
                return $translate;
            }
        }
        return null;
    }

    /**
     * @return CategoryTranslate[]
     */
    public function translates() {
        return CategoryTranslate::Items($this->get('translates'), false);
    }

}