<?php

namespace App\Http\Traits;

use Image;
use Illuminate\Support\Facades\Storage;

trait ImagesControllerTrait {

    protected $disk = 'public';
    protected $prefix = 'images';

    /**
     * Returna una instancia del Storage Object
     *
     * @return Storage
     */
    private function storage()
    {
        return Storage::disk($this->disk);
    }

    protected function generateFilename($extention = 'jpg')
    {
        $randomName = str_random(10);

        return "{$randomName}.{$extention}";
    }

    /**
     * Comprueba si existe un archivo alojado en el servidor
     *
     * @param String $path
     * @return Boolean
    */
    protected function fileExists(String $path, String $filename) {

        return  $this->storage()->exists("{$this->prefix}/{$path}/{$filename}");
    }


    /**
     * Elimina archivos del ervidor
     *
     * @param File $images
     * @param String $path
     * @param String $filename
     * @return Boolean
    */
    protected function deleteImage(String $path, String $filename) {

        if ($this->fileExists($path, $filename))
        {
            return $this->storage()->delete("{$this->prefix}/{$path}/{$filename}");
        }

        return false;
    }

    /**
     * Suber una arvhivos al servidor
     *
     * @param File $images
     * @param String $path
     * @param String $filename
     * @return Boolean
    */
    protected function uploadImage($file, String $path, String $filename)
    {
        $image = $this->resizeImage($file);

        return $this->storage()->put("{$this->prefix}/{$path}/{$filename}", $image);
    }

    /**
     * Convierte un string de base64 a una imagen
     *
     * @param String $base64
     * @return Image
     * @return Null
     */
    protected function base64ImageDecoder(String $base64)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64)) {
            $base64Image = substr($base64, strpos($base64, ',') + 1);

            return base64_decode($base64Image);
        }

        return null;
    }

    protected function resizeImage($file) {
        $image = Image::make($file)->resize(env('IMAGE_MAX_WIDTH', 200), env('IMAGE_MAX_HEIGHT', 200), function ($constraint) {
		    $constraint->aspectRatio();
		})->encode('jpg');

        return $image;
    }

}
