<?php

namespace Bloggo\Http\Controllers;

use Illuminate\Http\Request;
use Bloggo\Article;

/**
 * Article controller for the blog.
 * 
 * @category Http
 * @package  Controllers
 * 
 * @author   Quintin Venter
 * @since    29 July 2018
 */
class ArticleController extends Controller
{
    
    /**
     * Used to view the create page.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('articlecreate');
    }
    
    /**
     * Creates a new article.
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $model = new Article();
        $model->heading = $request->get('heading');
        $model->body = $request->get('body');
        $model->save();
        return redirect('article')->with('success', 'Article has been successfully added.');
    }
    
    /**
     * Gets the list of articles currently created.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $articles = Article::all();
        return view('articleindex', compact('articles'));
    }
    
    /**
     * Gets an article and redirects to the edit view.
     * 
     * @param string $id - the Id of the article
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articleedit', compact('article', 'id'));
    }
    
    /**
     * Updates an article with new information.
     * 
     * @param Request $request - the data from the request
     * @param string $id - the Id of the article
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = Article::find($id);
        $model->heading = $request->get('heading');
        $model->body = $request->get('body');
        $model->save();
        return redirect('article')->with('success', 'Article has been successfully updated.');
    }
    
    /**
     * Deletes an article.
     * 
     * @param string $id - the Id of the article
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $model = Article::find($id);
        $model->delete();
        return redirect('article')->with('success', 'Article has been deleted.');
    }
}
