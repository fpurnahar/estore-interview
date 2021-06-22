@extends('web.layouts.app')

@section('content')
    <div class="container" id="sigleProduct">
        <div class="row">
            <!-- Single Product -->
            <div class="col-lg-6">
                <figure class="figure">
                    <img src="{{ $showData->image_product }}" class="figure-img img-fluid" style="width:500px;">
                    <figcaption class="figure-caption product-thumbnail-container d-flex justify-content-between">
                        <a href="">
                            <img src="{{ asset('assets') }}/img/single/thumbnail/1.png">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets') }}/img/single/thumbnail/2.png">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets') }}/img/single/thumbnail/3.png">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets') }}/img/single/thumbnail/4.png">
                        </a>
                    </figcaption>
                </figure>
            </div>

            <div class="col-lg-6">
                <form action="{{ route('add.cart', $showData) }}" method="POST">
                    @csrf
                    <h3>{{ $showData->nama_product }}</h3>
                    <p class="text-muted">IDR {{ number_format($showData->harga_product) }}</p>
                    <button type="button" class="minus btn btn-sm" style="background-color: #EAEAEF; color: white;"
                        data-id="{{ $showData->id }}" data-qty="{{ $showData->stock_product }}"><i
                            class="fas fa-minus-circle"></i></button>

                    <input type="number" name="qty" id="qty{{ $showData->id }}" value="1" min="1"
                        max="{{ $showData->stock_product }}" class="mx-2 text-center">

                    <button type="button" class="plus btn btn-sm btn-success" style="color: white;"
                        data-id="{{ $showData->id }}" data-qty="{{ $showData->stock_product }}"><i
                            class="fas fa-plus-circle"></i></button>

                    <div class="btn-product">
                        <button type="submit" class="btn btn-warning text-white">Add to Cart</button>
                        <a href="#" class="btn" style="background-color: #EAEAEF; color: #ADADAD;">Add to Wishlist</a>
                    </div>
                </form>

                <div class="designed-by">
                    <h5>Designed by</h5>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('assets') }}/img/single/2.png">
                        </div>
                        <div class="col">
                            <h4>Anne Mortgery</h4>
                            <p>14.2K <span>Followers</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.plus').on('click', function() {
            id = $(this).data("id")
            var oldValue = $("#qty" + id).val();
            if ($("#qty" + id).val() > $(this).data("qty") - 1) {
                $("#qty" + id).val(parseFloat(oldValue) - 0);
                alert('Qty Melebihi Stock')
            } else {
                $("#qty" + id).val(parseFloat(oldValue) + 1);
            }
        })
        $('.minus').on('click', function() {
            id = $(this).data("id")
            var oldValue = $("#qty" + id).val();

            console.log(parseFloat(oldValue) + 1)
            if ($("#qty" + id).val() <= 1) {
                $("#qty" + id).val(parseFloat(oldValue) + 0);
                alert('Qty Kurang Minimum Belanja')
            } else {

                $("#qty" + id).val(parseFloat(oldValue) - 1);
            }


        })
    </script>

@endsection
