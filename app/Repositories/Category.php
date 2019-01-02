<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 6:16
 */

namespace App\Repositories {

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
            return $this->translate ? $this->translate->name : $this->get('name');
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
            foreach ($this->translates as $translate) {
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

    /**
     * @property null locale
     * @property null name
     */
    class CategoryTranslate extends RepositoryAbstract {

        /**
         * @return CategoryTranslate
         */
        public function transform() {
            $this->locale = $this->get('locale');
            $this->name   = $this->get('name');
            return $this;
        }
    }

}