<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralModel;

class ApiController extends Controller
{

    public function login(Request $request)
    {
        if(empty($request->post('id_google'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID Google belum diinputkan'
            ]);
        }   
        if(empty($request->post('email'))){
            return response()->json([
                'code' => 401,
                'message' => 'Email belum diinputkan'
            ]);
        }  
        if(empty($request->post('name_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'Nama belum diinputkan'
            ]);
        }
        if(empty($request->post('google_img_url'))){
            return response()->json([
                'code' => 401,
                'message' => 'Google profil belum diinputkan'
            ]);
        }
        $s_val = GeneralModel::getRow('m_user', '*', 'WHERE email="'.$request->post('email').'" AND level="Read User" AND deleted_at IS NULL');
        $data = [
            'id_google' => $request->post('id_google'),
            'name_user' => $request->post('name_user'),
            'email' => $request->post('email'),
            'google_img_url' => $request->post('google_img_url'),
            'username' => $request->post('email'),
            'level' => 'Read User',
            'last_login' => date('Y-m-d H:i:s')
        ];
        if(empty($s_val)){
            $data['created_at'] = date('Y-m-d H:i:s');
            GeneralModel::setInsert('m_user', $data);
            $id_user = GeneralModel::getId();
        } else {
            GeneralModel::setUpdate('m_user', $data, ['id' => $s_val->id]);
            $id_user = $s_val->id;
        }
        return response()->json([
            'code' => 200,
            'data' => GeneralModel::getRow('m_user', '*', 'WHERE id='.$id_user),
            'message' => 'Anda berhasil login'
        ]);
    }

    public function recommendation_list(){
        $data = GeneralModel::getRes('tb_read_history', 'COUNT(1) AS jml, m_book.*', 'LEFT JOIN m_book ON tb_read_history.id_book = m_book.id WHERE tb_read_history.deleted_at IS NULL GROUP BY tb_read_history.id_book ORDER BY jml DESC LIMIT 10');
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }
    
