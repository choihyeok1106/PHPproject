<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 15:28
 */

namespace App\Http\Controllers\Ajax;


use App\Constants\SmartAlertType;
use App\Http\Controllers\Controller;
use App\Models\HomeInterface;
use App\Repositories\Content;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class HomeAjax extends Controller {

    /**
     * Get User Widgets
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function getInterface(Request $request) {
        if ($request->ajax()) {
            /** @var HomeInterface $user */
            $interface = HomeInterface::find(UserPrefs::get('id'));
            if ($interface) {
                $view = view('home.popup.widget-setting')->with(['interface' => $interface])->render();
                return response(['view' => $view]);
            }
        }
        return response(['error' => 'Bad request']);
    }

    /**
     * Widget Interface Settings
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function setInterface(Request $request) {
        if ($request->ajax()) {
            $widgets = $request->get('widgets');
            /** @var HomeInterface $interface */
            $interface = HomeInterface::find(UserPrefs::get('id'));
            if ($interface) {
                $old                = $interface->getWidgets();
                $intersect          = array_intersect($old, $widgets);
                $diff               = array_diff($widgets, $intersect);
                $new                = array_merge($intersect, $diff);
                $interface->widgets = implode('|', $new);
                $interface->save();
                return response(['message' => 'OK']);
            }
        }
        return response(['error' => 'Bad request']);
    }

    /**
     * Set User's Widget Sorting
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sortingInterface(Request $request) {
        if ($request->ajax()) {
            $widgets = $request->get('widgets');
            /** @var HomeInterface $interface */
            $interface = HomeInterface::find(UserPrefs::get('id'));
            if ($interface) {
                $interface->widgets = implode('|', $widgets);
                $interface->save();
                return response(['message' => 'OK']);
            }
        }
        return response(['error' => 'Bad request']);
    }

    /**
     * Get Banners
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function banners(Request $request) {
        if ($request->ajax()) {
            $data = [
                [
                    'title' => "READY. SET. RECRUIT.1",
                    'text'  => 'Jump-start your business and join fellow IBOs in the Race to Recruit, from July 17-30, 2018. This is your time to shine and earn
                    free registration to PURE Xcelerate in October! We...1',
                    'image' => 'https://gplivepurecomsite.files.wordpress.com/2018/08/watermelon_8_2_18-002.jpg',
                    'url'   => '#'
                ],
                [
                    'title' => "READY. SET. RECRUIT.2",
                    'text'  => 'Jump-start your business and join fellow IBOs in the Race to Recruit, from July 17-30, 2018. This is your time to shine and earn
                    free registration to PURE Xcelerate in October! We...2',
                    'image' => 'https://gplivepurecomsite.files.wordpress.com/2018/07/autoship2_7_30_18.jpg',
                    'url'   => '#'
                ],
                [
                    'title' => "READY. SET. RECRUIT.3",
                    'text'  => 'Jump-start your business and join fellow IBOs in the Race to Recruit, from July 17-30, 2018. This is your time to shine and earn
                    free registration to PURE Xcelerate in October! We...3',
                    'image' => 'https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg',
                    'url'   => '#'
                ],
            ];

            $res = [];
            foreach ($data as $v) {
                $c = new Content();

                $c->title = $v['title'];
                $c->text  = $v['text'];
                $c->image = $v['image'];
                $c->link  = $v['url'];

                $res[] = $c;
            }

            return response($data);
        }
        return response(['error' => 'Bad request']);
    }

    /**
     * Get Business Summary
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function summaries(Request $request) {
        if ($request->ajax()) {
            $data = [];
            for ($i = 0; $i < 2; $i++) {
                $data[] = [
                    'pv'    => [
                        'val' => rand(0, 999),
                        'per' => rand(-100, 100),
                    ],
                    'last4' => [
                        'val'    => rand(0, 999),
                        'active' => rand(0, 1),
                    ],
                    'rank'  => [
                        'name'  => 'Ambassador Black Diamond',
                        'short' => 'AMBD',
                    ],
                    'stv'   => [
                        'val' => rand(0, 9999),
                        'per' => rand(-100, 100),
                    ],
                    'ltv'   => [
                        'val' => rand(0, 9999),
                        'per' => rand(-100, 100),
                    ],
                    'rtv'   => [
                        'val' => rand(0, 9999999),
                        'per' => rand(-100, 100),
                    ],
                    'last7' => [
                        'val' => rand(0, 999),
                        'per' => rand(-100, 100),
                    ],
                    'psa'   => [
                        'left'  => rand(0, 99),
                        'right' => rand(0, 99),
                    ],
                ];
            }
            return response($data);
        }
        return response(['error' => 'Bad request']);
    }

    /**
     * Get News Feed
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function news(Request $request) {
        if ($request->ajax()) {
            $data = [];
            for ($i = 0; $i < 3; $i++) {
                $data[] = [
                    'image' => 'https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg',
                    'title' => 'Sales Support Holiday Hours' . ($i + 1),
                    'date'  => date('Y-m-d H:i'),
                    'text'  => 'PURE family, just a reminder with the holiday coming up we have specific holiday hours. We wish you a great Labor Day weekend!'
                ];
            }
            $res = [];
            foreach ($data as $v) {
                $c = new Content();

                $c->title = $v['title'];
                $c->text  = $v['text'];
                $c->image = $v['image'];
                $c->date  = $v['date'];

                $res[] = $c;
            }

            return response($res);
        }

        return response(['error' => 'Bad request']);
    }

    public function teamAlerts(Request $request) {
        if ($request->ajax()) {
            $res = [];
            foreach (SmartAlertType::types() as $type) {
                $res[$type->type] = rand(0, 99);
            }
            return response($res);
        }
        return response(['error' => 'Bad request']);
    }

}