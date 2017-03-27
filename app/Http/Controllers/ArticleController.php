<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\StatusRequest;
use App\Traits\ModelFinder;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $articles = $this->getArticlesBy($category);

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
        $articles = $this->getArticlesBy($user);

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
        //Article
        $article = Auth::user()->createArticle($request->except('image'));

        //File
        if($file = $request->image)
        {
            $file->storeAs('articles', filename($article->id, 'article'));
        }

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
    public function show(Category $category, Article $article)
    {
        $article = $this->getArticle($article->id);

        return view('articles.show', compact('article'));
    }

    /**
     * Display the file
     *
     * @param  \App\Article $article
     * @return file
     */
    public function showFile(Article $article)
    {
        $file = Storage::disk('articles')->get(filename($article->id, 'article'));

        return $file;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Article $article)
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
        //Article
        $article->update($request->except('image'));

        //File
        if($file = $request->image)
        {
            $file->storeAs('articles', filename($article->id, 'article'));
        }

        flash()->success('The article has been updated. To see the article <a href="' .$article->category_path('show') .'">click here.</a>');
        return redirect($article->category_path('edit'));

    }

    /**
     * Update the article status
     *
     * @param  Request $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(StatusRequest $request, Article $article)
    {
        $article->update($request->only('status'));

        flash()->success('The article status has been updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //File
        Storage::disk('articles')->delete(filename($article->id, 'article'));

        //Article
        $article->delete();

        flash()->success('The article has been deleted');
        return redirect()->route('articles.index');
    }
}
