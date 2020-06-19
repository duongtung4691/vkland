<?php

namespace App\Core\Business;
use Illuminate\Support\Facades\Storage;

class UploadFileBusiness
{
    public static function setFolderPublic($yearDir, $monthDir, $dayDir)
    {
        // Set permission public 0755 folder
        Storage::disk('sftp')->setVisibility(Storage::disk('sftp')->path('/' . $yearDir), 'public');
        Storage::disk('sftp')->setVisibility(Storage::disk('sftp')->path('/' . $yearDir . '/' . $monthDir), 'public');
        Storage::disk('sftp')->setVisibility(Storage::disk('sftp')->path('/' . $yearDir . '/' . $monthDir . '/' . $dayDir), 'public');
    }
}
