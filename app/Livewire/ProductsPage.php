<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Product Page')]
class ProductsPage extends Component
{
    use LivewireAlert;
    use WithPagination;

    #[Url]
    public $selected_categories = [];

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 500;

    #[Url]
    public $sort = 'latest';
    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCart($product_id);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Produto adicionado ao carrinho com sucesso', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        if (!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        if ($this->featured) {
            $productQuery->where('is_featured', 1);
        }

        if ($this->on_sale) {
            $productQuery->where('on_sale', 1);
        }

        if ($this->price_range) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        if ($this->sort == 'latest') {
            $productQuery->latest();
        }

        if ($this->sort == 'price') {
            $productQuery->orderBy('price');
        }


        

        // Fetch the S3 base URL
        $s3Url = config('filesystems.disks.s3.url'); // Use the base URL

        $products = $productQuery->paginate(9);

        // Map over paginated items to update image paths
        $products->getCollection()->transform(function ($product) use ($s3Url) {
            // Ensure the images field is an array
            $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
            // Process image paths
            $product->images = array_map(function ($image) use ($s3Url) {
                return $s3Url . '/' . str_replace('\\', '/', $image); // Replace backslashes with forward slashes
            }, $images);

            return $product;
        });

        return view('livewire.products-page', [
            'products' => $products,
            'brands' => Brand::where('is_active', 1)->get(),
            'categories' => Category::where('is_active', 1)->get()
        ]);
    }
}
