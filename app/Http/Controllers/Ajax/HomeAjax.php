<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 15:28
 */

namespace App\Http\Controllers\Ajax;


use App\Constants\HomeWidget;
use App\Http\Controllers\Controller;
use App\Repositories\Content;
use App\Supports\UserPrefs;
use Illuminate\Support\Facades\DB;

class HomeAjax extends Controller {

    public function getSettings() {
        $user = DB::table('home_interfaces')->where('id', UserPrefs::get('id'))->get();
        dd($user);
        exit;
        return 123;
    }

    public function banners() {
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

        return response($res);
    }

    public function summaries() {
        HomeWidget::
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

    public function news() {
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

}