<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class Post_old {

    public $title;

    public $excerpt;

    public $body;

    public $date;

    public $slug;


    public function __construct($title, $excerpt, $body, $date, $slug ){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function all () {
        //need to return all posts

        return cache()->rememberForever('posts.all', function(){
            return collect(File::files(resource_path("posts/")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->body(),
                    $document->date,
                    $document->slug
                )
            )
            ->sortByDesc('date');
        });
    }

    public static function find ($slug) {
        // if ( ! file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     //return redirect("/"); //redirect is not the job of this method
        //     // abort(404); //this is also not the job of find method
        //         // dd('modd');
        //     throw new ModelNotFoundException('model not foundd');
        // }

        // return Cache::remember("post.{$slug}", 5, fn() => file_get_contents($path));
        
        $post = static::all()->firstWhere('slug',$slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }

}