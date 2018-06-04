<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function showPage(Request $request)
    {
        if($request->path() !== "/") {
            /*
            if(view()->exists($request->path())) {
                return view($request->path());
            } else {
                return abort('404');
            }
            */
            try {
                return view($request->path());
            } catch (\Exception $e) {
                return abort('404', 'Il y a eu une erreur');
            }
        } else {
            return view('welcome');
        }
    }

    public function testPage(Request $request) {
        if($request->path() !== "/test") {
            try {
                return view("/test");
            } catch (\Exception $e) {
                return abort('404', 'Il y a eu une erreur');
            }
        } else {
            return view('welcome');
        }
    }
}
