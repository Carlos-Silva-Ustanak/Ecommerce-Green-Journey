<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart - Ecommerce')]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookies();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);

        $s3Url = config('filesystems.disks.s3.url'); 

        foreach ($this->cart_items as &$item) {
            if (isset($item['image'])) {
                $item['image'] = $s3Url . '/' . ltrim(str_replace('\\', '/', $item['image']), '/');
            }
        }
    }

    public function increaseQty($product_id)
    {
        CartManagement::incrementItemQuantityToCart($product_id);
        $this->updateCart();
    }

    public function decreaseQty($product_id)
    {
        CartManagement::decrementItemQuantityToCart($product_id);
        $this->updateCart();
    }

    public function removeItem($product_id)
    {
        CartManagement::removeCartItem($product_id);
        $this->updateCart();
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'cart_items' => $this->cart_items,
            'grand_total' => $this->grand_total
        ]);
    }
}
