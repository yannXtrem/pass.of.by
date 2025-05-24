<?php
namespace App\Traits;

trait HasMedia
{
    public function addMedia($filePath, $type)
    {
        return $this->media()->create([
            'file_path' => $filePath,
            'type' => $type,
        ]);
    }

    public function getMediaByType($type)
    {
        return $this->media()->where('type', $type)->get();
    }
}