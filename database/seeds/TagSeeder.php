<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['community', 'fullstack developers', 'backend developers', 'laravel devs', 'devops'];

        foreach($tags as $tag){
            $_tag = New Tag();

            $_tag->name = $tag;
            $_tag->slug = Str::slug($_tag->name);

            $_tag->save();
        }

    }
}
