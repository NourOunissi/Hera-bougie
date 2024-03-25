<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class HomeController extends Controller
{
    //La page/vue home.blade.php
    public function home()
    {
        return view('home');
    }

    //La page/vue about.blade.php
    public function about()
    {
        return view('about');
    }

    //La page/vue bougie.blade.php
    public function bougie()
    {
        $produits = Produit::all();
        return view('bougie',compact('produits'));
    }

      //La page/vue contact.blade.php
      public function contact()
      {
          return view('contact');
      }

        //La page/vue diy.blade.php
        public function diy()
        {
            return view('diy');
        }

          //La page/vue panier.blade.php
          public function panier()
          {
              return view('panier');
          }

           //La page/vue dashboard.blade.php
           public function dashboard()
           {
               return view('dashboard');
           }

}

