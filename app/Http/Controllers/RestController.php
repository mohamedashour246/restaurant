<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class RestController extends Controller
{
   public function index()
   {
       return view('home');
   }

   public function list()
   {
       $data = Restaurant::all();
       return view('list',[ 'data' => $data]);
   }

   public function add(Request $request)
   {
       //return $request->input();

       $resto = new Restaurant;
       $resto->name = $request->input('name');
       $resto->email = $request->input('email');
       $resto->address = $request->input('address');
       $resto->save();

       $request->session()->flash('status','Restaurant submitted successfully');
       return redirect('list');
   }

   public function delete(Request $request,$id)
   {
       $item = Restaurant::find($id);
       $item->delete();

       $request->session()->flash('statusDelete','Restaurant deleted successfully');
       return redirect('list');
   }

   public function edit($id)
   {
       $data = Restaurant::find($id);
       return view('edit',['data' => $data]);
   }

   public function update(Request $request,$id)
   {

       $resto = Restaurant::find($id);
       $resto->name = $request->input('name');
       $resto->email = $request->input('email');
       $resto->address = $request->input('address');
       $resto->update();

       $request->session()->flash('statusUpdate','Restaurant updated successfully');
       return redirect('/list');
   }

   public function register(Request $request)
   {

       //return $request->input();
        $user= new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  bcrypt($request->input('password'));
        $user->save();

       // $request->session()->flash('user','welcome ' . $request->input('name'));
        return redirect('/login');

   }

   public function login(Request $request)
   {
       $user = User::where("email",$request->input('email'))->get();
       $credentials = $request->only('email', 'password');
       if(Auth::attempt($credentials))
       {
           $request->session()->put('user', 'Welcome ' . $user[0]->name);
           return redirect('/');
       }
       else
       {
           echo 'Error';
       }
   }

   public function logout(Request $request)
   {
       Auth::logout();
       return redirect('/login');
   }

}
