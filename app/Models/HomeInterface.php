<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-12
 * Time: 12:20
 */

namespace App\Models;


use App\Constants\HomeWidget;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed widgets
 * @property mixed activated
 */
class HomeInterface extends Model {

    protected $fillable = ['widgets'];

    /**
     * @param $widget
     * @return bool
     */
    public function hasWidget($widget) {
        $widgets = $this->getWidgets();
        return in_array($widget, $widgets);
    }

    /**
     * @return string[]
     */
    public function getWidgets() {
        return explode('|', $this->widgets);
    }

    /**
     * @return string[]
     */
    public function getMyWidgets() {
        if (!$this->activated) {
            $this->activated = 1;
            $this->widgets   = implode('|', array_unique(HomeWidget::$list));
            $this->save();
        }
        return explode('|', $this->widgets);
    }

    /**
     * @param string $widget
     * @return string
     * @throws \Throwable
     */
    public function getView($widget) {
        switch ($widget) {
            case HomeWidget::BANNER:
                return view('home.widgets.banner')->render();
            case HomeWidget::SUMMARY:
                return view('home.widgets.summary')->render();
            case HomeWidget::NEWS:
                return view('home.widgets.news')->render();
            case HomeWidget::ALERT:
                return view('home.widgets.alert')->render();
            case HomeWidget::TRACKER:
                return view('home.widgets.tracker')->render();
            case HomeWidget::CALENDAR:
                return view('home.widgets.calendar')->render();
            case HomeWidget::ACTIVITY:
                return view('home.widgets.activity')->render();
            case HomeWidget::COMMUNITY:
                return view('home.widgets.community')->render();
            default:
                return '';
        }
    }

}