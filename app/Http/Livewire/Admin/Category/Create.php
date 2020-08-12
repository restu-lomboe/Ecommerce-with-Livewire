<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Model\Category;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithFileUploads;


class Create extends Component
{

    use WithFileUploads;

    public $nama;
    public $banner;
    public $active;

    public function submit()
    {
        $this->validate([
            'nama' => 'required|min:6',
            'banner' => 'required'
        ]);

        $image = $this->storeImage();

        $category = Category::create([
            'nama' => $this->nama,
            'banner' => $image,
            'slug' => Str::slug($this->nama),
            'status' =>  $this->active == null ? 0 : 1
        ]);

        $this->deleteInput();

        $this->emit('storeCategory', $category);

        session()->flash('message', 'Category Berhasil ditambahkan');
    }

    public function storeImage()
    {
        if (!$this->banner){
            return null;
        }
        $extension = $this->banner->getClientOriginalExtension();
        $name = Str::random() .'.'.$extension;
        $images = 'images/'.$name;
        \Image::make($this->banner)->save($images);

        return $name;
    }

    public function deleteInput()
    {
        $this->nama = null;
        $this->banner = '';
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
