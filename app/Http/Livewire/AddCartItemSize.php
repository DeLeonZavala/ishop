<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItemSize extends Component
{
    public $product, $sizes;

    public $size_id = "";

    public $colors = [];

    public $options = [];

    public $color_id = "";

    public $quantity = 0;

    public $qty = 1;

    public function mount(){
        $this->sizes = $this->product->sizes;
        $this->options['image'] = asset('storage/' . $this->product->images->first()->url);
    }

    public function updatedSizeId($value){
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
    }

    public function updatedColorId($value){
        $size = Size::find($value);
        $color = $size->colors->find($value);
        $this->quantity = $this->quantity = qty_available($this->product->id, $color->id, $size->id);
        $this->options['color'] = $color->name;
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addItem(){
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}