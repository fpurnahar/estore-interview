@extends('layouts.app')

@section('title', 'Dashboard')
@section('style')
    @include('layouts.include.style-table')
@endsection
@section('contents')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <a href="{{ route('user.cms.create') }}" class="btn btn-primary float-right"><i
                                    class="fas fa-plus"></i> Add New
                                Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nama Product</th>
                                        <th>Image Product</th>
                                        <th>Harga Product</th>
                                        <th>Stock Product</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $item->nama_product }}</td>
                                            <td>
                                                <img class="img-thumbnail" style="width: 150px"
                                                    src="{{ $item->image_product }}" alt="">
                                            </td>
                                            <td>Rp. {{ number_format($item->harga_product, 0) }}</td>
                                            <td>{{ $item->stock_product }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#show"><i class="fas fa-eye"></i></button>
                                                    <a href="{{ route('user.cms.edit', $item) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        <i class="fas fa-trash"></i></button>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.cms.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        Do You Sure Delete !!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    @include('layouts.include.script-table')
@endsection
