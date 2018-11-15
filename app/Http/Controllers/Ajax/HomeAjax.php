<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 15:28
 */

namespace App\Http\Controllers\Ajax;


use App\Constants\SmartAlertType;
use App\Constants\TrackRank;
use App\Http\Controllers\Controller;
use App\Models\HomeInterface;
use App\Models\PureCommunity;
use App\Models\ScheduleEvent;
use App\Models\UserCourse;
use App\Repositories\Content;
use App\Repositories\SmartAlert;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class HomeAjax extends Controller {

    use Ajax;

    /**
     * HomeAjax constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function newAlert(Request $request) {
        if ($request->ajax()) {
            /** @var SmartAlert $alert */
            $alert = new SmartAlert();

            $alert->content = 'Your autoship volume is below the recommended 100 PV level-' . rand(1, 99);
            return $this->ok(['alert' => $alert->content]);
        }
        return $this->badRequest();
    }

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
                return $this->ok(['view' => $view]);
            }
        }
        return $this->badRequest();
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
                return $this->ok();
            }
        }
        return $this->badRequest();
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
                return $this->ok();
            }
        }
        return $this->badRequest();
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

            return $this->ok($res);
        }
        return $this->badRequest();
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
            return $this->ok($data);
        }
        return $this->badRequest();
    }

    /**
     * Get News Feed
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function news(Request $request) {
        if ($request->ajax()) {
            $news = [];
            for ($i = 0; $i < 5; $i++) {
                $c = new Content();

                $c->title      = "Sales Support Holiday Hours {$i}";
                $c->image      = 'https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg';
                $c->created_at = date('Y-m-d H:i');
                $c->text       =
                    "PURE family, just a reminder with the holiday coming up we have specific holiday hours. We wish you a great Labor Day weekend!";

                $news[] = $c;
            }

            $view = view('home.response.news')->with(['news' => $news])->render();
            return $this->ok(['view' => $view]);
        }

        return $this->badRequest();
    }

    /**
     * Get Team Smart Alert Count
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function teamAlerts(Request $request) {
        if ($request->ajax()) {
            $alerts = [];
            foreach (SmartAlertType::types() as $type) {
                $alerts[$type->type] = rand(0, 99);
            }
            return $this->ok($alerts);
        }
        return $this->badRequest();
    }

    /**
     * Get Rank Tracker
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function tracker(Request $request) {
        if ($request->ajax()) {
            $ranks = TrackRank::ranks();
            $curr  = 0;
            $ltv   = rand(0, 9999);
            $stv   = rand(0, 9999);
            foreach ($ranks as $k => $r) {
                if ($ltv >= $r->ltv && $stv >= $r->stv) {
                    $curr = $k;
                }
            }

            return response([
                'curr'  => $curr,
                'ltv'   => $ltv,
                'stv'   => $stv,
                'ranks' => $ranks
            ]);
        }
        return $this->badRequest();
    }

    /**
     * Get Schedule events
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function schedules(Request $request) {
        if ($request->ajax()) {
            $events = [];

            $e                  = new ScheduleEvent();
            $e->title           = 'All Day';
            $e->start           = date('c', strtotime('-1 month'));
            $e->end             = '';
            $e->backgroundColor = '#F8CB00';
            $e->url             = '';
            $events[]           = $e;

            $e        = new ScheduleEvent();
            $e->title = 'Global Convention';
            $e->start = date('c', strtotime(date('Y-m-05 13:28:03')));
            $e->end   = date('c', strtotime(date('Y-m-10')));;
            $e->backgroundColor = '#89C4F4';
            $e->url             = '#';
            $events[]           = $e;

            return response($events);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function activities(Request $request) {
        if ($request->ajax()) {
            $courses = [];
            for ($i = 0; $i < 7; $i++) {
                $c         = new UserCourse();
                $c->id     = $i;
                $c->goal   = "Verbal {$i}";
                $c->title  = "Improve your social ability {$i}";
                $c->date   = date("m/1{$i}/Y");
                $c->end    = "16 January 2014 : 7:45 PM";
                $c->detail = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                                            eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                                            eu, finibus eu ex. Integer efficitur leo eget
                                            dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc.
                                            Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet
                                            molestie elit, vel placerat ipsum. Ut consectetur
                                            odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare,
                                            lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras
                                            commodo id massa at condimentum. Praesent
                                            dignissim luctus risus sed sodales.";

                $courses[] = $c;
            }
            $view = view('home.response.activity')->with(['courses' => $courses])->render();
            return response(['view' => $view]);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function communities(Request $request) {
        if ($request->ajax()) {
            $communities = [];
            for ($i = 0; $i < 7; $i++) {
                $c             = new PureCommunity();
                $c->id         = $i;
                $c->photo      = '/img/users/avatar4.jpg';
                $c->name       = "Nick Larson {$i}";
                $c->likes      = '3.7k';
                $c->comments   = '2.6k';
                $c->created_at = '3 hrs ago';
                $c->content    = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.';


                $communities[] = $c;
            }
            $view = view('home.response.community')->with(['communities' => $communities])->render();
            return response(['view' => $view]);
        }
        return $this->badRequest();
    }

}