<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('blog.index',[
            'blog' => Blog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $blog = Blog::create($request->all());
        if($request->hasFile('image')){
            $blog->image_path = $request->file('image')->store('blog','public');
        }
        $blog->save();
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return View
     */
    public function show(blog $blog)
    {
       return view('blog.show', [
         'blog' => $blog
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return View
     */
    public function edit(blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return RedirectResponse
     */
    public function update(Request $request, blog $blog)
    {
        $blog->fill($request->all());
        if($request->hasFile('image')){
            $blog->image_path = $request->file('image')->store('blog','public');
        }
        $blog->save();
        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return JsonResponse
     */
    public function destroy(blog $blog)
    {
        try{
            $blog->delete();
            return response()->json([
                'status' => 'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> 'Wystąpił błąd - USerController.php - 95',
            ])->setStatusCode(500);
        }
    }
}
