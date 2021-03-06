<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Model\Product;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $paginate = 3;
    public $search;
    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.product.index', [
            'products' => $this->search === 0 ?
            Product::orderBy('created_at', 'DESC')->paginate($this->paginate) :
            Product::where('name', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }
}
