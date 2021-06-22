@extends('web.layouts.app')

@section('title', 'E-store')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3>Special Eid</h3>
                <p>Promo pakaian cocok untuk lebaran</p>
            </div>
        </div>
        <div class="row">
            @foreach ($p_prduct as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="{{ $item->image_product }}" class="figure-img img-fluid">
                            @auth
                                <a href="{{ route('show.welcome', $item) }}/#sigleProduct"
                                    class=" d-flex justify-content-center">
                                    <img src="{{ asset('assets') }}/img/detail.png" class="align-self-center">
                                </a>
                            @endauth
                            @guest
                                <a href="#" class=" d-flex justify-content-center" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <img src="{{ asset('assets') }}/img/detail.png" class="align-self-center">
                                </a>
                            @endguest
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h6>{{ $item->nama_product }}</h6>
                            <h6>Stock {{ $item->stock_product }}</h6>
                            <h6>Rp. {{ number_format($item->harga_product, 0) }}</h6>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <div class="col-12 mt-4">
                <div class="text-center">
                    {{ $p_prduct->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notification ... </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Harap Login Terlebih Dahulu...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
