<?php

namespace App\Repositories;

use App\Models\PictureData;
use Medoo\Medoo;

class MySQLPicturesRepository implements PicturesRepository
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

    public function addPicture(PictureData $pictureData): void
    {
        $this->database->insert('pictures', [
            'user_id' => $pictureData->userID(),
            'path' => $pictureData->filePath(),
            'original_file_name' => $pictureData->originalFileName()
        ]);
    }

    public function listUserPictures(int $userID): array
    {
        return $this->database->select('pictures', [
            'path',
            'original_file_name'
        ], [
            'user_id' => $userID
        ]);
    }

}