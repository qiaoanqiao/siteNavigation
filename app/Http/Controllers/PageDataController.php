<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageDataRequest;
use App\Http\Resources\CardCollection;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\LinkCollection;
use App\Models\Card;
use App\Models\Category;
use App\Models\Link;
use App\Models\Option;
use Illuminate\Http\Request;

class PageDataController extends Controller
{
    /**
     * 首页数据获取
     *
     * @param  HomePageDataRequest  $request
     *
     * @return array
     */
    public function homePage(HomePageDataRequest $request)
    {
        $optionData = getOption('siteurl', 'homeurl', 'sitename',
            'sitedescription', 'sitelogo', 'defaultlanguage');

        $categoryModels = Category::with('cards')->Ordered()->get();
        $categoryData = (new CategoryCollection($categoryModels))->toArray($request);

        $categoryDataTree = $this->getTree($categoryData);
        $linkModels = Link::all();
        $linkData = new LinkCollection($linkModels);

        return apiSuccessfulResponseData(compact('linkData', 'optionData', 'categoryData', 'categoryDataTree'));
    }


    public function getTree($data = [], $parent_id = 0, $level = 0)
    {
        $tree = [];
        if ($data && is_array($data)) {
            foreach ($data as $v) {
                if ($v['parent_id'] == $parent_id) {
                    $v['children'] = $this->getTree($data, $v['id'], $level + 1);
                    $tree[] = $v;
                }
            }
        }

        return $tree;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
