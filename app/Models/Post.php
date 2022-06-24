<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Cache;



class Post {
    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;

    public function __construct($title, $excerpt, $body, $date, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }
    
    public static function find($slug){
/*         $path = resource_path("/../resources/posts/{$url}.html");

        if(!file_exists($path)){
            throw new ModelNotFoundException();
        }
        
        return cache()->remember("posts/{$url}", 1200, fn() =>  file_get_contents($path)); */


        $posts = static::all();

        return $posts->firstWhere('slug', $slug);



    }

    public static function all(){
        /* 
        $files = File::files(resource_path("posts"));

        $posts = collect($files)->
            map(function($file){
                return YamlFrontMatter::parseFile($file);})->
            map(function($document){
                return new Post( $document->title, $document->excerpt,
                    $document->body(), $document->date, $document->slug);
                })->sortByDesc('date');
        return $posts; */
 
        return cache()->rememberForever('posts.all', function(){
                return collect(File::files(resource_path("posts")))->
                    map(function($file){
                            return YamlFrontMatter::parseFile($file);
                        })->
                    map(function($document){
                        return new Post( $document->title, $document->excerpt,
                            $document->body(), $document->date, $document->slug);
                    })->
                    sortByDesc('date');
        });
    }
}