<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 6:16
 */

namespace App\Repositories;


/**
 * @property mixed             id
 * @property mixed             parent_id
 * @property mixed             country
 * @property mixed             name
 * @property mixed             explanation
 * @property mixed             sorting
 * @property mixed             children
 * @property CategoryTranslate _translate
 */
class Category extends RepositoryAbstract {

    private $_translate;

    /**
     * @return Category
     */
    public function transform() {
        $this->_translate = $this->_translate();
        $this->id        = $this->get('id');
        $this->name      = $this->name();
        $this->children  = $this->children();
        return $this;
    }


    /**
     * @return mixed|null
     */
    public function name() {
        return $this->_translate ? $this->_translate->name : $this->get('name');
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
    public function _translate() {
        foreach ($this->_translates() as $translate) {
            if ($this->locale == $translate->locale) {
                return $translate;
            }
        }
        return null;
    }

    /**
     * @return CategoryTranslate[]
     */
    public function _translates() {
        return CategoryTranslate::Items($this->get('translates'), false);
    }

}