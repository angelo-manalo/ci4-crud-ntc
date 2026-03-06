<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['name', 'email', 'password'];
    protected $useTimestamps = false;
    protected $beforeInsert  = ['hashPassword'];
    protected $beforeUpdate  = ['hashPassword'];

    /**
     * Validation rules used when registering a new user.
     * Kept in the model so the controller stays focused on flow only.
     */
    private array $registrationRules = [
        'name'             => 'required|min_length[3]|max_length[100]',
        'email'            => 'required|valid_email|is_unique[users.email]',
        'password'         => 'required|min_length[8]',
        'password_confirm' => 'required|matches[password]',
    ];

    private array $registrationMessages = [
        'name' => [
            'required'   => 'The name field is required.',
            'min_length' => 'The name must be at least 3 characters long.',
            'max_length' => 'The name must not exceed 100 characters.',
        ],
        'email' => [
            'required'   => 'The email field is required.',
            'valid_email'=> 'Please enter a valid email address.',
            'is_unique'  => 'This email address is already registered.',
        ],
        'password' => [
            'required'   => 'The password field is required.',
            'min_length' => 'The password must be at least 8 characters long.',
        ],
        'password_confirm' => [
            'required' => 'Please confirm your password.',
            'matches'  => 'The password confirmation does not match.',
        ],
    ];

    public function registerUser(array $input): bool
    {
        $data = $this->registrationData($input);

        $validation = Services::validation();
        $validation->setRules($this->registrationRules, $this->registrationMessages);

        if (! $validation->run($data)) {
            $this->validation = $validation;

            return false;
        }

        unset($data['password_confirm']);

        return $this->insert($data) !== false;
    }

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', trim($email))->first();
    }

    public function authenticate(string $email, string $password): ?array
    {
        $user = $this->findByEmail($email);

        if ($user === null || ! password_verify($password, $user['password'])) {
            return null;
        }

        return $user;
    }

    public function sessionData(array $user): array
    {
        return [
            'id'         => $user['id'],
            'name'       => $user['name'],
            'email'      => $user['email'],
            'isLoggedIn' => true,
        ];
    }

    public function registrationData(array $input): array
    {
        return [
            'name'             => trim((string) ($input['name'] ?? '')),
            'email'            => trim((string) ($input['email'] ?? '')),
            'password'         => (string) ($input['password'] ?? ''),
            'password_confirm' => (string) ($input['password_confirm'] ?? ''),
        ];
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password']) && $data['data']['password'] !== '') {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }

        return $data;
    }
}
