<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::latest()->paginate(10);
       return User::where('id', '!=', auth('api')->user()->id)->get();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
                //'name'=>'required|string|max:191',
                'firstname'=>'required|string|max:191',
                'lastname'=>'required|string|max:191',
                'email'=>'required|string|email|max:191|unique:users',
                'password'=>'required|string|min:6'
            ]);

          

            if($request->photo){
                $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
                \Image::make($request->photo)->save(public_path('img/profile/').$name);
                //get the full path of the current photo to be deleted and if exist then delete
               
            }

        return User::create([
            //'name'=>$request['name'],
            'firstname'=>$request['firstname'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],
            'type'=>$request['type'],
            'company'=>$request['company'],
            'photo'=>$name,
            'password' => Hash::make($request['password']),
        ]);

        return ["Message" => "Successfully Added a User"];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $this->validate($request,[
            'firstname'=>'required|string|max:191',
            'lastname'=>'required|string|max:191',
            'email'=>'required|string|email|max:191|unique:users,email,'.$user->id, 
            'password'=>'sometimes|string|min:6'
        ]);

        $user->update($request->all());

        return ['message'=> 'Updating User Info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);

        $user->delete();
        
        return ['message' => 'User Deleted'];
    }
}
