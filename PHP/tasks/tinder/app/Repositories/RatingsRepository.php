<?php

namespace App\Repositories;

use App\Models\PictureData;

interface PicturesRepository
{
    public function addPicture(PictureData $pictureData): void;
}