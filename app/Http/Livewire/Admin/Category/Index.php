<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Model\Category;

class Index extends Component
{

    protected $listerners = ['storeCategory', 'UpdateCategory'];

    public function render()
    {
        return view('livewire.admin.category.index', [
            'category' => Category::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function destroy($idCategory)
    {
        Category::find($idCategory)->delete();
        session()->flash('message', 'Category Berhasil dihapus');
    }
}
