<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentCollection;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $comments = new CommentCollection(Comment::all());
            return ApiResponse::success('Listado de comentarios', 200, $comments);
        } catch (Exception $e){
            return ApiResponse::error('No se encontraron comentarios', 404);
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
        try {
            $comment = new  CommentCollection(Comment::query()->where('id',$id)->get());
            if ($comment->isEmpty()) throw new ModelNotFoundException();
            return ApiResponse::success("Comentario obtenido", 200, $comment);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('Comentario no existente', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
