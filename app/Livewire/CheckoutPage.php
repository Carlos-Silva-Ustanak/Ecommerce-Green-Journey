<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Address;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Checkout')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $state;
    public $zip_code;
    public $payment_method;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'phone' => 'required|string|max:20|regex:/^\d{11}$/',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zip_code' => 'required|string|max:10|regex:/^\d{8}$/',
        'payment_method' => 'required',
    ];

    public function mount(){
        $cart_items = CartManagement::getCartItemsFromCookies();
        if(count($cart_items) == 0){
            return redirect('/products');
        }
}

    public function placeOrder()
    {
        $this->validate();

        $cart_items = CartManagement::getCartItemsFromCookies();
        $line_items = $this->generateLineItems($cart_items);

        $order = $this->createOrder($cart_items);

        $this->saveAddress($order);

        $redirect_url = $this->processPayment($line_items);

        $order->save();
        $order->items()->createMany($cart_items);
        
        CartManagement::clearCartItems();

        Mail::to(request()->user())->send(new OrderPlaced($order));

        return redirect($redirect_url);
    }

    protected function generateLineItems(array $cart_items): array
    {
        return collect($cart_items)->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'BRL',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['unit_amount'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        })->toArray();
    }

    protected function createOrder(array $cart_items): Order
    {
        return Order::create([
            'user_id' => auth()->id(),
            'grand_total' => CartManagement::calculateGrandTotal($cart_items),
            'payment_method' => $this->payment_method,
            'payment_status' => 'pending',
            'status' => 'new',
            'currency' => 'BRL',
            'shipping_amount' => 0,
            'shipping_method' => 'None',
            'notes' => 'Order placed by ' . auth()->user()->name,
        ]);
    }

    protected function saveAddress(Order $order): void
    {
        Address::create([
            'order_id' => $order->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code
        ]);
    }

    protected function processPayment(array $line_items): string
    {
        if ($this->payment_method === 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
    
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => auth()->user()->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);
    
            return $sessionCheckout->url;
        }
    
        return route('success');
    }
    

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookies();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
