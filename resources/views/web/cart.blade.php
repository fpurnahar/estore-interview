<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/all.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap"
        rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">

    <title>Hefa Store</title>
</head>

<body>

    <div class="container cart-header">
        <div class="row mt-5 text-center">
            <div class="col">
                <h3>Your Cart</h3>
                <p>Pastikan barang anda terbayar lunas</p>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <nav>
            <ol class="breadcrumb bg-transparent pl-0 cart-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart Checkout</li>
            </ol>
        </nav>

        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>

    <!-- Checkout -->
    <section class="checkout">
        <div class="container">
            <div class="row justify-content-between" style="margin-bottom: 100px;">
                <div class="col-lg-6">
                    <h4 class="mb-4">Your Items</h4>
                    @if (!$cartItems->isEmpty())
                        @foreach ($cartItems as $item)
                            <div class="row mb-4">
                                <div class="col-2">
                                    <img src="{{ $item->cart_has_product->image_product }}" style="width: 90px">
                                </div>
                                <div class="col-4">
                                    <h5 class="m-0">{{ $item->cart_has_product->nama_product }}</h5>
                                    <p class="m-0" style="color:#B7B7B7;">IDR
                                        {{ number_format($item->cart_has_product->harga_product, 0) }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="minus btn btn-sm"
                                        style="background-color: #EAEAEF; color: white;" data-id="{{ $item->id }}"
                                        data-qty="{{ $item->cart_has_product->stock_product }}"><i
                                            class="fas fa-minus-circle"></i></button>
                                    <span class="mx-2" id="qty{{ $item->id }}">{{ $item->qty }}</span>
                                    <button type="button" class="plus btn btn-sm btn-success" style="color: white;"
                                        data-id="{{ $item->id }}"
                                        data-qty="{{ $item->cart_has_product->stock_product }}"><i
                                            class="fas fa-plus-circle"></i></button>
                                </div>
                                <div class="col-2 text-right">
                                    <form action="{{ route('cart.delete', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="color: white;"><i
                                                class="fas fa-times-circle"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <h4 class="mb-3" style="margin-top: 100px;">Your Address</h4>
                        <form>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Alamat lengkap">
                            </div>
                            <div class="form-group">
                                <label for="address2">Address II</label>
                                <input type="text" class="form-control" id="address2" placeholder="Alamat tambahan">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <select class="custom-select">
                                    <option selected>Select City</option>
                                    <option value="1">Bandung</option>
                                    <option value="2">Jakarta</option>
                                    <option value="3">Surabaya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select class="custom-select">
                                    <option selected>Select Country</option>
                                    <option value="1">Indonesia</option>
                                    <option value="2">Malaysia</option>
                                    <option value="3">Singapore</option>
                                </select>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Check Out Know !!</h4>
                            <hr>
                            <p>Your Not Have Item Check Out</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-5">
                    <div class="card rounded-0 checkout-detail">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Biaya</h5>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @foreach ($cartItems as $cart)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="m-0">{{ $cart->cart_has_product->nama_product }}</h6>
                                            <input type="hidden" name="id_product[]" value="{{ $cart->id }}">
                                            <div style="color: #B7B7B7; font-size:15px">
                                                <span id="finalQty{{ $cart->id }}">{{ $cart->qty }}</span>
                                                Items
                                            </div>

                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <h6 class="m-0 align-self-center text-success">IDR
                                                {{ number_format($cart->cart_has_product->harga_product * $cart->qty, 0) }}
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                                <hr>

                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="m-0">Courier</h6>
                                        <small style="color: #B7B7B7;">JNT Express</small>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <?php $rp = 201000; ?>
                                        <h6 class="m-0 align-self-center text-success">IDR
                                            {{ number_format($rp) }}</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="m-0">Tax</h6>
                                        <small style="color: #B7B7B7;">Negara 20%</small>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6 class="m-0 align-self-center text-success">IDR 1.799.000</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="m-0">Eid Promo</h6>
                                        <small style="color: #B7B7B7;">10% OFF</small>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6 class="m-0 align-self-center text-danger">-IDR 50.000.000</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="m-0">Total Harga</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6 class="m-0 align-self-center text-primary">IDR 1.520.940.300</h6>
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('welcome') }}" type="button" class="btn btn-block"
                                style="background-color: #EAEAEF; color: #ADADAD;">Cancel</a>
                        </div>
                        <div class="col">

                            <button type="submit" class="btn btn-warning btn-block text-white" data-toggle="modal"
                                data-target="#checkoutModal">Checkout</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Checkout -->

    <!-- Modal -->
    <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="img/cart/sukses_checkout.png" class="mb-5">
                    <h3>Checkout Berhasil</h3>
                    <p>Anda akan mendapatkan barang anda <br> dalam beberapa hari</p>
                    <button type="button" class="btn mt-3" style="background-color: #EAEAEF; color: #ADADAD;"
                        data-dismiss="modal">Home</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="border-top p-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-1">
                    <a href="">
                        <img src="{{ asset('assets') }}/img/logo_small.png">
                    </a>
                </div>
                <div class="col-4 text-right">
                    <a href="">
                        <img src="{{ asset('assets') }}/img/social/fb.png">
                    </a>
                    <a href="">
                        <img src="{{ asset('assets') }}/img/social/twitter.png">
                    </a>
                    <a href="">
                        <img src="{{ asset('assets') }}/img/social/ig.png">
                    </a>
                </div>
            </div>
            <div class="row mt-3 justify-content-between">
                <div class="col-5">
                    <p>All Rights Reserved by Hefa Store Copyright 2019.</p>
                </div>
                <div class="col-6">
                    <nav class="nav justify-content-end text-uppercase">
                        <a class="nav-link active" href="#">Jobs</a>
                        <a class="nav-link" href="#">Developer</a>
                        <a class="nav-link" href="#">Terms</a>
                        <a class="nav-link pr-0" href="#">Privacy Policy</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/js/all.js"></script>
    <script>
        $('.plus').on('click', function() {
            id = $(this).data("id")
            var oldValue = $("#qty" + id).text();
            if ($("#qty" + id).text() > $(this).data("qty")) {
                $("#qty" + id).text(parseFloat(oldValue) - 0);
                $("#finalQty" + id).text(parseFloat(oldValue) - 0);
                alert('Qty Melebihi Stock')
            }
            $.ajax({
                url: "{{ route('api.updateCart') }}",
                type: "post",
                data: {
                    id: id,
                    qty: parseFloat(oldValue) + 1

                },
                success: function(response) {
                    $("#qty" + id).text(parseFloat(oldValue) + 1);
                    $("#finalQty" + id).text(parseFloat(oldValue) + 1);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
        $('.minus').on('click', function() {
            id = $(this).data("id")
            var oldValue = $("#qty" + id).text();

            console.log($(this).data("qty"))
            if ($("#qty" + id).text() <= 0) {
                $("#qty" + id).text(parseFloat(oldValue) + 0);
                $("#finalQty" + id).text(parseFloat(oldValue) + 0);
                alert('Qty Kurang Minimum Belanja')
            }
            $.ajax({
                url: "{{ route('api.updateCart') }}",
                type: "post",
                data: {
                    id: id,
                    qty: parseFloat(oldValue) - 1

                },
                success: function(response) {
                    $("#qty" + id).text(parseFloat(oldValue) - 1);
                    $("#finalQty" + id).text(parseFloat(oldValue) - 1);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
    </script>
</body>

</html>
