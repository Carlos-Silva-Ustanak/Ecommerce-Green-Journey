<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ["name", "slug", "image", "is_active"];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function delete()
    {
        if (!empty($this->image)) {
            Storage::disk('public')->delete($this->image);
        }
        parent::delete();
    }

    public function update(array $attributes = [], array $options = [])
    {
        if (isset($attributes['image']) && $this->image !== $attributes['image']) {
            if (!empty($this->image)) {
                Storage::disk('public')->delete($this->image);
            }
        }
        return parent::update($attributes, $options);
    }
}
