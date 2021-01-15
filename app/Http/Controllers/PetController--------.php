<?php

namespace App\Http\Controllers;

use App\Breed;
use App\Mail\AdopcionMail;
use App\Mail\PetTagMail;
use App\Pet_type;
use App\Pets;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Image;
use Barryvdh\DomPDF\Facade as PDF;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->authorizeResource(Pets::class, 'pets');
    }


    public function index()
    {
       //$pets = Pets::where()->orderBy('id','desc')->get();
        //mascotas del usuario
       $pets= User::with('pets')->where('id','=',Auth::user()->id)->get();

       return view('pet.index',['pets'=>$pets]);
    }

    public function getPet(){
       $pets = Pets::withCount('views')
           ->where('user_id','=',Auth::user()->id)
           ->orderBy('id','desc')
           ->get();
        return response($pets,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pet.create');
    }

    public function especie(){
        $especie=Pet_type::all();
        return response($especie,200);
    }

    public function razas($id)
    {
        $raza = Breed::where('pet_type','=',$id)->orderBy('name','asc')->get();
        return response($raza,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'pet_type'=>'required',
            'breeds'=>'required',
        ]);
        $tag_id = strtoupper(Str::random(6));
        //imagen cropper
        if($request->input('avatar')!=null)
        {

            $base64_image = $request->input('avatar');
            @list($type, $file_data) = explode(';', $base64_image);
            @list(, $file_data) = explode(',', $file_data);
            $imageName = $tag_id.'.webp';
            Storage::disk('public')->put('/pets/'.$imageName,base64_decode($file_data));

            //imagen full
            $data2 = $request->input('full');
            list($type, $data2) = explode(';', $data2);
            list(, $data2)      = explode(',', $data2);

            $data2 = base64_decode($data2);
            $imageName2 =$tag_id.'-full.webp';
            $path2 = public_path('media/uploads/pets/');
            if (!file_exists($path2)) {
                mkdir($path2, 0777, true);
                //mkdir($path.'/qr/', 0777, true);
            }
            file_put_contents($path2 . $imageName2, $data2);
            Image::make(public_path().'/media/uploads/pets/'.$imageName2)->resize('1200',null)->save(public_path().'/media/uploads/pets/'.$imageName2);
        }
        else{
            $imageName = 'not.jpg';
            $imageName2 ='not.jpg';
        }

        $user_id = Auth::user()->id;
      $pet =  Pets::create([
            'user_id'=>$user_id,
            'tag_id'=> $tag_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'sexo'=>$request->sexo,
            'fecha_nac'=>$request->fecha_nac,
            'condicion_medica'=>$request->condicion_medica,
            'rnm'=>$request->rnm,
            'pet_type_ptrac'=>$request->pet_type_ptrac,
            'pet_type'=>$request->pet_type,
            'breeds'=>$request->breeds,
            'country'=>1,
            'state'=>$request->state,
            'city'=>$request->city,
            'avatar'=>$imageName,
            'full'=>$imageName2,
            'is_lost'=>$request->is_lost ? 1:0,
            'is_dangerous'=>$request->is_dangerous ? 1:0,
            'is_active'=>1,
        ]);
       /* \QrCode::format('png')
                ->size(520,520)
                ->margin(0)
            ->generate(env('APP_URL').'/tag/'.$pet->tag_id, public_path('media/upload/qr/'.$pet->tag_id.'.jpg'));*/
        //$id=$pet->id;
        //$pet->update(['tag_id'=>$this->addTag($id)]);

        return  response('success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet=Pets::find($id);
        return response($pet,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit = Pets::where('id','=',$id)->first();
        if(Auth::user()->id==$edit->user_id){

            return view('pet.edit',['pet'=>$edit]);

        }
        else{
            return redirect('pets');
        }

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
        //$this->authorize('update', $pets);
        $request->validate([
            'name'=>'required',
            'pet_type'=>'required',
            'breeds'=>'required',
        ]);


            $user_id = Auth::user()->id;
            $pet =  Pets::where('id','=',$id)->where('user_id','=',$user_id)->update([
                //'user_id'=>$user_id,
                //'tag_id'=> strtoupper(Str::random(6)),
                'name'=>$request->name,
                'description'=>$request->description,
                'sexo'=>$request->sexo,
                'fecha_nac'=>$request->fecha_nac,
                'condicion_medica'=>$request->condicion_medica,
                'rnm'=>$request->rnm,
                'pet_type_ptrac'=>$request->pet_type_ptrac,
                'pet_type'=>$request->pet_type,
                'breeds'=>$request->breeds,
                'country'=>1,
                'state'=>$request->state,
                'city'=>$request->city,
                //'avatar'=>$imageName,
                //'full'=>$imageName2,
                'is_lost'=>$request->is_lost ? 1:0,
                'is_dangerous'=>$request->is_dangerous ? 1:0,
                'is_active'=>1,
            ]);
            //$id=$pet->id;
            //$pet->update(['tag_id'=>$this->addTag($id)]);

            return  response('success',200);


    }

    public function updateImagen(Request $request)
    {
        $pet= Pets::find($request->input('id'));

        //eliminar imagen ya existete
        Storage::disk('public')->delete('pets/'.$pet->avatar);
        Storage::disk('public')->delete('pets/'.$pet->full);

        $base64_image = $request->input('avatar');
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = $pet->tag_id.'.webp';
        Storage::disk('public')->put('/pets/'.$imageName,base64_decode($file_data));

        //imagen full
        $data2 = $request->input('full');
        list($type, $data2) = explode(';', $data2);
        list(, $data2)      = explode(',', $data2);

        $data2 = base64_decode($data2);
        $imageName2 =$pet->tag_id.'-full.webp';
        $path2 = public_path('media/uploads/pets/');
        if (!file_exists($path2)) {
            mkdir($path2, 0777, true);
            //mkdir($path.'/qr/', 0777, true);
        }
        file_put_contents($path2 . $imageName2, $data2);
        Image::make(public_path().'/media/uploads/pets/'.$imageName2)->resize('1200',null)->save(public_path().'/media/uploads/pets/'.$imageName2);

        $imageUrl = 'media/uploads/pets/'.$imageName;


        // $user->profile->removeCurrentProfilePic($user);
        $pet->update(['avatar' => $imageName,'full'=>$imageName2]);


        return response(['data' => $imageUrl], 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


    }

    public function deletePet(Request $request)
    {
        $password=$request->input('password_confirm');
        $id = Auth::user()->id;
        $passwordHash = User::find($id)->password;
        if(Hash::check($password, $passwordHash)){
            $pet=Pets::where('id','=',$request->input('id'))->where('user_id','=',$id)->first();
            Storage::disk('public')->delete('pets/'.$pet->avatar);
            Storage::disk('public')->delete('pets/'.$pet->full);
            $pet->delete();
            return response( 'success' ,200);
        }
        else{
            return response( 'danger' ,422);
        }
       //return response($request->all(),200);

    }

    public function tagPdfId($tag)
    {
        $pet = Pets::with('user')->where('tag_id','=',$tag)->first();

      /* $qr= \QrCode::format('png')
            ->size(520,520)
            ->margin(0)
            ->generate(env('APP_URL').'/tag/'.$pet->tag_id,$pet->tag_id.'.png');

       Storage::disk('public')->put('qrs/'.$pet->tag_id.'.png',$qr);*/
       //$qr_final = base64_encode($qr);
        $pdf= PDF::loadView('pdf.pdf', ['pet' => $pet]);
        //return response($qr,200);
        return $pdf->stream('qr-'.$pet->tag_id.'.pdf');
       // return view('pdf.pdf',['pet' => $pet]);
    }

    public function extraviadofichapdf($tag)
    {
        $pet =  Pets::where('tag_id','=',$tag)->first();

        /* $pdf= PDF::loadView('pdf.pdf',['pet'=>$pet]);
         $pdf->setPaper('A4','landscape');
         //$pdf->setOrientation('landscape');
         return $pdf->stream('qr-'.$pet->tag_id.'.pdf');*/

    }

    public function trapasoMascota(Request $request){//post
        $id = $request->id;
         $user = User::where('email','=',$request->rut_email)
             ->orWhere('rut','=',$request->rut_email)
             ->first();

         $pet = Pets::where('id','=',$id)->first();

        Mail::to('pedroaraya@fizz.cl')->send(new AdopcionMail($user,$pet));

         return response($user,200);
    }

    public function aceptarTraspaso($id,$user_id)//get
    {
            Pets::where('id','=',$id)->update(['user_id'=>$user_id]);

            return redirect()->route('pets');
    }

    public function isdangerus($id)
    {
        $breed=Breed::where('id','=',$id)->first();
        return response($breed,200);
    }

}
