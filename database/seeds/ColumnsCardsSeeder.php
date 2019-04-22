<?php

use App\Models\CardReferee;
use App\Models\Category;
use App\Models\Link;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ColumnsCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //卡片分类表
        $categorysParent = [];
        $categorys = factory(Category::class)->times(10)->make()
            ->each(function ($category, $index) use (&$categorysParent) {
                $boolean = random_int(0, 1);
                if ($boolean && $index > 1) {
                    $category->parent_id = $index - 1;
                    $categorysParent[] = $category->parent_id;
                } else {
                    $category->parent_id = 0;
                }
            });

        Category::insert($categorys->toArray());


        // 卡片表
        // 获取 Faker 实例

        // 生成数据集合
        $cards = factory(\App\Models\Card::class)
            ->times(20)
            ->make()
            ->each(function ($card, $index) use ($categorysParent) {
                $card->category_id = array_random($categorysParent);
            });
        \App\Models\Card::query()->insert($cards->toArray());

        //友情链接表
        $links = factory(Link::class)->times(50)->make()->each(function (
            $link,
            $index
        ) {

        });

        Link::insert($links->toArray());

        $card_referees = factory(CardReferee::class)->times(50)->make()
            ->each(function ($card_referee, $index) {

            });

        CardReferee::insert($card_referees->toArray());
    }
}
