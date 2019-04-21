<?php

    use App\Models\Category;
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

        $categorysParent = [];
        $categorys = factory(Category::class)->times(10)->make()->each(function ($category, $index) use (&$categorysParent) {
            $boolean = random_int(0, 1);
            if ($boolean && $index > 1) {
                 $category->parent_id = $index - 1;
                 $categorysParent[] = $category->parent_id;
            } else {
                $category->parent_id = 0;
            }
        });

        Category::insert($categorys->toArray());


        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 生成数据集合
        $cards = factory(\App\Models\Card::class)
            ->times(20)
            ->make()
            ->each(function ($card, $index) use ($faker, $categorysParent) {
                $card->category_id = array_random($categorysParent);
            });
        \App\Models\Card::query()->insert($cards->toArray());
    }
}
