<?php

namespace Database\Factories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6,true);
        $slug = Str::substr(Str::lower(preg_replace('~[^\pL\d]+~u','-',$title)),0,-1);
        return [
            "title"=>$title,
            "body"=>$this->faker->paragraph(100,true),
            "slug"=>$slug,
            "img"=>'https://via.placeholder.com/600/5611A8/C0C0C0/?text=AlyaLove',
            "created_at"=>$this->faker->dateTimeBetween('-1 years'),
            "published_at"=>Carbon::now(),
        ];
    }
}
