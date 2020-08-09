<div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Category</h3>
                            <a href=" {{ route('add.category') }} " class="btn btn-success brn-sm float-right"><i class="fas fa-plus-square"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $cat)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $cat->nama }} </td>
                                            <td>
                                                <img src="{{ asset('images/'.$cat->banner) }}" alt=" {{ $cat->nama }} " width="100px">
                                            </td>
                                            <td>
                                                @if ($cat->status == 1)
                                                    <span class="badge badge-success">active</span>
                                                @else
                                                    <span class="badge badge-danger">not active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
