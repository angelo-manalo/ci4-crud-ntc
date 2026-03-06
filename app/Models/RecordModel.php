<?php

namespace App\Models;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table         = 'records';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['title', 'description', 'category', 'remarks'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;

    protected $validationRules = [
        'title'       => 'required|min_length[3]|max_length[255]',
        'description' => 'required|min_length[10]',
        'category'    => 'required|min_length[3]|max_length[100]',
        'remarks'     => 'required|min_length[3]|max_length[255]',
    ];

    protected $validationMessages = [
        'title' => [
            'required'   => 'The title field is required.',
            'min_length' => 'The title must be at least 3 characters long.',
            'max_length' => 'The title must not exceed 255 characters.',
        ],
        'description' => [
            'required'   => 'The description field is required.',
            'min_length' => 'The description must be at least 10 characters long.',
        ],
        'category' => [
            'required'   => 'The category field is required.',
            'min_length' => 'The category must be at least 3 characters long.',
            'max_length' => 'The category must not exceed 100 characters.',
        ],
        'remarks' => [
            'required'   => 'The remarks field is required.',
            'min_length' => 'The remarks must be at least 3 characters long.',
            'max_length' => 'The remarks must not exceed 255 characters.',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getLatestPaginated(int $perPage = 10): array
    {
        return $this->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    public function findOrFail(int $id): array
    {
        $record = $this->find($id);

        if ($record === null) {
            throw PageNotFoundException::forPageNotFound('Record not found.');
        }

        return $record;
    }

    public function createRecord(array $input): bool
    {
        return $this->insert($this->formData($input)) !== false;
    }

    public function updateRecord(int $id, array $input): bool
    {
        return $this->update($id, $this->formData($input));
    }

    public function deleteRecord(int $id): ?bool
    {
        $record = $this->find($id);

        if ($record === null) {
            return null;
        }

        return $this->delete($record['id']);
    }

    public function emptyRecord(): array
    {
        return [
            'id'          => null,
            'title'       => '',
            'description' => '',
            'category'    => '',
            'remarks'     => '',
            'created_at'  => null,
            'updated_at'  => null,
        ];
    }

    public function dashboardSummary(): array
    {
        $totalRecords = $this->countAllResults();
        $latestRecord = $this->orderBy('created_at', 'DESC')->first();
        $recentRecords = $this->orderBy('created_at', 'DESC')->findAll(5);

        return [
            'totalRecords' => $totalRecords,
            'latestRecord' => $latestRecord,
            'recentRecords' => $recentRecords,
        ];
    }

    public function formData(array $input): array
    {
        return [
            'title'       => trim((string) ($input['title'] ?? '')),
            'description' => trim((string) ($input['description'] ?? '')),
            'category'    => trim((string) ($input['category'] ?? '')),
            'remarks'     => trim((string) ($input['remarks'] ?? '')),
        ];
    }
}
