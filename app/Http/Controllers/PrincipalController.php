<?php

namespace App\Http\Controllers;

use App\Mail\PetTagMail;
use App\Notifications\UserNotificacion;
use App\Pets;
use App\View;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;
use App\User;
use Mail;

class PrincipalController extends Controller
{

  public function pet_tag($tag_id)//para buscar y mostrar sus datos donde ha sido visto
  {
     $pet = Pets::withCount('views')->with('user')->where('tag_id','=',$tag_id)->first();
    //dd($pet);
     //return response($pet,200);
      return view('pet.perfil',['pets'=>$pet]);
  }

  public function lecto_qr_buscar_pet($tag_id){

  }

  public function buscarTagID($tag_id)
  {

     $pets =  Pets::where('tag_id','=',$tag_id)->count();
     if($pets>0)
     {
         return response(env('APP_URL').'tag/'.$tag_id,200);
     }else{
         return response($pets,404);
     }


  }

    public function guardar_visto(Request $request)
    {
        $id =$request->id;
        $pet = Pets::find($id);

        $user = User::find($pet->user_id);

        $notificacion = [
            'greeting' => 'Estimado',
            'body' => 'Su Mascota ha sido vista en malos pasos',
            'thanks' => 'Gracias',
        ];

        $user->notify(new UserNotificacion($notificacion));



        View::create([
            'pet_id'=>$request->id,
            'user_id'=>$pet->user_id,
            'latitud'=>$request->lat,
            'longitud'=>$request->lon,
            'comments'=>'he visto ha su mascota en x lugar'
        ]);

        Mail::to($user->email)->send(new PetTagMail($user->name));


        return response($request->all(),200);
    }

    public function guardar_visto_commentario(Request $request)
    {
        $id =$request->id;
        $pet = Pets::find($id);

        $user = User::find($pet->user_id);

        View::create([
            'pet_id'=>$request->id,
            'user_id'=>$pet->user_id,
            'comments'=>$request->comment
        ]);

        Mail::to($user->email)->send(new PetTagMail($user->name));

        return response('sueccess',200);
    }

    public function ficha_perdido_pdf($tag_id)
    {
        $pet =  Pets::where('tag_id','=',$tag_id)->first();
        $pdf= PDF::loadView('pdf.pdf',['pet'=>$pet]);
        $pdf->setPaper('A4','landscape');
        //$pdf->setOrientation('landscape');
        return $pdf->stream('qr-'.$pet->tag_id.'.pdf');
    }


    public function imagen($img)
    {
        $imagen=Image::make(public_path().'/upload/pets/'.$img);
        return $imagen->response();
    }
    //redireciona a la vista de notificaciones
    public function notificacionesIndex ()
    {
        View::where('user_id','=',Auth::user()->id)->where('status','=',0)->update(['status'=>1]);

        $notficaciones =  View::with('pet')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();
        //Pets::with('views')->withCount('views')->where('user_id','=',Auth::user()->id)->get();
        //dd($notficaciones);
        return view('notificaciones.index',['notificaciones'=>$notficaciones]);
    }

    public function notificaciones()
    {

    }

}
