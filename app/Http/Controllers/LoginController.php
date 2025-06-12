<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

// class LoginController extends Controller
// {
//     // Tampilkan form login
//     public function index()
//     {
//         return view('login.login');
//     }

//     // Proses login
//     public function store(Request $request)
//     {
//         $credentials = $request->only('email', 'password');
//         $reponse = Http::post('http://localhost:8080/login', $credentials);

//         if($reponse->status() !== 200) {
//             return back()->withErrors([
//                 'email' => 'Email atau password salah.',
//             ]);
//         }
//   
//         session(['token' => $reponse->json()['token']]);
//         return redirect()->route('dashboard.index');
        
//     }

//     // Logout
//     public function logout()
//     {
//         Auth::logout();
//         return redirect('/login');
//     }
// }

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('login.login');
    }

    // Proses login
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        try {
            // Kirim request ke backend API
            $response = Http::post('http://localhost:8080/login', $credentials);
            
            // Periksa response status
            if ($response->status() !== 200) {
                return back()->withErrors([
                    'email' => 'Email atau password salah.',
                ])->withInput($request->only('email'));
            }
            
            // Simpan token dalam session
            $responseData = $response->json();
            if (isset($responseData['token'])) {
                session(['token' => $responseData['token']]);
                return redirect()->route('dashboard.index');
            } else {
                return back()->withErrors([
                    'email' => 'Response tidak valid dari server.',
                ])->withInput($request->only('email'));
            }
            
        } catch (\Exception $e) {
            // Handle connection error
            return back()->withErrors([
                'email' => 'Tidak dapat terhubung ke server. Pastikan backend berjalan di localhost:8080',
            ])->withInput($request->only('email'));
        }
    }

    // Logout
    public function logout()
    {
        // Hapus session token
        session()->forget('token');
        
        // Logout dari auth jika menggunakan Laravel auth
        if (Auth::check()) {
            Auth::logout();
        }
        
        return redirect()->route('login');
    }
}