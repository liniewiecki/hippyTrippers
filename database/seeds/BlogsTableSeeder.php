<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blog_one = new Blog();
        $blog_one->title = 'Administrator';
        $blog_one->body = 'Administrator bodydydydydydydy';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'Subscriber';
        $blog_two->body = 'Subscriber ervetbwr brtbretbwr tbwretbwwr';
        $blog_two->save();


    }
}
