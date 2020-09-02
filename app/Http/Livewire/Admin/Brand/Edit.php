<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Model\Brand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $idBrand;
    public $nama;
    public $banner;
    public $banner_update;
    public $logo;
    public $logo_update;
    public $active;

    public function render()
    {
        return view('livewire.admin.brand.edit');
    }

    public function mount($getBrandById)
    {
        // dd($getBrandById);
        $this->nama = $getBrandById->nama;
        $this->banner = $getBrandById->banner;
        $this->logo = $getBrandById->logo;
        $this->active = $getBrandById->status;
        $this->idBrand = $getBrandById->id;
    }

    public function update()
    {
        $brand = Brand::where('id', $this->idBrand)->first();

        $img = $this->storeImage();
        $logo = $this->storeImageLogo();

        $brand->update([
            'nama' => $this->nama,
            'banner' => $img,
            'logo' => $logo,
            'slug' => Str::slug($this->nama),
            'status' => $this->active == null ? 0 : 1
        ]);

        // $this->emit('UpdateCategory', $category);

        session()->flash('message', 'Brands Berhasil diupdate');
        // return redirect()->to('/admin/category');
    }

    public function storeImage()
    {
        if (empty($this->banner_update)){
            return $this->banner;
        } else {
            $extension = $this->banner_update->getClientOriginalExtension();
            $name = Str::random() .'.'.$extension;
            $images = 'images/brand/banner/'.$name;
            \Image::make($this->banner_update)->save($images);
            return $name;
        }

    }

    public function storeImageLogo()
    {
        if (empty($this->logo_update)){
            return $this->logo;
        } else {
            $extension = $this->logo_update->getClientOriginalExtension();
            $name = Str::random() .'.'.$extension;
            $images = 'images/brand/logo/'.$name;
            \Image::make($this->logo_update)->save($images);
            return $name;
        }

    }
}
