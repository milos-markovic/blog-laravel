<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Article;

class PublicController extends Controller
{
    public function index(){

        $categories = Category::orderBy('id','desc')->get();

        $lastArticlesByCategories = collect();

        foreach($categories as $category){

           if(count($category->articles) > 0){
              
            $lastArticlesByCategories[] = $category->articles()->latest()->first();

           } 
        }

        $musicArticles = Category::where('name','Music')->first()->articles;

        $filmArticles = Category::where('name','Film')->first()->articles()->latest()->take(2)->get();

        $sportArticles = Category::where('name','Sport')->first()->articles()->latest()->take(5)->get();

        return view('public.index',compact('lastArticlesByCategories','musicArticles','filmArticles','sportArticles'));

    }

    public function allCategories(){

        $categories = Category::all();

        $articles = Article::paginate(5);

        return view('public.allCategories',compact('categories','articles'));
    }

    public function getArticlesByCategory(Category $category){

        $categories = Category::all();

        $categoryName = $category->name;

        $articles = $category->articles()->paginate(5);

        return view('public.getCategoryArticles',compact('articles','categories','categoryName'));
    }

    public function getFullArticle(Article $article){

        return view('public.fullArticle',compact('article'));
    }

    public function searchArticle(Request $request){

        $search = $request->search;

        $articles = Article::where('title','Like','%'.$search.'%')->get();

        return view('public.searchArticle',compact('articles'));
    }
}