    public function latest_list(){
        $data = GeneralModel::getRes('m_book', '*', 'WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT 10');
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function get_mybook(Request $request){
        if(empty($request->post('id_book'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID Buku tidak ditemukan'
            ]);
        }
        $s_book = GeneralModel::getRow('m_book', '*', 'WHERE id="'.$request->post('id_book').'" AND deleted_at IS NULL');
        if(empty($s_book)){
            return response()->json([
                'code' => 401,
                'message' => 'Buku tidak ditemukan'
            ]);
        }
        if(empty($request->post('id_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID User tidak ditemukan'
            ]);
        }
        $s_user = GeneralModel::getRow('m_user', '*', 'WHERE id="'.$request->post('id_user').'" AND deleted_at IS NULL');
        if(empty($s_user)){
            return response()->json([
                'code' => 401,
                'message' => 'Akun tidak ditemukan'
            ]);
        }
        $s_val = GeneralModel::getRow('tb_user_book', '*', 'WHERE id_book="'.$request->post('id_book').'" AND id_user="'.$request->post('id_user').'" AND deleted_at IS NULL');
        if(empty($s_val)){
            return response()->json([
                'code' => 404,
                'message' => 'Anda belum mempunyai buku '.$s_book->name_book
            ]);
        }
        return response()->json([
            'code' => 200,
            'message' => 'Sukses'
        ]);
    }

    public function act_mybook(Request $request){
        if(empty($request->post('id_book'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID Buku tidak ditemukan'
            ]);
        }
        $s_book = GeneralModel::getRow('m_book', '*', 'WHERE id="'.$request->post('id_book').'" AND deleted_at IS NULL');
        if(empty($s_book)){
            return response()->json([
                'code' => 401,
                'message' => 'Buku tidak ditemukan'
            ]);
        }
        if(empty($request->post('id_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID User tidak ditemukan'
            ]);
        }
        $s_user = GeneralModel::getRow('m_user', '*', 'WHERE id="'.$request->post('id_user').'" AND deleted_at IS NULL');
        if(empty($s_user)){
            return response()->json([
                'code' => 401,
                'message' => 'Akun tidak ditemukan'
            ]);
        }
        $s_val = GeneralModel::getRow('tb_user_book', '*', 'WHERE id_book="'.$request->post('id_book').'" AND id_user="'.$request->post('id_user').'" AND deleted_at IS NULL');
        if(empty($s_val)){
            GeneralModel::setInsert('tb_user_book', [
                'id_book' => $request->post('id_book'),
                'id_user' => $request->post('id_user'),
                'name_user' => $s_user->name_user,
                'name_book' => $s_book->name_book,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'Sukses, anda berhasil menambahkan ke koleksi'
            ]);
        } else {
            GeneralModel::setDelete('tb_user_book', ['id' => $s_val->id]);
            return response()->json([
                'code' => 200,
                'message' => 'Sukses, anda berhasil menghapus koleksi'
            ]);
        }
    }

    public function koleksi_list(Request $request){
        $paging = 0;
        $lanjut = 0;
        $and_all = '';
        if($request->post('paging')){
            $paging = $request->post('paging');
        }
        if($paging > 0){
            $paging = $paging*100;
        }
        if($request->post('id_kategori')){
            $and_all = ' AND id_category='.$request->post('id_kategori');
        }
        if($request->post('cari')){
            $and_all = ' AND (name_book LIKE "%'.$request->post('cari').'%" OR sku LIKE "%'.$request->post('cari').'%")';
        }
        $s_book = GeneralModel::getRes('m_book', '*', 'WHERE deleted_at IS NULL'.$and_all.' ORDER BY id DESC LIMIT '.$paging.', 100');
        $count_book = GeneralModel::getRow('m_book', 'COUNT(1) AS jml', 'WHERE deleted_at IS NULL'.$and_all)->jml;
        if($paging > 0 && $count_book > $paging){
            $lanjut = 1;
        }
        return response()->json([
            'code' => 200,
            'data' => [
                'book' => $s_book,
                'next' => $lanjut
            ]
        ]);
    }

    public function kategori_list(){
        return response()->json([
            'code' => 200,
            'data' => GeneralModel::getRes('m_category', '*', 'WHERE deleted_at IS NULL')
        ]);
    }

    public function saran_list(){
        return response()->json([
            'code' => 200,
            'data' => GeneralModel::getRes('m_obstacle', '*', 'WHERE deleted_at IS NULL')
        ]);
    }

    public function saran_act(Request $request){
        if(empty($request->post('name_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'Name User tidak ditemukan'
            ]);
        }
        if(empty($request->post('email'))){
            return response()->json([
                'code' => 401,
                'message' => 'Email tidak ditemukan'
            ]);
        }
        if(empty($request->post('id_obstacle'))){
            return response()->json([
                'code' => 401,
                'message' => 'Saran belum dipilih'
            ]);
        }
        if(empty($request->post('notes'))){
            return response()->json([
                'code' => 401,
                'message' => 'Catatan belum diisi'
            ]);
        }
        if(empty($request->post('id_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID User tidak ditemukan'
            ]);
        }
        $s_user = GeneralModel::getRow('m_user', '*', 'WHERE id='.$request->post('id_user').' AND deleted_at IS NULL');
        if(empty($s_user)){
            return response()->json([
                'code' => 401,
                'message' => 'User tidak ditemukan'
            ]);
        } 
        $s_obstacle = GeneralModel::getRow('m_obstacle', '*', 'WHERE id='.$request->post('id_obstacle').' AND deleted_at IS NULL');
        // dd(GeneralModel::lastQuery());die();
        if(empty($s_obstacle)){
            return response()->json([
                'code' => 401,
                'message' => 'Saran tidak ditemukan'
            ]);
        } 
        $data = [
            'id_obstacle' => $request->post('id_obstacle'),
            'id_user' => $request->post('id_user'),
            'name_user' => $request->post('name_user'),
            'email' => $request->post('email'),
            'obstacle' => $s_obstacle->name_obstacle,
            'notes' => $request->post('notes'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        if ($request->hasFile('photo')) {
            $name_file = $request->file('photo')->getClientOriginalName();
            $path = $_SERVER['DOCUMENT_ROOT'].'/assets/img/obstacle';
            $request->file('photo')->move($path, $name_file);
            $data['photo'] = $name_file;
        }
        GeneralModel::setInsert('tb_feedback', $data);
        return response()->json([
            'code' => 200,
            'message' => 'Sukses, anda berhasil melakukan feedback'
        ]);
    }
  
    public function list_mybook(Request $request){
        if(empty($request->post('id_user'))){
            return response()->json([
                'code' => 401,
                'message' => 'ID User tidak ditemukan'
            ]);
        }
        $s_user = GeneralModel::getRow('m_user', '*', 'WHERE id="'.$request->post('id_user').'" AND deleted_at IS NULL');
        if(empty($s_user)){
            return response()->json([
                'code' => 401,
                'message' => 'Akun tidak ditemukan'
            ]);
        }
        $and_all = '';
        
        if($request->post('id_kategori')){
            $and_all = ' AND id_category='.$request->post('id_kategori');
        }
        
        if($request->post('cari')){
            $and_all = ' AND (m_book.name_book LIKE "%'.$request->post('cari').'%" OR m_book.sku LIKE "%'.$request->post('cari').'%")';
        }

        $s_val = GeneralModel::getRes('tb_user_book', '*', 'LEFT JOIN m_book ON tb_user_book.id_book = m_book.id WHERE id_user="'.$request->post('id_user').'" AND tb_user_book.deleted_at IS NULL'.$and_all);
        if(empty($s_val)){
            return response()->json([
                'code' => 404,
                'message' => 'Buku anda kosong '
            ]);
        }
        return response()->json([
            'code' => 200,
            'data' => $s_val,
            'message' => 'Sukses'
        ]);
    }

    public function profile(Request $request){
        if(empty($request->post('id_user'))){
            return response()->json([
                'code' => 401,
                'messaage' => 'ID User tidak ditemukan'
            ]);
        }
        $s_user = GeneralModel::getRow('m_user', '*', 'WHERE id='.$request->post('id_user').' AND deleted_at IS NULL');
        if(empty($s_user)){
            return response()->json([
                'code' => 402,
                'message' => 'User tidak ditemukan'
            ]);
        }
        return response()->json([
            'code' => 200,
            'data' => $s_user
        ]);
    }

    public function get_book(Request $request){
        $and_all = '';
        if($request->post('sku')){
            $and_all = ' AND sku="'.$request->post('sku').'"';
        }
        $s = GeneralModel::getRes('m_book', '*', 'WHERE deleted_at IS NULL'.$and_all);
        if(empty($s)){
            return response()->json([
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ]);
        }
        return response()->json([
            'code' => 200,
            'data' => $s
        ]);
    }

    
    public function reader_book(Request $request){
        $and_all = '';
        if($request->post('id_book')){
            $and_all = ' AND id_book="'.$request->post('id_book').'"';
        }
        $s = GeneralModel::getRes('tb_listbook', '*', 'WHERE id_ebook IS NOT NULL'.$and_all);
        if(empty($s)){
            return response()->json([
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ]);
        }
        return response()->json([
            'code' => 200,
            'data' => $s
        ]);
    }

    public function slide_list(Request $request){
        $s = GeneralModel::getRes('m_slide', '*', 'WHERE deleted_at IS NULL');
        if(empty($s)){
            return response()->json([
                'code' => 404,
                'message' => 'Slide tidak ditemukan'
            ]);
        }
        return response()->json([
            'code' => 200,
            'data' => $s
        ]);
    }
}

