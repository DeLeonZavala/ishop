<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $aux_subcategory, $aux_brand;

    public $view = 'grid';

    public function clean(){
        $this->reset(['aux_subcategory', 'aux_brand']);
    }

    public function render()
    {
        //$products = $this->category->products()->where('status', 2)->paginate(20);

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->aux_subcategory){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->aux_subcategory);
            });
        }

        if($this->aux_brand){
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->aux_brand);
            });
        }

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
