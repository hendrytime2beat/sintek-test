@extends('template')
@section('content')

<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Produk</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $data['count_product'] }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Produk Terbaru</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Produk</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['new_products'])
                                @foreach($data['new_products'] as $key)
                                    <tr>
                                        <td class="text-xxs text-center">{{ \Helper::tanggalwoah($key->created_at) }}</td>
                                        <td class="text-xxs text-center">{{ $key->title }}</>
                                        <td class="text-xxs text-center">{{ \Helper::uang($key->price) }}</>
                                        <td class="text-xxs text-center">{{ $key->rating }}</>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td class="text-xxs text-center text-black" colspan="4">Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endSection