<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralModel;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    public function add()
    {
        return view('products.add', [
            'title' => 'Produk',
            'pages' => ['Produk', 'Tambah Produk']
        ]);
    }
    
    public function add_act(Request $request){
        $data = json_decode($request->post('data-json'));
        $val = GeneralModel::getRow('m_products', '*', 'WHERE deleted_at IS NULL AND product_id="'.$data->id.'"');
        if($val){
            $request->session()->flash('message_gagal', 'Gagal!, anda sudah mempunyai produk ini');
            return redirect()->back();
        }
        $data_insert = [
            'product_id' => $data->id,
            'title' => $data->title,
            'description' => $data->description,
            'discount_percentage' => $data->discountPercentage,
            'rating' => $data->rating,
            'stock' => $data->stock,
            'brand' => $data->brand,
            'price' => $data->price,
            'category' => $data->category,
            'thumbnail' => $data->thumbnail,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $no = 1;
        foreach($data->images as $key){
            $data_insert['produk_image_'.$no] = $key;
            $no++;
        }
        GeneralModel::setInsert('m_products', $data_insert);
        $request->session()->flash('message_sukses', 'Sukses!, anda berhasil menambahkan produk');
        return redirect()->back();
    }

    public function list()
    {
        return view('products.list', [
            'title' => 'Produk',
            'pages' => ['Produk', 'List Produk']
        ]);
    }

    public function list_json(Request $request)
    {
        $where[] = ['deleted_at', '',  '', 'NULL'];
        $column_order   = ['id', 'title', 'price', 'category', 'stock'];
        $column_search  = ['title', 'price', 'category', 'stock'];
        $order = ['id' => 'DESC'];
        $list = GeneralModel::getDatatable('m_products', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->post('start');
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->title;
            $row[] = $key->price;
            $row[] = $key->category;
            $row[] = $key->stock;
            $row[] = '
                <a class="btn btn-primary btn-xxs mr-2" href="' . route('produk.detail', $key->id) . '"><li class="fa fa-info" aria-hidden="true"></li> Detail</a>
                &nbsp;
                <a class="btn btn-success btn-xxs mr-2" href="' . route('produk.edit', $key->id) . '"><li class="fa fa-edit" aria-hidden="true"></li> Edit</a>
                &nbsp;
                <a class="btn btn-danger btn-xxs" onclick="hapus(' . $key->id . ')"><li class="fa fa-trash" aria-hidden="true"></li> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => GeneralModel::countAll('m_products', $where),
            "recordsFiltered" => GeneralModel::countFiltered('m_products', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function edit(Request $request, $id)
    {
        return view('products.edit', [
            'title' => 'Edit Produk',
            'pages' => [
                'List Produk',
                'Edit Produk'
            ],
            'data' => $id > 0 ? GeneralModel::getRow('m_products', '*', 'WHERE id='.$id) : '',
        ]);
    }

    public function detail(Request $request, $id){
        return view('products.detail', [
            'title' => 'Detail Produk',
            'pages' => [
                'Produk',
                'Detail'
            ],
            'data' => GeneralModel::getRow('m_products', '*', 'WHERE id="'.$id.'"')
        ]);
    }

    public function edit_act(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'discount_percentage' => 'required',
        //     'rating' => 'required',
        //     'stock' => 'required',
        //     'brand' => 'required',
        //     'category' => 'required',
        //     'thumbnail' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        

        $data = [
            'title' => $request->post('title'),
            'description' => $request->post('description'),
            'price' => $request->post('price'),
            'discount_percentage' => $request->post('discount_percentage'),
            'rating' => $request->post('rating'),
            'stock' => $request->post('stock'),
            'brand' => $request->post('brand'),
            'thumbnail' => $request->post('thumbnail'),
            'category' => $request->post('category'),
        ];

        if ($request->hasFile('produk_image_1')) {
            $name_file = $request->file('produk_image_1')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/cover';
            $request->file('produk_image_1')->move($path, $name_file);
            $data['produk_image_1'] = asset('assets/img/cover/'.$name_file);
        }
        if ($request->hasFile('produk_image_2')) {
            $name_file = $request->file('produk_image_2')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/cover';
            $request->file('produk_image_2')->move($path, $name_file);
            $data['produk_image_2'] = asset('assets/img/cover/'.$name_file);
        }
        if ($request->hasFile('produk_image_3')) {
            $name_file = $request->file('produk_image_3')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/cover';
            $request->file('produk_image_3')->move($path, $name_file);
            $data['produk_image_3'] = asset('assets/img/cover/'.$name_file);
        }
        if ($request->hasFile('produk_image_4')) {
            $name_file = $request->file('produk_image_4')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/cover';
            $request->file('produk_image_4')->move($path, $name_file);
            $data['produk_image_4'] = asset('assets/img/cover/'.$name_file);
        }
        if ($request->hasFile('produk_image_5')) {
            $name_file = $request->file('produk_image_5')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/cover';
            $request->file('produk_image_5')->move($path, $name_file);
            $data['produk_image_5'] = asset('assets/img/cover/'.$name_file);
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        GeneralModel::setUpdate('m_products', $data, ['id' => $id]);
        // print_r($data);die;
        $request->session()->flash('message', 'Sukses!, anda berhasil memperbarui produk');
    
        return redirect()->route('produk.list');
    }

    public function delete(Request $request, $id){
        GeneralModel::setUpdate('m_products', ['deleted_at' => date('Y-m-d H:i:s')], ['id' => $id]);
        $request->session()->flash('message', 'Sukses!, anda berhasil menghapus buku');
        return redirect()->route('produk.list');
    }

    public function category()
    {
        return view('master_data.category.index', [
            'title' => 'Kategori',
            'pages' => ['Master Data', 'Kategori']
        ]);
    }

    public function category_list(Request $request)
    {
        $where[] = ['deleted_at', '',  '', 'NULL'];
        $column_order   = ['id', 'name_category'];
        $column_search  = ['name_category'];
        $order = ['id' => 'DESC'];
        $list = GeneralModel::getDatatable('m_category', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->post('start');
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->name_category;
            $row[] = '
                <a class="btn btn-success btn-xxs mr-2" onclick="main.edit(this)" data-data=\''.json_encode($key).'\'><li class="fa fa-edit" aria-hidden="true"></li> Edit</a>
                &nbsp;
                <a class="btn btn-danger btn-xxs" onclick="hapus(' . $key->id . ')"><li class="fa fa-trash" aria-hidden="true"></li> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => GeneralModel::countAll('m_category', $where),
            "recordsFiltered" => GeneralModel::countFiltered('m_category', $column_order, $column_search, $order, $where),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function category_act(Request $request, $id = 0)
    {
        $validator = Validator::make($request->all(), [
            'name_category' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $and_val = '';
        if($id){
            $and_val = ' AND id != '.$id;
        }
        $val = GeneralModel::getRow('m_category', '*', 'WHERE name_category="'.$request->post('name_category').'" '.$and_val.' AND deleted_at IS NULL');
        if (!empty($val)) {
            return redirect()->back()->withErrors([
                'name_category' => 'Nama Kategori sudah dipakai'
            ])->withInput();
        }
        $data = [
            'name_category' => $request->post('name_category'),
        ];
        if (empty($id)) {
            $data['created_at'] = date('Y-m-d H:i:s');
            GeneralModel::setInsert('m_category', $data);
            $request->session()->flash('message', 'Sukses!, anda berhasil menambahkan kategori');
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s');
            GeneralModel::setUpdate('m_category', $data, ['id' => $id]);
            $request->session()->flash('message', 'Sukses!, anda berhasil memperbarui kategori');
        }
        return redirect()->route('master_data.category');
    }

    public function category_delete(Request $request, $id){
        GeneralModel::setUpdate('m_category', ['deleted_at' => date('Y-m-d H:i:s')], ['id' => $id]);
        $request->session()->flash('message', 'Sukses!, anda berhasil menghapus kategori');
        return redirect()->route('master_data.category');
    }

    public function obstacle()
    {
        return view('master_data.obstacle.index', [
            'title' => 'Kendala',
            'pages' => ['Master Data', 'Kendala']
        ]);
    }

    public function obstacle_list(Request $request)
    {
        $where[] = ['deleted_at', '',  '', 'NULL'];
        $column_order   = ['id', 'name_obstacle'];
        $column_search  = ['name_obstacle'];
        $order = ['id' => 'DESC'];
        $list = GeneralModel::getDatatable('m_obstacle', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->post('start');
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->name_obstacle;
            $row[] = '
                <a class="btn btn-success btn-xxs mr-2" onclick="main.edit(this)" data-data=\''.json_encode($key).'\'><li class="fa fa-edit" aria-hidden="true"></li> Edit</a>
                &nbsp;
                <a class="btn btn-danger btn-xxs" onclick="hapus(' . $key->id . ')"><li class="fa fa-trash" aria-hidden="true"></li> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => GeneralModel::countAll('m_obstacle', $where),
            "recordsFiltered" => GeneralModel::countFiltered('m_obstacle', $column_order, $column_search, $order, $where),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function obstacle_act(Request $request, $id = 0)
    {
        $validator = Validator::make($request->all(), [
            'name_obstacle' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $and_val = '';
        if($id){
            $and_val = ' AND id != '.$id;
        }
        $val = GeneralModel::getRow('m_obstacle', '*', 'WHERE name_obstacle="'.$request->post('name_obstacle').'" '.$and_val.' AND deleted_at IS NULL');
        if (!empty($val)) {
            return redirect()->back()->withErrors([
                'name_obstacle' => 'Nama Kendala sudah dipakai'
            ])->withInput();
        }
        $data = [
            'name_obstacle' => $request->post('name_obstacle'),
        ];
        if (empty($id)) {
            $data['created_at'] = date('Y-m-d H:i:s');
            GeneralModel::setInsert('m_obstacle', $data);
            $request->session()->flash('message', 'Sukses!, anda berhasil menambahkan kendala');
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s');
            GeneralModel::setUpdate('m_obstacle', $data, ['id' => $id]);
            $request->session()->flash('message', 'Sukses!, anda berhasil memperbarui kendala');
        }
        return redirect()->route('master_data.obstacle');
    }

    public function obstacle_delete(Request $request, $id){
        GeneralModel::setUpdate('m_obstacle', ['deleted_at' => date('Y-m-d H:i:s')], ['id' => $id]);
        $request->session()->flash('message', 'Sukses!, anda berhasil menghapus kendala');
        return redirect()->route('master_data.obstacle');
    }
}
