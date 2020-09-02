<div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3 ml-4 mr-4">
            {{ session('message') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Products</h3>
                            <a href=" {{ route('add.product') }} " class="btn btn-success brn-sm float-right"><i class="fas fa-plus-square"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group mb-5">
                                <select wire:model="paginate" class="form-control col-md-1 float-left">
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                </select>
                                <form class="form-inline float-right">
                                    <input class="form-control mr-sm-2" wire:model="search" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Images</th>
                                        <th>Nama</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td>
                                                <img src="{{ asset('images/product/'.$product->image) }}" alt=" {{ $product->nama }} " width="80px">
                                            </td>
                                            <td> {{ $product->name }} </td>
                                            <td>Rp {{ number_format($product->price) }} </td>
                                            <td> {{ $product->stok }} </td>
                                            <td>
                                                @if ($product->status == 1)
                                                    <span class="badge badge-success">active</span>
                                                @else
                                                    <span class="badge badge-danger">not active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href=" {{ route('edit.product',$product->id) }} " class="btn btn-primary btn-sm">Edit</a>
                                                <a class="btn btn-danger btn-sm text-white" wire:click="$emit('triggerDelete',{{ $product->id }})">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right mt-3">
                                {{ $products->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.js"></script>
{{-- <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', idCategory => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'File ini Akan Dihapus Permanent',
                type: "warning",
                showCancelButton: true,
                cancelButtonColor: 'var(--danger)',
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                    @this.call('destroy',idCategory)

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                    'Cancelled',
                    'File Tidak Jadi Dihapus :)',
                    'error'
                    )
                }
            });
        });
    })
</script> --}}
@endpush
