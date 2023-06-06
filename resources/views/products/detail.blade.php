@extends('template')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card-body pt-4 p-0">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            @if($data->produk_image_1)
                                <img id="blah_profile_picture" src="{{ empty(@$data->produk_image_1) ? asset('assets/img/cover/' . $data->cover) : $data->produk_image_1 }}" onerror="imgError(this)" alt="..." class="w-100" loading="lazy">
                            @endif
                            @if($data->produk_image_2)
                                <img id="blah_profile_picture" src="{{ empty(@$data->produk_image_2) ? asset('assets/img/cover/' . $data->cover) : $data->produk_image_2 }}" onerror="imgError(this)" alt="..." class="w-100 mt-2" loading="lazy">
                            @endif
                            @if($data->produk_image_3)
                                <img id="blah_profile_picture" src="{{ empty(@$data->produk_image_3) ? asset('assets/img/cover/' . $data->cover) : $data->produk_image_3 }}" onerror="imgError(this)" alt="..." class="w-100 mt-2" loading="lazy">
                            @endif
                            @if($data->produk_image_4)
                                <img id="blah_profile_picture" src="{{ empty(@$data->produk_image_4) ? asset('assets/img/cover/' . $data->cover) : $data->produk_image_4 }}" onerror="imgError(this)" alt="..." class="w-100 mt-2" loading="lazy">
                            @endif
                            @if($data->produk_image_5)
                                <img id="blah_profile_picture" src="{{ empty(@$data->produk_image_5) ? asset('assets/img/cover/' . $data->cover) : $data->produk_image_5 }}" onerror="imgError(this)" alt="..." class="w-100 mt-2" loading="lazy">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card-body pt-4 p-0">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ $title }}</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="form-group">
                                    <label>Nama Produk</label> 
                                    <p class="ml-1 p-1">{{ @$data->title }}</p>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Harga</label>       
                                            <p class="ml-1 p-1">{{ \Helper::uang(@$data->price) }}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Rating</label> 
                                            <p class="ml-1 p-1">{{ @$data->rating }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label> 
                                    <p class="ml-1 p-1">{{ @$data->description }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label> 
                                    <p class="ml-1 p-1">{{ @$data->stock }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <p class="ml-1 p-1">{{ @$data->brand }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label> 
                                    <p class="ml-1 p-1">{{ @$data->category }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <p class="ml-1 p-1">{{ @$data->thumbnail }}</p>
                                </div>
                                <div class="form-group text-end">
                                    <a type="button" href="{{ route('produk.list') }}"
                                        class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endSection
