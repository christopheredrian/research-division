<?php
/**
 * Created by PhpStorm.
 * User: seand
 * Date: 05/03/2018
 * Time: 1:56 PM
 */

namespace App\Http;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GoogleDriveUtilities
{
    public static function getFileFromCloud($filename)
    {
        $dir = '/';
        $recursive = true; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

        // Check if file exists
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();

        return $file;
    }

    public static function upload($instance, $file, $directory)
    {
        $basedOn = '';
        $filename = $instance->id;
        /** Custom naming for files depending on what type:
         * (Ordinance, Resolution, Status Report, Update Report)
         */

        if ($directory === 'statusreports' or $directory === 'updatereports') {
            if (get_class($instance->ordinance) == 'App\\Ordinance') {
                $basedOn = 'Ordinance' . $instance->ordinance->number;
            } elseif (get_class($instance->resolution) == 'App\\Resolution') {
                $basedOn = 'Resolution' . $instance->resolution->number;
            }

            $filename .= ('-' . substr(get_class($instance), strrpos(get_class($instance), "\\") + 1) .
                '-' . $basedOn . '.pdf'
            );

        } elseif ($directory === 'ordinances' or $directory === 'resolutions') {
            $filename .= ('-' . substr(get_class($instance), strrpos(get_class($instance), "\\") + 1) .
                $instance->number . '.pdf');
        } elseif ($directory === 'userimages') {
            $filename .= ('-' . substr(get_class($instance), strrpos(get_class($instance), "\\") + 1) . '.jpeg');
        }

        /**
         * File upload will depend on environment
         * local = local upload
         * production = Google Drive
         */

        if (env('APP_ENV') === 'local') {
            $file->storeAs(
                'public/' . $directory, $filename
            );

            $path = Storage::url($filename);
        } else {
            // Get file listing...
            $cloudFile = self::getFileFromCloud($filename);

            // If file does exist, delete the existing file
            if ($cloudFile !== null and $directory !== 'updatereports') {
                Storage::disk('google')->delete($cloudFile['path']);
            }

            // save NEW FILE to Google Drive
            $path = $file->storeAs(
                env('GOOGLE_DRIVE_' . strtoupper($directory) . '_FOLDER_ID'),
                $filename,
                'google');

            $cloudFile = self::getFileFromCloud($filename);

            $service = Storage::disk('google')->getAdapter()->getService();
            $permission = new \Google_Service_Drive_Permission();
            $permission->setRole('reader');
            $permission->setType('anyone');
            $permission->setAllowFileDiscovery(false);
            $permissions = $service->permissions->create($cloudFile['basename'], $permission);

            // Set path to file name for user images
            if ($directory === 'userimages') {
                $path = ($cloudFile['filename'] . '.jpeg');

                // Replace image in profile image in session
                session(['profile_image_link' => GoogleDriveUtilities::getShareableLink('userimages', $path)]);
            }

        }

        return $path;
    }

    public static function deleteFile($filename){
        $cloudFile = self::getFileFromCloud($filename);
        Storage::disk('google')->delete($cloudFile['path']);

        return null;
    }

    public static function getShareableLink($directory, $filename){
        $shareable_link = '';

        if (env('APP_ENV') === 'local') {
            $shareable_link .= '/storage/' . $directory . '/' . $filename;
        } else {
            $shareable_link .= 'https://drive.google.com/uc?id=';
            $shareable_link .= (self::getFileFromCloud($filename)['basename']);
        }

        return $shareable_link;
    }
}