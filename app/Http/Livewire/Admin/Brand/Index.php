<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Model\Brand;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 3;
    public $search;
    protected $updatesQueryString = ['search'];

    // protected $listerners = ['storeCategory', 'UpdateCategory'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.brand.index', [
            'brands' => $this->search === 0 ?
            Brand::orderBy('created_at', 'DESC')->paginate($this->paginate) :
            Brand::where('nama', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function destroy($idBrand)
    {
        Brand::find($idBrand)->delete();
        session()->flash('message', 'Brands Berhasil dihapus');
    }
}
