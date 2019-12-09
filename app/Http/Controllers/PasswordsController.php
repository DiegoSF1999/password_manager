<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\passwords;
use App\categories;

class PasswordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $passwords_inv = new passwords();

        return $passwords_inv->get_passwords($request);
    }

    public function ordered(Request $request)
    {
        $passwords_inv = new passwords();

        return $passwords_inv->get_ordered_passwords($request);
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
        $password_inv = new passwords();

        return $password_inv->new($request);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $password_inv = new passwords();
   
        return $password_inv->change_patch($request, $id);
    }

    public function change(Request $request)
    {
        $password_inv = new passwords();
   
        return $password_inv->change_post($request);
        
    }

    public function remove(Request $request)
    {
        $password_inv = new passwords();
   
        return $password_inv->remove_post($request);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $password_inv = new passwords();
   
        return $password_inv->remove_patch($request, $id);
    }
}
