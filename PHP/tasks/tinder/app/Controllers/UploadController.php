<?php

namespace App\Controllers;

use App\Models\UploadRequest;
use App\Services\UploadService;

class UploadController
{
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function upload()
    {
        //validate empty file
        //validate file size
        //validate file type

        $request = new UploadRequest(
            $_SESSION['auth_id'],
            $_FILES['file']['type'],
            $_FILES['file']['name'],
            $_FILES['file']['tmp_name']
        );

        $this->uploadService->execute($request);

        header('Location: /edit-gallery');
    }
}