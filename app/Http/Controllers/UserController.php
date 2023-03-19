<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show List of user
    function index() //web.php fx index
    {
        //Proses
        //$myName = "Shahira"; //declare pakai $
        $users = User::get(); //Select * FROM users, guna model User untuk access database
        
        return view('users.index',//tambah return untuk display data 
        compact('users'), //send data daripada declare ($) kepada index.blade (compact), mesti sama nama dengan $
    ); 
    }
}
