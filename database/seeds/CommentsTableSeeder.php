<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'comment' => "Wow, this is amazing !",
            'post_id' => 6,
            'user_id' => 6,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Yeah, that is pretty cool",
            'post_id' => 6,
            'user_id' => 10,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "I like Guns&Roses too !",
            'post_id' => 5,
            'user_id' => 5,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "They are playing at le Stade de France",
            'post_id' => 5,
            'user_id' => 8,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Ok we have to see them, let's have tickets !",
            'post_id' => 5,
            'user_id' => 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Today is gonna be the day That they're gonna throw it back to you ... :-)",
            'post_id' => 4,
            'user_id' => 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Who play guitar around here ?",
            'post_id' => 5,
            'user_id' => 2,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "I do",
            'post_id' => 5,
            'user_id' => 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Are you up for a jam ? Like playing some good rock songs",
            'post_id' => 5,
            'user_id' => 2,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Yeah ! What are you playing ? Drums ?",
            'post_id' => 5,
            'user_id' => 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Yeah i do ! I can sing too",
            'post_id' => 5,
            'user_id' => 2,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Sweet, i sing too ! Man, let's make a band !",
            'post_id' => 5,
            'user_id' => 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'comment' => "Hell yeah ! :D",
            'post_id' => 5,
            'user_id' => 2,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
