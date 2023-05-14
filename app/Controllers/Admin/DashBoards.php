<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
class DashBoards extends BaseController
{
    public function index()
    {   
        $data = [];
       $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/index");
        return view('Views/admin/main', $data);
    }
}
