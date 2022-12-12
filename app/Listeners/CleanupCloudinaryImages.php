<?php

namespace App\Listeners;

use Cloudinary\Cloudinary;
use Statamic\Assets\Asset;
use Statamic\Events\AssetDeleted;

class CleanupCloudinaryImages
{
    public function removeImageFromCloudinary(AssetDeleted $event): void
    {
        /** @var Asset $asset */
        $asset = $event->asset;

        // abort if asset is not an image, cloudinary is currently only used for images
        if (! $asset->isImage()) {
            return;
        }

        try {
            $this->deleteFromCloudinary($asset);
        } catch (\Exception $ex) {
            logger()->warning("cloudinary image for {$asset->url()} could not be deleted", ['ex' => $ex]);
        }
    }

    public function subscribe($events): void
    {
        $events->listen(AssetDeleted::class, [self::class, 'removeImageFromCloudinary']);
    }

    protected function deleteFromCloudinary(Asset $asset): void
    {
        $cloudinary = resolve(Cloudinary::class);

        $path = parse_url($asset->url(), PHP_URL_PATH);
        $publicId = ltrim($path, '/');
        $extension = pathinfo($publicId, PATHINFO_EXTENSION);
        $publicId = rtrim($publicId, ".{$extension}");

        // https://cloudinary.com/documentation/image_upload_api_reference#destroy_method
        $cloudinary->uploadApi()->destroy($publicId, ['invalidate' => true]);
    }
}
