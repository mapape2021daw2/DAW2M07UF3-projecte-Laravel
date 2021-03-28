<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ong;
use DB;

class Users extends Controller
{
    public function crudOptions() {
        return view('ong.users.crudOptions');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('ong.users.listUsers',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ong.users.addUsers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cif'       =>  'required',
            'adreca'   =>  'required',
            'poblacio'   =>  'required',
            'comarca'   =>  'required',
            'tipus'   =>  'required',
            //declarada???
        ]);
        $novaong = new Alum([
            'cif'       =>  $request->get('cif'),
            'adreca'   =>  $request->get('adreca'),
            'poblacio'   =>  $request->get('poblacio'),
            'comarca'       =>  $request->get('comarca'),
            'tipus'       =>  $request->get('tipus'),
            //declarada??
        ]);
        $novaong->save();
        return redirect()->route('ong.create')->with('Exit','Dades afegides');
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

    public function renderModify() {
        return view('ong.users.modifyUsers');
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
        //
    }

    public function renderDelete()
    {
        return view('ong.users.deleteUsers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        DB::select('delete from users where email = ?', [$email]);
        echo "Usuari esborrat";
    }
}
