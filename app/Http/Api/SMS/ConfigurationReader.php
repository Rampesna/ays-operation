<?php

namespace App\Http\Api\SMS;

use App\Http\Api\SMS\FileReader;

class ConfigurationReader implements FileReader
{

    public function read($path)
    {
        if (is_readable($path)) {
            # Remember that file_get_contents() will not work if your server has *allow_url_fopen* turned off.
            return file_get_contents($path);
        }

        return false;
    }
}
