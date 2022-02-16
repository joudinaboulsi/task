<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::all();

      return view('categories.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        categories::create([
                'title' => $request->title,
                'description' => $request->description,


            ]);
            session()->flash('Add', 'sucessfully ');
            return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $id = $request->id;



        $categories = categories::find($id);
        $categories->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        session()->flash('Edit','successfully');
        return redirect('/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request)
    {
        $id = $request->id;

        //dd($id);
        $category=categories::find($id);
           $category->delete();
        session()->flash('delete','deleted');
        return redirect('/categories');
    }
}
