<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Log;

#[Title('Success Page')]
class SuccessPage extends Component
{
    #[Url]
    public $session_id;

    public function render()
    {
        //dd(env('STRIPE_SECRET'));
       // dd($this->session_id);
        // Retrieve the latest order for the authenticated user
        $latest_order = Order::with('address')->where('user_id', auth()->id())->latest()->first();

        // Check if a Stripe session ID is present
        if ($this->session_id) {
            try {
                // Set the Stripe API key
                Stripe::setApiKey(env("STRIPE_SECRET"));

                // Retrieve the session information from Stripe
                $session_info = StripeSession::retrieve($this->session_id);

                // Optional: Log the session info for debugging purposes
                Log::info('Stripe session retrieved:', ['session' => $session_info]);

                // Handle session information if needed
                 //dd($session_info);

                 if($session_info->payment_status != "paid"){
                    $latest_order->payment_status = 'failed';
                    $latest_order->save();
                    return redirect()->route('cancel');
                 }else if($session_info->payment_status == 'paid'){
                    $latest_order->payment_status = 'paid';
                    $latest_order->save();
                 }
            }
            catch (\Exception $e) {
                // Handle any exceptions that may occur during the Stripe API call
                Log::error('Error retrieving Stripe session:', ['error' => $e->getMessage()]);
                session()->flash('error', 'An error occurred while retrieving your payment information.');
            }
        }

        return view('livewire.success-page', [
            'order' => $latest_order,
        ]);
    }
}
