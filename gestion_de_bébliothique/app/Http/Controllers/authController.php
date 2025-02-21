<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Affiche la page d'inscription
     */
    public function showSignUp()
    {
        return view('signup');
    }

    /**
     * Affiche la page de connexion
     */
    public function showLogin()
    {
        return view('login');
    }

   /**
 * Gère l'inscription d'un utilisateur
 */
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);
    
    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'client', // Définir "client" par défaut
    ]);

    // Rediriger vers la page de connexion après l'inscription
    return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
}

    

    /**
     * Gère la connexion d'un utilisateur
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->redirectUser($user);
        }

        return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
    }

    /**
     * Gère la déconnexion d'un utilisateur
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }

    /**
     * Redirige l'utilisateur en fonction de son rôle
     */
    private function redirectUser($user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Bienvenue Admin !');
        }

        return redirect()->route('client.dashboard')->with('success', 'Bienvenue Client !');
    }
}
