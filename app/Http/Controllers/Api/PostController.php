<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::with(['category', 'tags'])->paginate(4);

        $tags = Tag::all();
        $categories = Category::all();

        return response()->json(compact('posts', 'tags', 'categories'));
    } 

    public function show($slug){

        $post = Post::where('slug', $slug)->with(['tags','category'])->first();
        
        return response()->json($post);
    }

    public function getPostsByCategories($slug_category){
      
        $category = Category::where('slug', $slug_category)->with('posts.tags')->first();
        $success = true;
        $error = '';

        if(!$category){
            $success = false;
            $error = 'La categoria non esiste';
        }elseif ($category && count($category['posts']) === 0) {
            $success = false;
            $error = 'Non ci sono contenuti nella categoria selezionata';
        }

        return response()->json(compact('category', 'error', 'success'));
    }

    public function getPostsByTags($slug_tag){
        $tag = Tag::where('slug', $slug_tag)->with('posts.category')->first();
        $success = true;
        $error = '';

        if(!$tag){
            $success = false;
            $error = 'Il tag non esiste';
        }elseif($tag && count($tag['posts']) === 0){
            $success = false;
            $error = 'Non ci sono contenuti con il tag selezionato';
        }

        return response()->json(compact('tag', 'success', 'error'));
    }
}
