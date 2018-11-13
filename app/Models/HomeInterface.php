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
     * @return array
     */
    public function getWidgets() {
        return explode('|', $this->widgets);
    }

    /**
     * @return array
     */
    public function getMyWidgets() {
        if (!$this->activated) {
            $this->activated = 1;
            $this->widgets   = implode('|', HomeWidget::$list);
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
                break;
            case HomeWidget::SUMMARY:
                return view('home.widgets.summary')->render();
                break;
            case HomeWidget::NEWS:
                return view('home.widgets.news')->render();
                break;
            case HomeWidget::ALERT:
                return view('home.widgets.alert')->render();
                break;
            case HomeWidget::TRACKER:
                return view('home.widgets.tracker')->render();
                break;
            case HomeWidget::CALENDAR:
                return view('home.widgets.calendar')->render();
                break;
            case HomeWidget::ACTIVITY:
                return view('home.widgets.activity')->render();
                break;
            case HomeWidget::COMMUNITY:
                return view('home.widgets.community')->render();
                break;
            default:
                return '';
        }
    }

}