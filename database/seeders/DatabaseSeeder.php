<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(5)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::factory(50)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'body' => 'body Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'body' => 'body Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'category_id' => 1,
        //     'user_id' => 2,
        // ]);

        // Post::create([
        //     'title' => 'Judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'body' => 'body Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Empat',
        //     'slug' => 'judul-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'body' => 'body Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusantium, maiores, cupiditate iusto ratione necessitatibus libero adipisci, debitis officia aut ab ducimus quaerat at et fugiat? Ullam facilis beatae ea!',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
