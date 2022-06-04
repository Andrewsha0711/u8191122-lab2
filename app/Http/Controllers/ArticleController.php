<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    function console_log($data){
        if(is_array($data) || is_object($data)){
            echo("<script>console.log('php_array: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('php_string: ".$data."');</script>");
        }
    }

    // public function store(Request $request){
    //     $article = new Article();
    //     $article->name = $request->input('name');
    //     $article->symbol_code = $request->input('symbol_code');
    //     $article->content = $request->input('content');
    //     $article->creation_time = $request->input('creation_time');
    //     $article->author = $request->input('author');

    //     $article->save();
    // }

    public function getArticle(Request $request, $id){
        $article = Article::findOrFail($id);
        $article->tags = $article->tags()->orderBy('name')->get();
        return view('article', [
            'article' => $article
        ]);
    }

    public function getArticles(Request $request){
        $page = $request->get('page', 1);

        //$articles = DB::table('articles')->leftJoin('articles_tags','articles.id','articles_tags.article_id');
        $articles = Article::all();
        if($request->has('tag')){
            $tagName = $request->get('tag');
            $tag = Tag::where('name', $tagName)
                ->firstOrFail();
            $articles = $tag->articles;
            //$this->console_log($articles[0]->id);
            
            // $articles = Article::whereHas('tags', function($query) use ($id){
            //     $query->where('tag_id', $id);
            // })->get();
        }
        if($request->has('code')){
            $symbol_code = $request->code;
            //$this->console_log($symbol_code);
            $articles = $articles->where('symbol_code', $symbol_code);
        }
        if($request->has('name')){
            $name = $request->get('name');
            $articles = $articles->where('name', $name);
        }

        $articles = $articles->forPage($page, 10);

        return view('articles',[
            'articles' => $articles,
        ]);
    }
} 