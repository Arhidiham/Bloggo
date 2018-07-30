<?php

namespace Bloggo\Http\Controllers;

use Bloggo\Article;

/**
 * Article view controller for the blog.
 * This controller will be accessed by the public.
 * 
 * @category Http
 * @package  Controllers
 * 
 * @author   Quintin Venter
 * @since    30 July 2018
 */
class ArticleViewController extends Controller
{
    /**
     * Gets an article and presents the article in the view.
     * 
     * @param string $id - the Id of the article
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function get($id)
    {
        $article = Article::find($id);
        return view('article', compact('article', 'id'));
    }
    
    /**
     * Gets a list of articles and builds a list view.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }
    
}
