<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Product Details')]
class ProductDetailPage extends Component
{
    use LivewireAlert;

    public $slug;
    public $quantity = 1;
    public $mainImage;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Produto adicionado ao carrinho com sucesso', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        $s3Url = config('filesystems.disks.s3.url'); // Fetch the S3 base URL

        $product = Product::where('slug', $this->slug)->firstOrFail();

        // Process image paths
        $product->images = array_map(function ($image) use ($s3Url) {
            return $s3Url . '/' . str_replace('\\', '/', $image); // Replace backslashes with forward slashes
        }, $product->images);

        // Set the main image to the first image in the array
        $this->mainImage = $product->images[0] ?? null;

        return view('livewire.product-detail-page', [
            'product' => $product,
            'mainImage' => $this->mainImage,
        ]);
    }
}
