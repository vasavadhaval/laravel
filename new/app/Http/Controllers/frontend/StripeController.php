<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class StripeController extends Controller
{
    /**
     * Display the payment form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('stripe.index');
    }

    /**
     * Handle the checkout process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $session = Session::create([
                'payment_method_types' => ['google_pay'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'INR',
                            'product_data' => [
                                'name' => 'Example Product',
                            ],
                            'unit_amount' => 1000, // Amount in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
            ]);

            return redirect()->to($session->url);
        } catch (ApiErrorException $e) {
            // Handle Stripe API errors
            return back()->withError($e->getMessage());
        }
    }

    /**
     * Handle the success response after payment.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('stripe.success');

    }
    public function cancel()
    {
        return view('stripe.cancel');

    }
}
