<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Model\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $idCategory;
    public $nama;
    public $banner;
    public $banner_update;
    public $active;

    public function render()
    {
        return view('livewire.admin.category.edit');
    }

    public function mount($getCategoryById)
    {
        // dd($getCategoryById);
        $this->nama = $getCategoryById->nama;
        $this->banner = $getCategoryById->banner;
        $this->active = $getCategoryById->status;
        $this->idCategory = $getCategoryById->id;
    }

    public function update()
    {
        $category = Category::where('id', $this->idCategory)->first();

        $img = $this->storeImage();

        $category->update([
            'nama' => $this->nama,
            'banner' => $img,
            'slug' => Str::slug($this->nama),
            'status' => $this->active == null ? 0 : 1
        ]);

        $this->emit('UpdateCategory', $category);

        // session()->flash('message', 'Category Berhasil diupdate');
        return redirect()->to('/admin/category');
    }

    public function storeImage()
    {
        if (empty($this->banner_update)){
            return $this->banner;
        } else {
            $extension = $this->banner_update->getClientOriginalExtension();
            $name = Str::random() .'.'.$extension;
            $images = 'images/'.$name;
            \Image::make($this->banner_update)->save($images);
            return $name;
        }

    }
}
