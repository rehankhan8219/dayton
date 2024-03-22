<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class PageController extends Controller
{
    public function index()
    {
        $home_secton_1 = Blog::find(1);
        $home_secton_2 = Blog::find(2);

        return view('frontend.home', compact('home_secton_1', 'home_secton_2'));
    }

    public function aboutUs()
    {
        $about_us_secton_1 = Blog::find(3);
        $about_us_secton_2 = Blog::find(4);

        return view('frontend.about-us', compact('about_us_secton_1', 'about_us_secton_2'));
    }

    public function product()
    {
        $product_secton_1 = Blog::find(5);

        return view('frontend.product', compact('product_secton_1'));
    }

    public function career()
    {
        $career_secton_1 = Blog::find(6);

        return view('frontend.career', compact('career_secton_1'));
    }

}
