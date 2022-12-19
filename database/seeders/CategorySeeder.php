<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['eglence','bilişim','gezi','teknoloji','spor','günlük yaşam'];

        //
       foreach ($categories as $category)
       {
           DB::table('categories')-> insert([
               'name'=>$category,
               'slug'=>str_slug($category),
               'created_at'=>now()
           ]);
       }

    }
}
