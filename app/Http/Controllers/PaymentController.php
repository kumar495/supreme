<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use Session;

class PaymentController extends Controller
{
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51P4cZgKUmJzmB7GyMDNrL42IT1yO3zVlcdXai4nPBpIT48I5JqgHIvzywj8tI6ozFWRr8S5I8IYRotvydvioL0of00kGEmsFVN');
        $customer = \Stripe\Customer::create(array(
          'name' => 'test',
          'description' => 'test description',
          'email' => 'email@gmail.com',
          'source' => $request->input('stripeToken'),
           "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]

      ));
        try {
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'payment.payment' );
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'payment' );
        }
    }
}
