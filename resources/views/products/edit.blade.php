@extends('template')
@section('content')
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">{{ $title }}</h6>
        </div>
        <div class="card-body pt-4 p-0">
            
            <form method="post" enctype="multipart/form-data" action="{{ route('produk.edit.act', $data->id) }}" class="card-body p-3">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ @$data->id ? @$data->id : 0 }}">
                @if(session('message'))
                <div class="alert alert-success">
                    <div class="small text-white">{{ session('message') }}</div>
                </div>
                @endif
                <div class="form-group">
                    <label>Nama Produk</label>
                    @error('title')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="title" id="title" placeholder="Nama Produk" class="form-control" value="{{ old('title') ? old('title') : @$data->title }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Harga</label>
                            @error('price')
                            <bR><small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') ? old('price') : @$data->price }}">
                        </div>
                        <div class="col-sm-6">
                            <label>Rating</label>
                            @error('rating')
                            <bR><small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text" name="rating" id="rating" placeholder="Rating" class="form-control" value="{{ old('rating') ? old('rating') : @$data->rating }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Diskon Percentage</label>
                    @error('discount_percentage')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="discount_percentage" id="discount_percentage" placeholder="Diskon Percentage" class="form-control" value="{{ old('discount_percentage') ? old('discount_percentage') : @$data->discount_percentage }}">
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    @error('stock')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="stock" id="stock" placeholder="Stock" class="form-control" value="{{ old('stock') ? old('stock') : @$data->stock }}">
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    @error('brand')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="brand" id="brand" placeholder="Brand" class="form-control" value="{{ old('brand') ? old('brand') : @$data->brand }}">
                </div>
                <div class="form-group">
                    <label>Thumbnail</label>
                    @error('thumbnail')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="thumbnail" id="thumbnail" placeholder="Thumbnail" class="form-control" value="{{ old('thumbnail') ? old('thumbnail') : @$data->thumbnail }}">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    @error('description')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <textarea name="description" id="description" style="height:25vh;" placeholder="Deskripsi" class="form-control">{{ old('description') ? old('description') : @$data->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Produk Image 1</label>     
                    @error('produk_image_1')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_1" src="{{ @$data->produk_image_1 ? $data->produk_image_1 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_1" style="display:none;" id="produk_image_1" type="file" onchange="readURL(this, 'produk_image_1');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_1').click();">Upload Foto</button>
                </div>
                <div class="form-group">
                    <label>Produk Image 1</label>     
                    @error('produk_image_1')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_1" src="{{ @$data->produk_image_1 ? $data->produk_image_1 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_1" style="display:none;" id="produk_image_1" type="file" onchange="readURL(this, 'produk_image_1');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_1').click();">Upload Foto</button>
                </div>
                <div class="form-group">
                    <label>Produk Image 2</label>     
                    @error('produk_image_1')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_2" src="{{ @$data->produk_image_2 ? $data->produk_image_2 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_2" style="display:none;" id="produk_image_2" type="file" onchange="readURL(this, 'produk_image_2');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_2').click();">Upload Foto</button>
                </div>
                <div class="form-group">
                    <label>Produk Image 3</label>     
                    @error('produk_image_3')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_3" src="{{ @$data->produk_image_3 ? $data->produk_image_3 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_3" style="display:none;" id="produk_image_3" type="file" onchange="readURL(this, 'produk_image_3');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_3').click();">Upload Foto</button>
                </div>
                <div class="form-group">
                    <label>Produk Image 4</label>     
                    @error('produk_image_1')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_4" src="{{ @$data->produk_image_4 ? $data->produk_image_4 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_4" style="display:none;" id="produk_image_4" type="file" onchange="readURL(this, 'produk_image_4');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_4').click();">Upload Foto</button>
                </div>
                <div class="form-group">
                    <label>Produk Image 5</label>     
                    @error('produk_image_5')
                    <bR><small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="alert alert-secondary text-center col-sm-6">
                        <img id="blah_produk_image_5" src="{{ @$data->produk_image_5 ? $data->produk_image_5 : asset('assets/img/logo/logo.png') }}" style="width:200px;" onerror="imgError(this)" alt="..." loading="lazy">
                    </div>
                    <input class="form-control" name="produk_image_5" style="display:none;" id="produk_image_5" type="file" onchange="readURL(this, 'produk_image_5');">
                    <button class="btn btn-outline-success btn-sm" type="button" onclick="$('#produk_image_5').click();">Upload Foto</button>
                </div>
                <div class="form-group text-end">
                    <a type="button" href="{{ route('produk.list') }}" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>
@endSection 