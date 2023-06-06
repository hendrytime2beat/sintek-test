<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralModel;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'pages' => ['Dashboard'],
            'data' => [
                'count_product' => GeneralModel::getRow('m_products', 'COUNT(1) AS jml', 'WHERE deleted_at IS NULL')->jml,
                'new_products' => GeneralModel::getRes('m_products', '*', 'WHERE deleted_at IS NULL')
            ]
        ]);
    }
}
