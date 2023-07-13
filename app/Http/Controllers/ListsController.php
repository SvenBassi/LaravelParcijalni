<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Lists::all();
        return view('lists.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('lists.create');
       }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'=> 'required',
            'name' => 'required',
            'description'=> 'required',
            
        ]);
        Lists::create($formFields);

        return redirect('lists');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lists = Lists::findOrFail($id);

        return view('lists.show',['list' => $lists]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $lists = Lists::findOrFail($id);
        return view('lists.edit',['list' => $lists]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lists = Lists::findOrFail($id);
      $lists->update($request->all());
      return redirect()->route('lists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lists = Lists::findOrFail($id);
        $lists->delete();
        return redirect()->route('lists.index');
    }
}