<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $total_admin = count(Admin::select('id')->get());
        $total_product = count(Product::select('id')->get());
        $total_customer = count(Customer::select('id')->get());
        $total_supplier = count(Supplier::select('id')->get()); 
        return view('backend.pages.dashboard.index',compact('total_admin','total_product','total_customer','total_supplier'));

    }
}
