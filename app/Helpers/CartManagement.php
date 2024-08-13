<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    //add item to cart

    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookies();
    
        $existing_item = null;
    
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
    
        if ($existing_item !== null) {
            // If the product already exists in the cart, increment the quantity
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] *
                $cart_items[$existing_item]['unit_amount'];
        } else {
            // If the product does not exist in the cart, add it as a new item
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                    'name' => $product->name,
                    'image' => $product->images[0]
                ];
            }
        }
    
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }
    

    //add item to cart with Qty 

    static public function addItemToCartWithQty($product_id, $qty = 1)
{
    $cart_items = self::getCartItemsFromCookies();

    $existing_item = null;

    foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id) {
            $existing_item = $key;
            break;
        }
    }

    if ($existing_item !== null) {
        // Increment the quantity by the new amount
        $cart_items[$existing_item]['quantity'] += $qty;
        $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] *
            $cart_items[$existing_item]['unit_amount'];
    } else {
        // If the product does not exist in the cart, add it as a new item
        $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
        if ($product) {
            $cart_items[] = [
                'product_id' => $product_id,
                'name' => $product->name,
                'image' => $product->images[0],
                'quantity' => $qty,
                'unit_amount' => $product->price,
                'total_amount' => $product->price * $qty
            ];
        }
    }

    self::addCartItemsToCookie($cart_items);
    return count($cart_items);
}

    
    //remove item from cart

    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookies();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] ==  $product_id) {
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    //add cart items to cookie


    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }
    //clear cart items from cookie
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    //get all cart items from cookie

    static public function getCartItemsFromCookies()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);

        // If $cart_items is null or not an array, initialize it as an empty array
        if (!$cart_items) {
            $cart_items = [];
        }

        return $cart_items;
    }



    //increment item quantity

    public static function incrementItemQuantityToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookies();
    
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                // Increment quantity
                $cart_items[$key]['quantity']++;
                // Recalculate the total amount
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                break;
            }
        }
    
        self::addCartItemsToCookie($cart_items);
    
        return $cart_items;
    }
    



    //decrement item quantity

    static public function decrementItemQuantityToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookies();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] ==  $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] *
                        $cart_items[$key]['unit_amount'];
                }
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }



    //calculate grand total

    static public function calculateGrandTotal($items)
{
    // Ensure $items is an array before processing
    if (!is_array($items)) {
        return 0;
    }

    return array_sum(array_column($items, 'total_amount'));
}

}
