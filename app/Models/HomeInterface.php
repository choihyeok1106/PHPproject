<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-12
 * Time: 12:20
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed      id
 * @property mixed      user_id
 * @property mixed      widget_id
 * @property mixed      enable
 * @property mixed      sorting
 * @property HomeWidget widget
 */
class HomeInterface extends Model {

    use ModelTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function widget() {
        return $this->hasOne(HomeWidget::class, 'id', 'widget_id');
    }

    /**
     * echo widget view html
     */
    public function render() {
        if ($this->enable) {
            try {
                echo view("home.widgets.{$this->widget->widget}")->with('id', $this->widget_id)->render();
            } catch (\Throwable $e) {

            }
        }
    }

}