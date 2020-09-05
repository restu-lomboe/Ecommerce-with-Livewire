<div>
    <!-- Main content -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3 ml-4 mr-4">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>Nama Product</label>
                <input type="text" wire:model="name" class="form-control  @error('nama') is-invalid @enderror" placeholder="Nama Brand" required>
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brands</label>
                            <select class="form-control @error('nama') is-invalid @enderror" wire:model="brand_id" required>
                                <option selected="selected" disabled>--Pilih Brands--</option>
                                @foreach ($brands as $brand)
                                    <option value=" {{ $brand->id }} "> {{ $brand->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control @error('nama') is-invalid @enderror" wire:model="category_id" required>
                                <option selected="selected" disabled>--Pilih Category--</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}"> {{ $cat->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="form-group" wire:ignore>
                <label>Images</label>
                <input id="input-fa" type="file" wire:model="image" class="form-control file" data-browse-on-zone-click="true" required>
            </div>

            <div class="form-group" wire:ignore>
                <label>Images Product</label>
                <input id="input-fa-logo" type="file" wire:model="image_products" multiple class="form-control file" data-browse-on-zone-click="true">
            </div>

            <div class="form-group">
                <label>video</label>
                <textarea wire:model="video" class="form-control" placeholder="Masukkan video pendukung"></textarea>
                <small>Note* : Embed Video youtube</small>
            </div>

            <div class="form-group" wire:ignore>
                <label>Short Description</label>
                <textarea id="short_desc" name="short_desc" wire:model="short_desc" class="form-control w-100">{!! old('short_desc', 'test editor content') !!}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group" wire:ignore>
                <label>Description</label>
                <textarea id="description" name="description" wire:model="description" class="form-control w-100">{!! old('description', 'test editor content') !!}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Price</label>
                <input type="text" wire:model="price" class="form-control  @error('price') is-invalid @enderror" placeholder="Masukan harga product">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Discount</label>
                <input type="text" wire:model="discount" class="form-control" placeholder="Masukan harga product">
            </div>

            <div class="form-group">
                <label>Berat</label>
                <input type="text" wire:model="berat" class="form-control  @error('berat') is-invalid @enderror" placeholder="Masukan Berat Product" required>
            </div>
            @error('berat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>SKU</label>
                <input type="text" wire:model="sku" class="form-control  @error('sku') is-invalid @enderror" placeholder="Masukan Stock Product" required>
            </div>
            @error('sku')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Stock</label>
                <input type="text" wire:model="stock" class="form-control  @error('stock') is-invalid @enderror" placeholder="Masukan Stock Product" required>
            </div>
            @error('stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-check">
                <input type="checkbox" class="form-check-input" wire:model="active" id="exampleCheck1" value="1">
                <label class="form-check-label" for="exampleCheck1">Active</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" wire:model="preorder" id="exampleCheck2" value="1">
                <label class="form-check-label" for="exampleCheck2">Preorder</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" wire:model="recommended" id="exampleCheck3" value="1">
                <label class="form-check-label" for="exampleCheck3">Recommended</label>
            </div>
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-success w-100 mt-2 ml-4 mr-4 mb-3">Submit</button>
        </div>
    </form>
</div>

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('short_desc', {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
});
</script>
<script>
CKEDITOR.replace('description', {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
});
</script>
<script>
    CKEDITOR.replace('short_desc').on('change', function(e){
        @this.set('short_desc', e.editor.getData());
    });
</script>
<script>
    CKEDITOR.replace('description').on('change', function(e){
        @this.set('description', e.editor.getData());
    });
</script>
@endpush

