@extends('template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <h5 class="mb-0 col-8">{{ $title }}</h5>
                <div class="col-4 text-end">
                    {{-- <a href="{{ route('master_data.book.add') }}" class="btn btn-primary btn-xxs pull-right">
                        <li class="fa fa-plus" aria-hidden="true"></li> Tambah {{ $title }}
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          @if(session('message_gagal'))
          <div class="alert alert-danger">
              <div class="small text-white">{{ session('message_gagal') }}</div>
          </div>
          @endif
          @if(session('message_sukses'))
          <div class="alert alert-success">
              <div class="small text-white">{{ session('message_sukses') }}</div>
          </div>
          @endif
          <div class="p-4">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>URL API</label>
                  <input type="text" name="url-api" id="url-api" class="form-control" value="https://dummyjson.com/products" placeholder="Masukkan Url JSON disini">
                </div>
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-primary" onclick="load.search()" style="margin-top:32px;"><li class="fa fa-search"></li> Cari</button>
              </div>
            </div>
          </div>
          <div class="table-responsive p-4">
            <table class="table align-items-center mb-0" id="table-data">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody class="text-black text-xxs ps-2 sorting text-left"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <form method="post" action="{{ route('produk.add.act') }}" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produk Detail</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body"></div>
    </form>
  </div>
</div>
  
  
<script src="{{ asset('assets/import/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/import/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/import/sweetalert2.min.js') }}"></script>
<script>
    var table = $('#table-data').DataTable({
      "language": {
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      }
    });

    const load = {
      search: () => {
        var cari = $('#url-api').val();
        if(cari.length == 0){
          alert('Anda belum memasukkan url');
          return false;
        }
        $.get(cari, data => { 
          if(data.length == 0){
            alert('Gagal load data url api');
            return false;
          } else {
            let produk = data.products, html = '';
            produk.forEach((item, index, arr) => {
              table.row.add([parseInt(index)+parseInt(1), item.title, item.price, item.rating, `<button type="button" class="btn btn-success btn-xs" onclick="load.detail(this)" data-data='${JSON.stringify(item)}''>Detail</button>`]).draw(false);
            });
          }
        })
      },
      detail: that => {
        const data = $(that).data('data');
        console.log(data);
        let gambar_html = '';
        if(data.images){
          data.images.forEach((item, index, arr) => {
            gambar_html += `
            <tr>
              <td>Images ${parseInt(index)+parseInt(1)}</td>
              <td>:</td>
              <td class="text-bold"><img src="${item}" style="width:200px;"></td>
            </tr>`;
          })
        }
        let html = `
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>Title</td>
                <td>:</td>
                <td class="text-bold">${data.title}</td>
              </tr>  
              <tr>
                <td>Brand</td>
                <td>:</td>
                <td class="text-bold">${data.brand}</td>
              </tr>   
              <tr>
                <td>Kategori</td>
                <td>:</td>
                <td class="text-bold">${data.category}</td>
              </tr>   
              <tr>
                <td>Diskripsi</td>
                <td>:</td>
                <td class="text-bold">${data.description}</td>
              </tr>   
              <tr>
                <td>Diskon Percentage</td>
                <td>:</td>
                <td class="text-bold">${data.discountPercentage}</td>
              </tr>   
              <tr>
                <td>Harga</td>
                <td>:</td>
                <td class="text-bold">${data.price}</td>
              </tr>   
              <tr>
                <td>Rating</td>
                <td>:</td>
                <td class="text-bold">${data.rating}</td>
              </tr>   
              <tr>
                <td>Thumbnail</td>
                <td>:</td>
                <td class="text-bold">${data.thumbnail}</td>
              </tr>  
              ${gambar_html}
            </table>  
            <input type="hidden" name="data-json" value='${JSON.stringify(data)}'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn bg-gradient-primary">Tambah Produk</button>
        </div>
        `
        $('#modal-body').html(html);
        $('#modal-detail').modal('show');
      }
    }
</script>
@endSection