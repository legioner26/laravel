<?php

namespace App\Services;

use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use Illuminate\Support\Arr;

class ArticleService
{
    public function getArticles($request)
    {
        return new ArticleCollection(Article::sortBy($request)
            ->paginate(10, ['*'], 'page', $request['page'] ?? 1));
    }

    public function setArticle($request)
    {
        $images = $request['images'];

        return Article::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => array_shift($images),
            'images' => $images
        ])->id;
    }

    public function getArticle($id, $request)
    {
        $fields = [
            'name',
            'price',
            'image',
        ];

        if (isset($request['fields'])) {
            $fieldsArray = explode(',', $request['fields'] ?? []);
            $fields = Arr::collapse([['name', 'image', 'price'], $fieldsArray]);
        }

        return Article::findOrFail($id, $fields);
    }
}
