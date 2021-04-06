<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ong;
use Illuminate\Support\Facades\Hash;
use DB;

class Worker extends Controller
{
    public function crudOptions() {
        return view('workers.crudOptionsWorkers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = DB::select('select * from treballador');
        return view('workers.listWorkers',['workers'=>$workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $aso = DB::select('select * from associacio');
        return view('workers.addWorkers', ['aso' => $aso]);
    }

    public function addWorker() {

        $nif = $_POST["nif"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $area = $_POST["area"];
        $phone = $_POST["phone"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $aso = $_POST["asoSelection"];
        $type = $_POST["workerType"];

        if($type == "professional") {

            $irpf = $_POST["irpf"];
            $budget = $_POST["budget"];
            $job = $_POST["job"];

            DB::insert('INSERT INTO treballador(nif, nom, email, adreca, poblacio, comarca, telefon, mobil, associacio,data_alta) VALUES (?,?,?,?,?,?,?,?,?,current_timestamp)',
                [
                    $nif,
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso
                ]
            );
            DB::insert('INSERT INTO professional(nif, irpf, quota_ss, carrec) VALUES (?,?,?,?)',
                [
                    $nif,
                    $irpf,
                    $budget,
                    $job
                ]
            );
        } else {

            $age = $_POST["age"];
            $profession = $_POST["profession"];
            $hours = $_POST["hours"];

            DB::insert('INSERT INTO treballador(nif, nom, email, adreca, poblacio, comarca, telefon, mobil, associacio,data_alta) VALUES (?,?,?,?,?,?,?,?,?,current_timestamp)',
                [
                    $nif,
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso
                ]
            );
            DB::insert('INSERT INTO voluntari(nif, edat, professio, hores) VALUES (?,?,?,?)',
                [
                    $nif,
                    $age,
                    $profession,
                    $hours
                ]
            );
        }
        return redirect('/listWorkers');
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
        $aso = DB::select('select * from associacio');
        return view('workers.modifyWorkers', ['aso'=>$aso]);
    }

    public function modifyWorker() {

        $nif = $_POST["nif"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $area = $_POST["area"];
        $phone = $_POST["phone"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $aso = $_POST["asoSelection"];
        $type = $_POST["workerType"];


        if($type == "professional") {

            $irpf = $_POST["irpf"];
            $budget = $_POST["budget"];
            $job = $_POST["job"];

            DB::update('UPDATE treballador SET nom = ?, email = ?, adreca = ?, poblacio = ?, comarca = ?, telefon = ?, mobil = ?, associacio = ? WHERE nif = ?',
                [
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso,
                    $nif
                ]
            );
            DB::update('UPDATE professional SET irpf = ?, quota_ss = ?, carrec = ? WHERE nif = ?',
                [
                    $irpf,
                    $budget,
                    $job,
                    $nif
                ]
            );
        } else {

            $age = $_POST["age"];
            $profession = $_POST["profession"];
            $hours = $_POST["hours"];

            DB::update('UPDATE treballador SET nom = ?, email = ?, adreca = ?, poblacio = ?, comarca = ?, telefon = ?, mobil = ?, associacio = ? WHERE nif = ?',
                [
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso,
                    $nif
                ]
            );
            DB::update('UPDATE voluntari SET edat = ?, professio = ?, hores = ? WHERE nif = ?',
                [
                    $age,
                    $profession,
                    $hours,
                    $nif
                ]
            );
        }


        return redirect('/listWorkers');
    }

    public function renderDelete()
    {
        $workers = DB::select('select * from treballador');
        return view('workers.deleteWorkers', ['workers'=>$workers]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($nif)
    {
        DB::select('delete from professional where nif = ?', [$nif]);
        DB::select('delete from voluntari where nif = ?', [$nif]);
        DB::select('delete from treballador where nif = ?', [$nif]);
        return redirect('/deleteWorkers');
    }
}
