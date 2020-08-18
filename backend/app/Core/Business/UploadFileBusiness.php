<?php

namespace App\Core\Business;
use File;

class UploadFileBusiness
{
    public static function uploadFileToFolder($file)
    {
        $yearDir = date('Y');
        $monthDir = date('m');
        $dayDir = date('d');
        $destinationPath = 'uploads/' . $yearDir . '/' . $monthDir . '/' . $dayDir;
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true);
        }
        $file->move($destinationPath, $file->getClientOriginalName());
        return "/$yearDir/$monthDir/$dayDir/" . $file->getClientOriginalName();
    }
}
