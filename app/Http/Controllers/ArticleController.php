<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $articles = new ArticleCollection(Article::all());
            return ApiResponse::success('Listado de usuarios',200,$articles);
        } catch (Exception $e){
            return ApiResponse::error('Error en la consulta', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $articulo = new ArticleCollection(Article::query()->where('id',$id)->get());
            if ($articulo->isEmpty()) throw new ModelNotFoundException("Artículo no encontrado");
            return ApiResponse::success("Información del artículo",200, $articulo);
        } catch (ModelNotFoundException $e){
            return ApiResponse::error('No se encuentra el artículo', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
