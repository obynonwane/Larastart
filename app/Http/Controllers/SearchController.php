<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use DB;
class SearchController extends Controller
{
    
    public function index(){

        $data = request()->validate([
            'searchTerm' => 'required'
        ]);

        // return User::search($data['searchTerm'])->get();

        // $users = DB::table('users')
        //     ->join('posts', 'users.id', '=', 'posts.user_id')
        //     ->select('users.*', 'posts.descrption')
        //     ->get();

        //    return  User::query()
        //     ->where('name', 'LIKE', "%{$data['searchTerm']}%") 
        //     ->orWhere('email', 'LIKE', "%{$data['searchTerm']}%") 
        //     ->get();

      return   DB::table('companies')
                ->join('users', 'companies.id', '=', 'users.company')
                ->where('users.firstname', 'LIKE', "%{$data['searchTerm']}%") 
                ->orWhere('users.lastname', 'LIKE', "%{$data['searchTerm']}%") 
                ->orWhere('users.email', 'LIKE', "%{$data['searchTerm']}%") 
                ->get();

    }
}
