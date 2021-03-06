<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ong;
use DB;

class ongctl extends Controller
{
    public function crudOptions() {
        return view('ong.crudOptionsOng');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ongs = DB::select('select * from associacio');
        return view('ong.mostraOng',['ongs'=>$ongs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ong.afegirOng');
    }

    public function afegirOng(Request $request) {
        $cif = $request->get('cif');
        $adreca = $request->get('adreca');
        $poblacio = $request->get('poblacio');
        $comarca = $request->get('comarca');
        $tipus = $request->get('tipus');
        $utilitat_publica = $request->get('utilitat_publica');
        DB::insert('INSERT INTO associacio(cif,adreca,poblacio,comarca,tipus,utilitat_publica) VALUES (?,?,?,?,?,?)', [$cif, $adreca, $poblacio, $comarca, $tipus, $utilitat_publica]);
        return redirect('/mostraOng');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
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
        return redirect()->route('ong.mostraOng')->with('Exit','Dades afegides');
    }*/

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
        return view('ong.modificaOng');
    }

    public function modifyOngData(Request $request)
    {
        $cif = $request->get('cif');
        $adreca = $request->get('adreca');
        $poblacio = $request->get('poblacio');
        $comarca = $request->get('comarca');
        $tipus = $request->get('tipus');
        $utilitat_publica = $request->get('utilitat_publica');

        $formCif = DB::select('select cif from associacio where cif = ?', [$cif]);
        $ongCif = (string)$formCif[0]->cif;

        if($ongCif === $cif) {
            DB::update('update associacio set adreca = ?, poblacio = ?, comarca = ?, tipus = ?, utilitat_publica = ? where cif = ?', [$adreca, $poblacio, $comarca, $tipus, $utilitat_publica, $cif]);
            return redirect('/mostraOng');
        }
    }

    public function renderDelete()
    {
        $ongs = DB::select('select * from associacio');
        return view('ong.esborraOng', ['ongs'=>$ongs]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cif)
    {
        DB::select('delete from associacio where cif = ?', [$cif]);
        return redirect('/esborraOng');
    }
}
