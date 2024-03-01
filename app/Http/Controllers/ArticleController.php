<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $articles = new ArticleCollection(Article::all());
            return ApiResponse::success('Listado de artículos',200,$articles);
        } catch (Exception $e){
            return ApiResponse::error('Error en la consulta', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|min:3|max:255',
                'texto' => 'required',
                'imagen' => ['nullable','image','mimes:jpeg,jpg,gif,svg,bmp','max:10240'],
                'user_id' => 'required'
            ]);
            $article = new Article;
            $article->titulo = $request->input('titulo');
            $article->texto = $request->input('texto');
            $article->user_id = $request->input('user_id');
            if ($request->hasFile('imagen')){
                $file = $request->file('imagen');
                $filename = $file->getClientOriginalName();
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $name_file = str_replace(" ", "_", $filename);
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').'-'.$name_file.'.'.$extension; //nuevo nombre del archivo
                $file->move(public_path('uploads/'),$picture);
                $article->imagen =  '/uploads/'.$picture;
            }
            $article->save();
            return ApiResponse::success('Artículo agregado', 200, $article);
        } catch (ValidationException $e){
            return ApiResponse::error ($e->getMessage(), 404);
        } catch (Exception $e){
            return ApiResponse::error ($e->getMessage(), 500);
        }
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
    public function update(Request $request, $id)
    {

    }

    public function actualizar(Request $request, $id){
        try {
            $article = Article::findOrFail($id);
            $request->validate([
                'titulo' => 'required|min:3|max:255',
                'texto' => 'required',
                'imagen' => ['nullable','image','mimes:jpeg,jpg,gif,svg,bmp','max:10240'],
                'user_id' => 'required'
            ]);
            $article = new Article;
            $article->titulo = $request->input('titulo');
            $article->texto = $request->input('texto');
            $article->user_id = $request->input('user_id');
            if ($request->hasFile('imagen')){
                $file = $request->file('imagen');
                $filename = $file->getClientOriginalName();
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $name_file = str_replace(" ", "_", $filename);
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').'-'.$name_file.'.'.$extension; //nuevo nombre del archivo
                $file->move(public_path('uploads/'),$picture);
                $article->imagen =  '/uploads/'.$picture;
            }
            $article->update();
            return ApiResponse::success('Artículo actualizado', 200, $article);
        } catch (ValidationException $e){
            return ApiResponse::error ($e->getMessage(), 404);
        } catch (Exception $e){
            return ApiResponse::error ($e->getMessage(), 500);
        } catch (ModelNotFoundException $e){
            return ApiResponse::error ($e->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $article = Article::findOrFail($id);
            $article->delete();
            return ApiResponse::success('Se ha eliminado el artículo', 200);
        } catch (ModelNotFoundException $e){
            return ApiResponse::error ('No se encontro el registro', 404);
        } catch (Exception $e) {
            return ApiResponse::error ($e->getMessage(),500);
        }
    }
}
