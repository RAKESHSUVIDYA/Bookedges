<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vendorIndex');
    }
    public function create()
    {
        return view('vendorCreate');
    }
    public function store(Request $request)
    {
        $vendorData = DB::table('vendor')->create([
            'vendor_name' => $request->input('vendorName')
        ]);
        $vendorId = $vendorData->save();
        return redirect('admin/vendor/index');
    }
}
