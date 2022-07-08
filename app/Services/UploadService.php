<?php

namespace App\Services;

use App\Models\UploadFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    /**
     * @param Request $request
     * @param array $extensions
     * @param Model $model
     * @return string
     */
    public function uploadMainImage(Request $request, array $extensions, Model $model): string
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $extensions)) {
                $path = Storage::disk('public')->putFile(('thumbnails'), new File($file));

                $imageOrientationService = new ImageOrientationService();
                $imageOrientationService->reset($path);
                if ($model->mainImage) {
                    $this->removeThumbFiles($model->mainImage->path);
                    $model->mainImage->extension = $extension;
                    $model->mainImage->path = $path;
                    $model->mainImage->ip = $request->ip();
                    $model->mainImage->is_enable = true;
                    $model->mainImage->save();
                } else {
                    $model->mainImage()->save(
                        UploadFile::make([
                            'path' => $path,
                            'extension' => $extension,
                            'ip' => $request->ip(),
                            'is_enable' => true
                        ])
                    );
                    $model->refresh();
                }
            } else {
                return json_encode(['message' => 'Wront file extension', 'status' => 'error']);
            }
            return json_encode(['message' => 'File uploaded correctly', 'status' => 'success', 'filePath' => $model->mainImage->path]);
        } else {
            return json_encode(['message' => 'File not exists', 'status' => 'error']);
        }
    }

    /**
     * @param string $path
     * @return void
     */
    private function removeThumbFiles(string $path)
    {
        $fileName = last(explode('/', $path));
        Storage::disk('public')->delete($path);
        Storage::disk('public')->delete(str_replace($fileName, 'main_'.$fileName, $path));
        Storage::disk('public')->delete(str_replace($fileName, 'thumb1_'.$fileName, $path));
        Storage::disk('public')->delete(str_replace($fileName, 'thumb2_'.$fileName, $path));
        Storage::disk('public')->delete(str_replace($fileName, 'thumb3_'.$fileName, $path));
        Storage::disk('public')->delete(str_replace($fileName, 'thumb4_'.$fileName, $path));
    }
}
