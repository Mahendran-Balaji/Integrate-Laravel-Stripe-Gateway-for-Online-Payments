<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use DB;
use App\Models\Products;

class CheckoutController extends Controller
{
    public function index()
    {
        $getProducts = Products::all();
        return view('welcome')->with('allProducts',$getProducts);
    }

    public function redirectpage()
    {
        return redirect()->route('productpage');
    }

    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $city = 'Coimbatore';
            $country = "india";
            $address = "coimbatore";
            $zipCode = '641002';
            $state = "tamilnadu";

            $customer = Customer::create(array(
                'name' => $request->product_name,
                'description' => $request->product_desc,
                'email' => $request->stripeEmail,
                 "address" => ["city" => $city, "country" => $country, "line1" => $address, "line2" => "", "postal_code" => $zipCode, "state" => $state],
            ));
        
            $setToken = Customer::createSource(
                $customer->id,
                ['source' => $request->stripeToken]
            );

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->product_price,
                'currency' => 'inr',
                'description' => $request->product_desc
            ));
        
            return view('success');
            
        } catch (\Exception $ex) {
            return view('error')->with('errormessage',$ex->getMessage());
        }
    }
}
