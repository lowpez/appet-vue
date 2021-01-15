<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;





use App\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use Laravel\Socialite\Facades\Socialite;





class SocialAuthController extends Controller

{

    public function redirectToProvider($provider)

    {

        return Socialite::driver($provider)->redirect();

    }



    public function handleProviderCallback($provider)

    {

        // Obtenemos los datos del usuario

        $social_user = Socialite::driver($provider)->user(); 

        // Comprobamos si el usuario ya existe

        if ($user = User::where('email', $social_user->email)->first()) { 

            return $this->authAndRedirect($user); // Login y redirección

        } else {

            // En caso de que no exista creamos un nuevo usuario con sus datos.

            $user = User::create([

                'name' => $social_user->name,

                'email' => $social_user->email,

                'password' => bcrypt(Str::random(10)),

                'avatar' => $social_user->avatar,

                'email_verified_at' => now()

            ]);

 

            return $this->authAndRedirect($user); // Login y redirección

        }

    }

 

    // Login y redirección

    public function authAndRedirect($user)

    {

        Auth::login($user);

 

        return redirect()->to('/home#');

    }

}

