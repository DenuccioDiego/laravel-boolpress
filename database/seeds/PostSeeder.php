<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        for ($i = 0; $i < 10; $i++){
            
            $post = new Post();

            $post->title = $faker->sentence(3);
            $post->slug = Str::slug($post->title);
            $post->image = $faker->imageUrl(800, 600, 'Posts', true, $post->title);
            $post->sub_title = $faker->sentence(5);
            $post->description = $faker->paragraph(10, true);
 
            $post -> save();

        }
    }
}
