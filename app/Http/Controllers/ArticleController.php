<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Traits\ModelFinder;
use App\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ModelFinder;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getArticles();

        return view('articles.index', compact('articles'));
    }

    /**
     * Display a listing of the resource filtered by category.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function byCategory(Category $category)
    {
        $articles = $this->filterArticles('category_id', $category->id);

        return view('articles.index', compact('articles'));
    }

    /**
     * Display a listing of the resource filtered by user.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function byUser(User $user)
    {
        $articles = $this->filterArticles('user_id', $user->id);

        return view('articles.index', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->createArticle($request->all());

        flash()->success('A new article has been created. To see the article
            <a href="' .route('articles.show', str_slug($article->title)) .'">click here.</a>');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        flash()->success('A new article has been created. To see the article <a href="' .route('articles.show', str_slug($article->title)) .'">click here.</a>');
        return redirect()->route('articles.edit', str_slug($article->title));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        flash()->success('The article has been deleted');
        return redirect()->route('articles.index');
    }
}
