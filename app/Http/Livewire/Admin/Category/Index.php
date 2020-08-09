<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Model\Category;

class Index extends Component
{

    protected $listerners = ['storeCategory'];

    public function render()
    {
        return view('livewire.admin.category.index', [
            'category' => Category::orderBy('created_at', 'desc')->get()
        ]);
    }
}
