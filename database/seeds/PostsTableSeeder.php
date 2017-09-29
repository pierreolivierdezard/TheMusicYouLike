<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "Bob's Post 1",
            'message' => "Bob's public post",
            'image' => 'posts_images/pinkFloyd.png',
            'privacy' => 'public',
            'user_id' => 1,
            'created_at' => '2017-07-17 21:22:17',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Bob's Post 2",
            'message' => "Bob's friends post",
            'image' => 'posts_images/guns.jpg',
            'privacy' => 'friends',
            'user_id' => 1,
            'created_at' => '2017-06-29 09:39:01',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Bob's Post 3",
            'message' => "Bob's private post",
            'image' => 'posts_images/oasis.jpg',
            'privacy' => 'private',
            'user_id' => 1,
            'created_at' => '2017-05-22 13:04:56',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Oasis",
            'message' => "Oasis is one of my favorite band",
            'image' => 'posts_images/oasis.jpg',
            'privacy' => 'public',
            'user_id' => 2,
            'created_at' => '2013-01-23 13:23:46',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Guns",
            'message' => "Slash is the best, omg",
            'image' => 'posts_images/guns.jpg',
            'privacy' => 'private',
            'user_id' => 2,
            'created_at' => '2015-06-12 03:04:56',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Pink Floyd",
            'message' => "I can play Wish You Were Here on the guitar guys !",
            'image' => 'posts_images/pinkFloyd.png',
            'privacy' => 'friends',
            'user_id' => 2,
            'created_at' => '2001-11-01 09:04:16',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Donald Trump",
            'message' => "Donald is such a Pig #animals",
            'image' => 'posts_images/pinkFloyd.png',
            'privacy' => 'private',
            'user_id' => 2,
            'created_at' => '2009-04-12 15:14:36',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Wonderwall",
            'message' => "Today is gonna be the day that they're gonna throw it back to you",
            'image' => 'posts_images/oasis.jpg',
            'privacy' => 'friends',
            'user_id' => 2,
            'created_at' => '2004-12-01 19:56:56',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "URGENT: I LOST MY KEYS",
            'message' => "Last time i saw them was last monday :'(",
            'image' => 'posts_images/guns.jpg',
            'privacy' => 'private',
            'user_id' => 2,
            'created_at' => '2011-10-21 23:04:16',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Axl Rose",
            'message' => "Does he look like a hobbo ? Yes.",
            'image' => 'posts_images/guns.jpg',
            'privacy' => 'public',
            'user_id' => 2,
            'created_at' => '2014-01-01 00:04:19',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "The Wall Tour",
            'message' => "Pink Floyd without David Gilmour is not the same, but that was a great show.",
            'image' => 'posts_images/pinkFloyd.png',
            'privacy' => 'friends',
            'user_id' => 2,
            'created_at' => '2011-06-14 20:34:43',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "THAT'S A FIGHT !",
            'message' => "Did you see gallaghers brothers fighting each other at Rock en Seine ?",
            'image' => 'posts_images/oasis.jpg',
            'privacy' => 'public',
            'user_id' => 2,
            'created_at' => '2011-07-30 19:54:00',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'title' => "Shine on your crazy diamond",
            'message' => "Now there's a look in your eye ... Like black hole in the sky !",
            'image' => 'posts_images/pinkFloyd.png',
            'privacy' => 'private',
            'user_id' => 2,
            'created_at' => '1960-02-09 12:12:12',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
