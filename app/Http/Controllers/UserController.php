<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Organizacion;
use App\States;
use App\User;
use Illuminate\Http\Request;
//use PhpParser\Node\Stmt\UseUse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        //dd($user);
        return view('user.index',['user'=>$user]);
    }

    public function perfil()
    {
        $id = Auth::user()->id;
        $user=User::where('id','=',$id)->first();
        return view('auth.perfil',['user'=>$user]);
    }

    public function getPerfil()
    {
        $id = Auth::user()->id;
        $user=User::where('id','=',$id)->first();

        return response($user,200);
    }

    public function state()
    {
        $state =  States::all();
        return response($state,200);
    }

    public function cities($id)
    {
        $cities =  Cities::where('state_id','=',$id)->orderBy('name','asc')->get();
        return response($cities,200);
    }

    public function actualizar_perfil(Request $request ,$id)
    {
        //validaciones
        $request->validate([
            'rut'=>'required|max:15',
            'name'=>'required|max:50',
            'phone'=>'required|max:12',
            'pet_type_ptrac'=>'required',
            'state'=>'required',
            'city'=>'required'
        ]);

        //editar perfil de usuario
      $user =  User::where('id','=',$id)->update([
            'rut'=>$request->rut,
            'name'=>$request->name,
            //'email'=>$request->email, //proceso especial para dato unico
            //'password'=> isset($request->password) ? '': $request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'description'=>$request->description,
            'cumple'=>$request->cumple,
            //'avatar'=>$request->avatar,
            'pet_type_ptrac'=>$request->pet_type_ptrac,
            'is_active'=>$request->is_active,
            'is_private'=>$request->is_private,
            'is_manager'=>$request->is_manager,
            'user_type'=>$request->user_type
        ]);
        $password = $request->old_password;
        $passwordHash = User::find($id)->password;
        if(Hash::check($password, $passwordHash) && $request->nuevo_password != ' ') {
            User::where('id','=',$id)->update([
                'password'=>Hash::make($request->nuevo_password)
            ]);
        }
        //inicializar tabla organizaciones
        if($request->pet_type_ptrac > 1)
        {
            //$user->organizaciones()->sync(['user_id'=>$id]);
            $organizacion=Organizacion::where('user_id','=',$id)->count();
            if($organizacion == 0)
            {
                Organizacion::create(['user_id'=>$id]);
            }
            else{
                Organizacion::where('user_id','=',$id)->update(['user_id'=>$id]);
            }

        }
        //cambiar passwords

        //return redirect()->route('user.perfil',$id);
        return response('success',200);
    }


    public function postUploadProfilePic(Request $request)
    {
        $base64_image = $request->input('img');
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = Str::random(10).'.webp';
        Storage::disk('public')->put('/users/'.$imageName,base64_decode($file_data));

        $imageUrl ='media/uploads/'.$imageName; //Storage::disk('public')->get('users/'.$imageName);
        $user = User::find($request->input('id'));

         $user->update(['avatar' => $imageName]);

        return response(['data' => $imageUrl], 201);
    }

    public function destroy($id)
    {
        $user = User::where('id','=',$id)->delete();
        return response('success',200);
    }

    public function comprobar_datos_vacios()
    {
        $user = User::find(Auth::user()->id);
        if (empty($user->rut)
            or empty($user->address)
            or empty($user->country)
            or empty($user->state)
            )
        {
            return response($user,200);
        }

       return response('success',200);
    }


}
