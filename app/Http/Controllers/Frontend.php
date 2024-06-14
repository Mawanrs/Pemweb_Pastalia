<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Home;
use App\Models\User;
use App\Models\About;
use App\Models\Table;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Frontend  extends Controller
{
    public function getDb(){
        $About = About::all();
        $Home = Home::all();
        $Blog = Blog::all();
        $product = Product::all();
        $Table = Table::all();
        $service = Service::all();
        return view('layouts.index', compact('About', 'product', 'Table', 'Home', 'Blog', 'service'));
    }

    public function getPost(){
        return view('layouts.booking-form');
    }

    public function post(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'startDateTime' => 'required|date',
            'finishDateTime' => 'required|date|after:startDateTime',
            'category' => 'required|string',
            'status' => 'required|string',
        ]);

        Booking::create([
            'nama_pemesan' => $request->input('nama_pemesan'),
            'start_book' => Carbon::createFromFormat('Y-m-d\TH:i', $request->input('startDateTime')),
            'finish_book' => Carbon::createFromFormat('Y-m-d\TH:i', $request->input('finishDateTime')),
            'category' => $request->input('category'),
            'status' => 'Booking', // Set status to Booking
        ]);

        return response()->json([
          'success' => true,
          'message' => 'Booking berhasil disimpan.'
      ]);
    }

    public function login(){
        return view('login.login');
    }

    public function loginn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/booking-form'); // Ganti '/home' dengan halaman setelah login
        } else {
            return back()->withErrors([
                'email' => 'Email atau kata sandi salah.',
            ]);
        }
    }

    public function register(){
        return view('register.register');
    }

    public function registerr(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/loginn'); // Ganti '/home' dengan halaman setelah login
    }
    // public function about() {
    //     $modelabout = new About;
    //     $dataabout = $modelabout->get();

    //     $modelfooter = new Profile();
    //     $datafooter = $modelfooter->get();
    //     return view('frontend.about', compact('dataabout','datafooter'));
    // }

    // public function service(){
    //     $dataservice = Service::all();
    //     $datafooter = Profile::all(); 
    //     return view('frontend.service', compact('dataservice', 'datafooter'));
    // }
    

    // public function product(){
    //     $modelproduct = new Product;
    //     $dataproduct = Product::all();
    //     return view('frontend.portfolio-details', compact('dataproduct'));
    //     return view('frontend.portfolio-details', ['dataproduct']);
    // }

    // public function gallery(){
    //     $datagallery = Gallery::all();
    //     $datafooter = Profile::all();
    //     return view('frontend.service', compact('dataservice', 'datafooter'));
    // }

    // public function portfolioDetail(){
    //     $modelproduct = new product;
    //     $dataproduct = Product::all();
    //     return view('frontend.portfolio-details', compact('dataproduct'));
    // }
}