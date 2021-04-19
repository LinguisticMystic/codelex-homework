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

    public function findUsername(int $userID): ?string
    {
        $username = $this->database->select('users', [
            'username'
        ], [
            'id' => $userID
        ]);

        return $username[0]['username'];
    }

    public function findUserPassword(int $userID): string
    {
        $username = $this->database->select('users', [
            'password'
        ], [
            'id' => $userID
        ]);

        return $username[0]['password'];
    }

    public function userSex(int $userID): string
    {
        $sex = $this->database->select('users', [
            'sex'
        ], [
            'id' => $userID
        ]);

        return $sex[0]['sex'];
    }

    public function findUsersOfOppositeSex(string $sex): array
    {
        return $this->database->select('users', [
            'id'
        ], [
            'sex' => $sex
        ]);
    }
}