<?php

namespace App\Http\Controllers;

use App\Gift;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    private $gift;

    public function __construct(Gift $gift)
    {
        $this->gift = $gift;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = $this->gift->all();

        return view('gifts.index', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function session(Request $request, Gift $gift)
    {
        $array = [];
        $array[] = $request->input('id');
        $request->session()->push('gifts', $array);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (\Session::has('gifts')) {
            $sessionArray = array_flatten(\Session::get('gifts'));

            $gifts = $this->gift->whereIn('id', $sessionArray)->get();

            return view('gifts.wishList', compact('gifts'));
        }

        return redirect('gifts.wishList')->with('message', 'no wish List');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift, Request $request)
    {
        $remove = $request->input('id');

        $array = \Session::get('gifts');

        if (\Session::has('gifts')) {
            foreach ( $array as $key => $value) {
                foreach($value as $k => $v) {
                    if ($v === $remove) {
                        \Session::pull('gifts.' . $key); // retrieving pen and removing
                        break;
                    }
                }
            }
        }
        $this->edit();

        return back();
    }
}
