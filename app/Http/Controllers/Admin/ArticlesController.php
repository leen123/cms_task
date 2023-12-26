<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticlesRequest;
use App\Http\Resources\Admin\ArticlesResource;
use App\Models\Admin\Articles;
use Illuminate\Http\Request;

use function App\Helper\permission_can;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query = Articles::query();
         return ArticlesResource::collection($query->get());
    }


    public function getMyArticles()
    {
         return ArticlesResource::collection(auth()->user()->articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesRequest $request)
    {
        permission_can('add_articles');
        $article =auth()->user()->articles()->create($request->validated());
        return ArticlesResource::make($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $article)
    {
        return ArticlesResource::make($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesRequest $request, Articles $article)
    {
        permission_can('edit_articles');
        $article->update($request->validated());
        return ArticlesResource::make($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $article)
    {
        permission_can('delete_articles');
        $article->delete();
    }
}
