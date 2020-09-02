<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Model\Category;
use App\Model\Brand;
use App\Model\ImageProduct;
use App\Model\Product;

class Create extends Component
{

    use WithFileUploads;

    public $name;
    public $brand_id;
    public $category_id;
    public $image;
    public $image_products = [];
    public $video;
    public $short_desc;
    public $description;
    public $price;
    public $discount;
    public $berat;
    public $sku;
    public $stock;
    public $active;
    public $preorder;
    public $recommended;


    public function save()
    {
        $this->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'berat' => 'required',
            'stock' => 'required',
        ]);

        $image = $this->storeImage();

        $product = Product::create([
            'name' => $this->name,
            'short_desc' => $this->short_desc,
            'desc' => $this->description,
            'image' => $image,
            'slug' => Str::slug($this->name),
            'video' => $this->video,
            'price' => $this->price,
            'discount' => $this->discount,
            'sku' => $this->sku,
            'berat' => $this->berat,
            'stok' => $this->stock,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'status' =>  $this->active == null ? 0 : 1,
            'preorder' =>  $this->preorder == null ? 0 : 1,
            'recommended' =>  $this->recommended == null ? 0 : 1
        ]);

        $image_product = $this->multipleImage($product);

        $this->deleteInput();

        // $this->emit('storeCategory', $category);

        session()->flash('message', 'Product Berhasil ditambahkan');

        return redirect()->to('/admin/product');
    }

    public function storeImage()
    {
        if (!$this->image){
            return null;
        }
        $extension = $this->image->getClientOriginalExtension();
        $name = Str::random() .'.'.$extension;
        $images = 'images/product/'.$name;
        \Image::make($this->image)->save($images);

        return $name;
    }

    public function multipleImage($product)
    {
        if (!$this->image_products){
            return null;
        } else {
            if (count($this->image_products) > 0) {
                foreach ($this->image_products as $key => $photo) {
                    $name[] = $photo->getClientOriginalName();

                    $images = 'images/product/images_product/'.$name[$key];

                    \Image::make($photo)->save($images);

                    $data2 = array(
                        'product_id' => $product->id,
                        'image' => $name[$key]
                    );
                    ImageProduct::create($data2);
                }
            }
        }
    }

    public function deleteInput()
    {
        $this->name = null;
    }

    public function render()
    {
        return view('livewire.admin.product.create', [
            'category' => Category::orderBy('created_at', 'desc')->get(),
            'brands' => Brand::orderBy('created_at', 'desc')->get()
        ]);
    }
}
