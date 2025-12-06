<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Products (slider + gallery + order select)
        $products = [
            [
                "name" => "Premium Sirajganj Lungi",
                "price" => 550,
                "img" => "https://i.ibb.co/rmvqN7N/lungi-3.jpg",
            ],
            [
                "name" => "Soft Comfort Cotton",
                "price" => 480,
                "img" => "https://i.ibb.co/5G7ZxjY/lungi-2.jpg",
            ],
            [
                "name" => "Traditional Premium Lungi",
                "price" => 520,
                "img" => "https://i.ibb.co/3W8tJ0C/lungi-1.jpg",
            ]
        ];

        return view('home.index', compact('products'));
    }


    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product' => 'required'
        ]);

        // You can store in DB / send email
        // Example:
        // Order::create($request->all());

        return back()->with('success', 'আপনার অর্ডার গ্রহণ করা হয়েছে! আমাদের প্রতিনিধি শিগগিরই যোগাযোগ করবে।');
    }
}
