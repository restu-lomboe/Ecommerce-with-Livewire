<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Model\Brand;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $nama;
    public $banner;
    public $logo;
    public $active;

    public function submit()
    {
        $this->validate([
            'nama' => 'required',
            'banner' => 'required',
            'logo' => 'required'
        ]);

        $image = $this->storeImage();
        $logo = $this->storeImageLogo();

        $brand = Brand::create([
            'nama' => $this->nama,
            'banner' => $image,
            'logo' => $logo,
            'slug' => Str::slug($this->nama),
            'status' =>  $this->active == null ? 0 : 1
        ]);

        $this->deleteInput();

        // $this->emit('storeCategory', $category);

        session()->flash('message', 'Brands Berhasil ditambahkan');
    }

    public function storeImage()
    {
        if (!$this->banner){
            return null;
        }
        $extension = $this->banner->getClientOriginalExtension();
        $name = Str::random() .'.'.$extension;
        $images = 'images/brand/banner/'.$name;
        \Image::make($this->banner)->save($images);

        return $name;
    }

    public function storeImageLogo()
    {
        if (!$this->banner){
            return null;
        }
        $extension = $this->logo->getClientOriginalExtension();
        $name = Str::random() .'.'.$extension;
        $images = 'images/brand/logo/'.$name;
        \Image::make($this->logo)->save($images);

        return $name;
    }

    public function deleteInput()
    {
        $this->nama = null;
        $this->banner = '';
        $this->logo = '';
    }

    public function render()
    {
        return view('livewire.admin.brand.create');
    }
}
