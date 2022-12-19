<?php

    namespace Database\Seeders;


    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;
    use Faker\Factory as Faker;

    class ArticlesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //

            $faker = Faker::create('tr_TR');
            for ($i = 0;$i<20;$i++)
            {
                $flag= true;
               while ($flag)
               {

                   $title =  $faker->sentence(2);
                   $slug = str_slug(strtolower($title));
                   $name = $faker->firstName.' '.$faker->lastName;
                   $category_id =rand(1,6) ;
                   $content = $faker->paragraph(25);
                   $description =$faker->sentence();
                   $created_at =  now();
                   $count = DB::table('articles')->where('slug' ,$slug)->get()->count();
                   if($count ==  0)
                   {
                       $flag = false;
                       DB::table('articles')->insert(
                           [
                               'name' => $name,
                               'category_id'=> $category_id,
                               'content' => $content,
                               'description' => $description,
                               'title' => $title,
                               'slug' => $slug,
                               'created_at' => $created_at
                           ]);
                   }

               }



            }
        }
    }
