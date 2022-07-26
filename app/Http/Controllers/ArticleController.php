<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    IndexArticleRequest,
    ShowArticleRequest,
    CreateArticleRequest
};
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @param IndexArticleRequest $request
     * @return string
     */
    public function index(IndexArticleRequest $request)
    {
        try {
            return app(ArticleService::class)
                ->getArticles($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function store(CreateArticleRequest $request)
    {
        try {
            $id = app(ArticleService::class)
                ->setArticle($request->all());

            return response()->json(['id' => $id], 201);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @param ShowArticleRequest $request
     * @return string
     */
    public function show(int $id, ShowArticleRequest $request)
    {
        try {
            return app(ArticleService::class)
                ->getArticle($id, $request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function bob()
    {
        return [213,453345,1234123];
    }
}
