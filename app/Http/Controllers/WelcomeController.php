<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelList;
use App\Models\ParamList;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = ModelList::get()->sortBy('id')->toArray();
        $params = ParamList::with('options')->orderBy('id')->get()->toArray();

        return view('welcome.index', [
            'models' => $models,
            'params' => $params,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo '<pre>';
        var_dump($request->all());
        echo '</pre>';
        // continue;
        exit();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
