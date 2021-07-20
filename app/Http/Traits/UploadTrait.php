<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    /**
     * @param UploadedFile $file
     * @return string|null
     */
    public function upload(UploadedFile $file, string $disk = 'public'): ?string
    {
        return $file->store('logos', ['disk' => $disk]);
    }
}
