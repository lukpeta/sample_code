<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic;

class ThumbService
{

    private $imageQuality = 75;

    public function __construct(ImageManagerStatic $imageManager)
    {
        $this->imageManagerStatic = $imageManager;
        $this->manager = $this->imageManagerStatic::configure(array('driver' => 'gd'));
    }

    /**
     * @param string $path
     * @param bool $watermark
     * @return void
     */
    public function insertWatermark(string $path, bool $watermark): void
    {
        if ($watermark === true) {
            $img = $this->imageManagerStatic->make($path);
            $img->insert(public_path('assets/images/watermark.png'), 'bottom-right', 30, 50);
            $img->save($path);
        }
    }

    /**
     * @param string $path
     * @param int $width
     * @param bool $watermark
     * @return void
     */
    public function createMainThumb(string $path, int $width, bool $watermark): void
    {
        $path = public_path('storage/' . $path);
        $this->manager->make($path)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(str_replace(last(explode('/', $path)), '', $path) . 'main_' . last(explode('/', $path)), $this->imageQuality);

        $this->insertWatermark(str_replace(last(explode('/', $path)), '', $path) . 'main_' . last(explode('/', $path)), $watermark);
    }

    /**
     * @param string $path
     * @param int $width
     * @param int $height
     * @param bool $watermark
     * @return void
     */
    public function createCustomSizeThumb(string $path, int $width, int $height, bool $watermark): void
    {
        $path = public_path('storage/' . $path);
        $this->manager->make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save(str_replace(last(explode('/', $path)), '', $path) . 'thumb1_' . last(explode('/', $path)), $this->imageQuality);

        $this->insertWatermark(str_replace(last(explode('/', $path)), '', $path) . 'thumb1_' . last(explode('/', $path)), $watermark);
    }

    /**
     * @param string $path
     * @param int $height
     * @param bool $watermark
     * @return void
     */
    public function createAspectRatioThumbHeight(string $path, int $height, bool $watermark): void
    {
        $path = public_path('storage/' . $path);
        $this->manager->make($path)->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save(str_replace(last(explode('/', $path)), '', $path) . 'thumb2_' . last(explode('/', $path)), $this->imageQuality);

        $this->insertWatermark(str_replace(last(explode('/', $path)), '', $path) . 'thumb2_' . last(explode('/', $path)), $watermark);
    }

    /**
     * @param string $path
     * @param int $width
     * @param bool $watermark
     * @return void
     */
    public function createAspectRatioThumbWidth(string $path, int $width, bool $watermark): void
    {
        $path = public_path('storage/' . $path);
        $this->manager->make($path)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(str_replace(last(explode('/', $path)), '', $path) . 'thumb3_' . last(explode('/', $path)), $this->imageQuality);

        $this->insertWatermark(str_replace(last(explode('/', $path)), '', $path) . 'thumb3_' . last(explode('/', $path)), $watermark);
    }

    /**
     * @param string $path
     * @param int $height
     * @param bool $watermark
     * @return void
     */
    public function createUpsizeThumb(string $path, int $height, bool $watermark): void
    {
        $path = public_path('storage/' . $path);
        $this->manager->make($path)->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(str_replace(last(explode('/', $path)), '', $path) . 'thumb4_' . last(explode('/', $path)), $this->imageQuality);

        $this->insertWatermark(str_replace(last(explode('/', $path)), '', $path) . 'thumb4_' . last(explode('/', $path)), $watermark);
    }

    /**
     * @param string $path
     * @param int $width
     * @param int $height
     * @param bool $watermark
     * @return void
     */
    public function cropThumb(string $path, int $width, int $height, bool $watermark): void
    {
        $img = $this->manager->make(public_path('storage/'.$path));
        $img->crop($width, $height)->save(public_path('storage/'.$path));

        $this->insertWatermark(str_replace(last(explode('/', public_path('storage/'.$path))), '', public_path('storage/'.$path)) . last(explode('/', public_path('storage/'.$path))), $watermark);
    }

}
