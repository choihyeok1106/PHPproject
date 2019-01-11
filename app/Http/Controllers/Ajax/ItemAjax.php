<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 16:32
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\ItemCache;
use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ItemsCriteria;
use App\Repositories\Category;
use App\Repositories\Item;
use App\Repositories\ItemsSearch;
use App\Services\ItemService;
use App\Supports\UserPrefs;

class ItemAjax extends AjaxController {

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function categories() {
        $data = ItemCache::categories();
        return $this->ok(Category::Items($data));
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index() {
        $query = $this->string('query');
        /** @var ItemsCriteria $c */
        $c = ItemsCriteria::new();
        if ($query) {
            $c->query($query);
        } else {
            $c->category   = $this->int('category', 0, 0);
            $c->search     = $this->string('search');
            $c->sorting    = $this->string('sorting');
            $c->tag        = '';
            $c->targetneed = '';
            $c->page       = 1;
        }
        $c->limit = env('ITEMS_PAGE_PER', 24);
        //        $c->level      = Rank::IBO;
        $c->type       = ItemPriceType::Wholesale;
        $c->legend     = ItemLegend::Catalog;
        $c->virtual    = 0;
        $c->enrollment = 0;
        $data          = ItemCache::search($c);
        return $this->ok(ItemsSearch::Items($data, true, $c->set('level', UserPrefs::level())));
    }

    /**
     * @param string $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function item($sku) {
        $data = ItemCache::item($sku);
        $c        = ItemsCriteria::new();
        $c->level = UserPrefs::level();
        $c->type  = ItemPriceType::Wholesale;
        return $this->ok(Item::Item($data, false, $c));
    }

    /**
     * @param $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function stocks($sku) {
        $svc = ItemService::stocks($sku);
        return $this->ok($svc->data());
    }

}