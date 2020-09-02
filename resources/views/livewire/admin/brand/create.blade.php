<div>
    <!-- Main content -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3 ml-4 mr-4">
            {{ session('message') }}
        </div>
    @endif
    <form role="form" method="POST" wire:submit.prevent="submit">
        <div class="card-body">
            <h4>Nama Brand</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">@</span>
                </div>
                <input type="text" wire:model="nama" class="form-control  @error('nama') is-invalid @enderror" placeholder="Nama Brand">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <h4>Images Banner</h4>
            <div class="input-group mb-3" wire:ignore>
                <input id="input-fa" type="file" wire:model="banner" class="form-control file" data-browse-on-zone-click="true">
            </div>

            <h4>Logo</h4>
            <div class="input-group mb-3" wire:ignore>
                <input id="input-fa-logo" type="file" wire:model="logo" class="form-control file" data-browse-on-zone-click="true">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" wire:model="active" id="exampleCheck1" value="1">
                <label class="form-check-label" for="exampleCheck1">active</label>
            </div>
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-success w-100 mt-2 ml-4 mr-4 mb-3">Submit</button>
        </div>
    </form>
</div>
