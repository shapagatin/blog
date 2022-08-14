<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        // $user = User::factory()->create();
        
        // User::factory()
        // ->count(10)
        // ->create();

        // Category::factory()
        // ->count(10)
        // ->create();

        $user1 = User::factory()->create([
            'name' => 'Jon Doe'
        ]);

        Post::factory(5)
        ->create([
            'user_id' => $user1->id
        ]);

        $user2 = User::factory()->create([
            'name' => 'Mary Jane'
        ]);

        Post::factory(5)
        ->create([
            'user_id' => $user2->id
        ]);

        // $family = Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $work = Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);

        // $hobbies = Category::create([
        //     'name'=>'Hobbies',
        //     'slug'=>'hobbies'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'title' => 'my family post',
        //     'category_id' => $family->id,
        //     'slug' => 'family post',
        //     'excerpt' => 'excerpt of family post',
        //     'body' => '<p>body of the family post</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'title' => 'my work post',
        //     'category_id' => $work->id,
        //     'slug' => 'work post',
        //     'excerpt' => 'excerpt of work post',
        //     'body' => '<p>body of the work post</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'title' => 'my hobby post',
        //     'category_id' => $hobbies->id,
        //     'slug' => 'hobby post',
        //     'excerpt' => 'excerpt of hobby post',
        //     'body' => 'body of the hobby post'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
