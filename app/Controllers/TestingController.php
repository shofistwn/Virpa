<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestingController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Testing',
            'role' => 'Admin',
            'breadcrumbs' => 'Testing',
            'name' => 'Testing',
        ];
        return view('admin/layouts/newTemplates', $data);
    }
}
