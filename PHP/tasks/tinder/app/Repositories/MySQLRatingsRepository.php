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
        $currentUserGallery = $this->listUserPictures($pictureData->userID());
        $isMainImage = 0;

        if (empty($currentUserGallery)) {
            $isMainImage = 1;
        }

        $this->database->insert('pictures', [
            'user_id' => $pictureData->userID(),
            'path' => $pictureData->filePath(),
            'original_file_name' => $pictureData->originalFileName(),
            'is_main' => $isMainImage
        ]);
    }

    public function listUserPictures(int $userID): array
    {
        return $this->database->select('pictures', [
            'path',
            'original_file_name',
            'is_main'
        ], [
            'user_id' => $userID
        ]);
    }

    public function getPathToMainPicture(int $userID): ?string
    {
        $path = $this->database->select('pictures', [
            'path'
        ], [
            'user_id' => $userID,
            'is_main' => 1
        ]);

        return $path[0]['path'];
    }

}