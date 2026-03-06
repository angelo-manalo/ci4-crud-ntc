<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Records extends BaseController
{
    private RecordModel $records;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->records = new RecordModel();
    }

    public function index()
    {
        return view('records/index', [
            'records' => $this->records->getLatestPaginated(10),
            'pager'   => $this->records->pager,
        ]);
    }

    public function show($id)
    {
        return view('records/show', [
            'record' => $this->records->findOrFail((int) $id),
        ]);
    }

    public function new()
    {
        return view('records/create', [
            'record' => $this->records->emptyRecord(),
            'errors' => session('errors') ?? [],
        ]);
    }

    public function create()
    {
        if (! $this->records->createRecord($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->records->errors())->with('error', 'Please fix the highlighted errors and try again.');
        }

        return redirect()->to('/records')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        return view('records/edit', [
            'record' => $this->records->findOrFail((int) $id),
            'errors' => session('errors') ?? [],
        ]);
    }

    public function update($id)
    {
        $record = $this->records->findOrFail((int) $id);

        if (! $this->records->updateRecord($record['id'], $this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->records->errors())->with('error', 'Please fix the highlighted errors and try again.');
        }

        return redirect()->to('/records')->with('success', 'Record updated successfully.');
    }

    public function delete($id)
    {
        $deleted = $this->records->deleteRecord((int) $id);

        if ($deleted === null) {
            return redirect()->to('/records')->with('error', 'The selected record no longer exists.');
        }

        if (! $deleted) {
            return redirect()->to('/records')->with('error', 'Unable to delete the selected record.');
        }

        return redirect()->to('/records')->with('success', 'Record deleted successfully.');
    }
}
