<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    //
    public function index(){

        $users = DB::select('select * from users where type = ?',['inquilino']);
        return  view('admin')->with('inquilinos',$users);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'surname'=>'required',
            'nickname'=>'required',
            'password'=>'required|min:8|max:18|required_with:passwordCheck|same:passwordCheck',
            'passwordCheck'=>'required',
            'email'=>'email:rfc,dns',
        ]);
        if($validator->fails()){
        return back()
        ->withInput()
        ->with('ErrorInsert','Llene todos los campos')
        ->withErrors($validator);
        }else{
            $registerUser = User::insert([
                'type'=>'inquilino',
                'name'=> $request->name,
                'surname'=> $request->surname,
                'nickname'=> $request->nickname,
                'profile'=> 'user.jpg',
               
                'password'=> Hash::make($request['password']),
                'passwordCheck'=> $request->passwordCheck,
                'email'=> $request->email,
                'rental_price'=> 150000,
                'state' => 'activo'
                ]);

            //dd('sip');
            return back()->with('listo','Registrado');
        
        }
    //dd($request);
    }

    public function destroy($id){
        
       $user = User::find($id);
        //dd($user);
       
       $user->delete();
       return back();
    }
    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->rental_price= $request->rental_price;
        $user->save();
       return back();
    }

    public function showUser($id){
        $user = User::find($id);
        //dd($user);
      return view('showUser',compact('user'));
    }
}
