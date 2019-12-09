<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\users;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories_inv = new categories();

        return $categories_inv->get_categories($request);
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
        $categories_inv = new categories();

        return $categories_inv->new($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $categories_inv = new categories();
        
        return $categories_inv->change_patch($request, $id);
        
    }

    public function change(Request $request)
    {
        $categories_inv = new categories();
   
        return $categories_inv->change_post($request);
        
    }

    public function remove(Request $request)
    {
        $categories_inv = new categories();

        return  $categories_inv->remove_post($request);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categories_inv = new categories();

        return  $categories_inv->remove_patch($request, $id);
    }
}
