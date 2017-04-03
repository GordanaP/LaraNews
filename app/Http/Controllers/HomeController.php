<?php

namespace App\Http\Controllers;

use App\Filters\ArticleFilters;
use App\Traits\ModelFinder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use ModelFinder;

    protected $pp = 6;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleFilters $filters)
    {
        $this->authorize('view_dashboard', 'App\Article');

        if (Auth::user()->hasRole('author'))
        {
            $articles = $this->getArticlesBy(Auth::user())->paginate($this->pp);
        }
        elseif(Auth::user()->hasRole('editor'))
        {
            $articles = $this->getArticles($filters)->section(Auth::user()->profile->category_id)->paginate($this->pp);
        }
        elseif (Auth::user()->hasRole('admin'))
        {
            $articles = $this->getArticles($filters)->paginate($this->pp);
        }

        return view('home', compact('articles'));
    }
}