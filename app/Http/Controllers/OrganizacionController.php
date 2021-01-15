<?php

namespace App\Http\Controllers;

use App\Organizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class OrganizacionController extends Controller
{
   public function getOrganizaciones()
   {
       $organizacion = Organizacion::with('actividades')->where('user_id','=',Auth::user()->id)->first();
       return response($organizacion,200);
   }

   public function update(Request $request)
   {
       //file upload pendiente
       if($request->organizacion==3)
       {
           $file = $request->file('file');
           $file->move(public_path('/upload/'), $file->getClientOriginalName());
       }

     $organizacion =  Organizacion::where('user_id','=',$request->user_id)->update([
           'user_id'=>$request->user_id,
           'initiative_name'=>$request->initiative_name,
           'initiative_rut'=>$request->initiative_rut,
           //'activities'=>json_encode($request->activities),
           'initiative_address'=>$request->initiative_address,
           'dogs_quota'=>$request->organizacion == 4 ? $request->dogs_quota:0,
           'cats_quota'=>$request->organizacion == 4 ?$request->cats_quota:0,
           'initiative_biography'=>$request->initiative_biography,
           'is_representantive'=>$request->is_representantive ? 'Y':'N',
           'file_upload_name'=>$request->organizacion == 3 ? $file->getClientOriginalName() : null
       ]);
       //asignacion de actividades
       if ($request->organizacion == 2)
       {
           $org = Organizacion::where('user_id','=',$request->user_id)->first();

           $org->actividades()->sync($request->activities);
       }

       return response('success',200);

   }
}
