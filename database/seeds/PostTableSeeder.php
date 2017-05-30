<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //array('title', 'author', 'description', 'posted_date', 'keyword');
        Post::create([
            'title'       => 'Fallen Love',
            'author'      => 'sid apple',
            'description' => 'lorem ipsum dolar sit amet',
            'posted_date' => '2012-03-23',
            'keyword'     => 'hello, there',

        ]);

        Post::create([
            'title'       => 'In the beach',
            'author'      => 'marley sid',
            'description' => 'lorem ipsum dolar sit amet. orem ipsum dolar sit amet. orem ipsum dolar sit amet. ',
            'posted_date' => '2012-02-04',
            'keyword'     => 'in, beach',

        ]);

          Post::create([
            'title'       => 'Crazy days',
            'author'      => 'Ray',
            'description' => 'This is another description',
            'posted_date' => '2012-04-11',
            'keyword'     => 'crazy, door',

        ]);
    }
}
