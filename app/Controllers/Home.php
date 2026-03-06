<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Home extends BaseController
{
    private RecordModel $records;

    public function __construct()
    {
        $this->records = new RecordModel();
    }

    public function index()
    {
        return view('dashboard', $this->records->dashboardSummary());
    }
}
