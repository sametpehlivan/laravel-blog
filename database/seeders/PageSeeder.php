<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = ['Hakkımızda','Kariyer','Vizyon','Misyon'];
        $count = 1;
        foreach ($pages as $page)
        {
            DB::table('pages')-> insert([
                'name'=>$page,
                'slug'=>str_slug(strtolower($page)),
                'content'=>'Ut reiciendis reprehenderit beatae fuga aliquam sed. Sit blanditiis dolore est nihil dolores. In autem molestiae quo ipsa esse repellendus. Nesciunt rerum magnam odio quia eum. Eos saepe in ea sit accusamus. Aperiam dolore qui voluptatem iusto nisi sed voluptatum. Quae molestias perferendis tempore aspernatur esse soluta itaque. Atque ullam ad ullam tempora rerum. Et vero autem animi repellat dolorem facere ducimus. Et est non unde. Aliquid magnam corporis non odit nam minima. Et est labore magnam consequatur iste. Quod excepturi labore aspernatur illo sequi nesciunt autem. Nesciunt non consequatur sit a modi tempora magni. Saepe et ut et fugiat voluptatem in. Est deserunt molestiae facilis excepturi amet. Ducimus a tempora necessitatibus vitae. Quae nostrum enim autem eos cumque architecto ratione. Sed excepturi sunt non. Inventore ea quis a mollitia. Reiciendis officia error assumenda quo maiores eius deleniti. Quae harum est voluptatem odio quia autem et tempora. Accusantium quis et ipsam quod magni totam placeat. Ut laudantium quod ab incidunt sed. Autem vel corporis eos est. Dolor sed harum praesentium consectetur. At nihil itaque minima necessitatibus aut. Voluptates velit et incidunt et dolor quam. Veniam et est rerum temporibus ut velit.',
                'order'=>$count,
                'created_at'=>now(),

            ]);
            $count ++;
        }
    }
}
