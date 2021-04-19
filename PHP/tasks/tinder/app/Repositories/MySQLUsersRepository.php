<?php

namespace App\Repositories;

use App\Models\User;
use Medoo\Medoo;

class MySQLUsersRepository implements UsersRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'tinder',
            'server' => 'localhost',
            'username' => $_ENV['MYSQL_USERNAME'],
            'password' => $_ENV['MYSQL_PASSWORD']
        ]);
    }

    public function addUser(User $user): void
    {
        $this->database->insert('users', [
            'username' => $user->username(),
            'password' => $user->password(),
            'sex' => $user->sex()
        ]);
    }

    public function findUserID(string $username): ?int
    {
        $userID = $this->database->select('users', [
            'id'
        ], [
            'username' => $username
        ]);

        return $userID[0]['id'];
    }

    public function findUsername(int $id): ?string
    {
        $username = $this->database->select('users', [
            'username'
        ], [
            'id' => $id
        ]);

        return $username[0]['username'];
    }

    public function findUserPassword(int $id): ?string
    {
        $username = $this->database->select('users', [
            'password'
        ], [
            'id' => $id
        ]);

        return $username[0]['password'];
    }
}