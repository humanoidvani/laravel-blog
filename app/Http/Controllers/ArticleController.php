<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('articles.create');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * @param Article $article
     * @return View|Factory|Application\
     */
    public function show(Article $article): View|Factory|Application
    {
        return view('articles.show', compact('article'));
    }

    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article): Factory|View|Application
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
