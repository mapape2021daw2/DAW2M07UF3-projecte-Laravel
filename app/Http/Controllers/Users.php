<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ong;
use Illuminate\Support\Facades\Hash;
use DB;

class Users extends Controller
{
    public function crudOptions() {
        return view('users.crudOptions');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('users.listUsers',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.addUsers');
    }

    public function addUser() {

        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["passwordRepeat"];

        if($password === $passwordRepeat) {
            $hashed = Hash::make($password);
            DB::insert('INSERT INTO users(name,email,password,created_at) VALUES (?,?,?,current_timestamp)', [$name, $email, $hashed]);
        } else {
            return redirect('/errorAddingUser');
        }

        return redirect('/listUsers');

    }

    public function addUserError() {
        return view('users.errorHandlers.errorAddingUser');
    }

    public function errorModifyingUser() {
        return view('users.errorHandlers.errorAddingUser');
    }

    public function renderModify() {
        return view('users.modifyUsers');
    }

    public function modifyUserData()
    {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $newPassword = $_POST["newPassword"];
        $newPasswordRepeat = $_POST["newPasswordRepeat"];

        $formEmail = DB::select('select email from users where email = ?', [$email]);
        $userEmail = (string)$formEmail[0]->email;

        if(strlen($email) == 0) {
            return redirect('/errorModifyingUser');
        }

        if($userEmail === $email) {
            DB::update('update users set name = ? where email = ?', [$name, $email]);
            if($newPassword === $newPasswordRepeat) {
                $hashed = Hash::make($newPassword);
                DB::update('update users set password = ? where email = ?', [$hashed, $email]);
            } else {
                return redirect('/errorModifyingUser');
            }
            return redirect('/listUsers');
        } else {
            return redirect('/errorModifyingUser');
        }


    }

    public function renderDelete()
    {
        $users = DB::select('select * from users');
        return view('users.deleteUsers', ['users'=>$users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from users where id = ?', [$id]);
        return redirect('/deleteUsers');
    }
}
