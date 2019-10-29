<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    
    public function index(){

        $data = request()->validate([
            'searchTerm' => 'required'
        ]);

        return User::search($data['searchTerm'])->get();

    }
}
