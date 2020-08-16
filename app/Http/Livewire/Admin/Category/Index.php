<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Model\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 3;
    public $search;
    protected $updatesQueryString = ['search'];

    protected $listerners = ['storeCategory', 'UpdateCategory'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.category.index', [
            'category' => $this->search === 0 ?
            Category::orderBy('created_at', 'DESC')->paginate($this->paginate) :
            Category::where('nama', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function destroy($idCategory)
    {
        Category::find($idCategory)->delete();
        session()->flash('message', 'Category Berhasil dihapus');
    }
}
