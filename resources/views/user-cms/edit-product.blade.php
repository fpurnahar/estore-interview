@extends('layouts.app')

@section('title', 'Edit Product')
    {{-- @section('style')
    @include('layouts.include.style-table')
@endsection --}}
@section('contents')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('user.cms.update', $editData) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_product">{{ __('Nama Product') }}</label>
                                <input type="text" class="form-control" id="nama_product" name="nama_product"
                                    value="{{ $editData->nama_product }}">
                            </div>
                            <div class="form-group">
                                <label for="harga_product">{{ __('Harga Product') }}</label>
                                <input type="text" class="form-control" id="harga_product" name="harga_product"
                                    value="{{ $editData->harga_product }}">
                            </div>
                            <div class="form-group">
                                <label for="stock_product">{{ __('Stock Product') }}</label>
                                <input type="text" class="form-control" id="stock_product" name="stock_product"
                                    value="{{ $editData->stock_product }}">
                            </div>
                        </div>
                        <div class=" col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputFile">{{ __('Image Product') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="image_product" name="image_product" class="custom-file-input"
                                            onchange="gambar(this.value)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-image text-center">
                                <img src="{{ $editData->image_product }}" class="m-4" id="foto" width="300px">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class=" card-footer">
                        <a href="{{ route('user.cms') }}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary float-right">update</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function gambar(val) {
            $("#foto").attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
@endsection
