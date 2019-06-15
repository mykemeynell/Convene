<?php

use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if (!function_exists('json')) {
    /**
     * Creates a standardised JsonResponse object.
     *
     * @param string $message
     * @param mixed  $data
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function json(string $message, $data = null, int $status = 200)
    {
        $success = is_between($status, 200, 299);

        return response()->json(compact('success', 'status', 'message', 'data'))
            ->setStatusCode($status);
    }
}

if (!function_exists('is_between')) {
    /**
     * Test if a given value is between two given values.
     *
     * @param $value
     * @param $low
     * @param $high
     *
     * @return bool
     */
    function is_between($value, $low, $high): bool
    {
        if ($value < $low) {
            return false;
        }

        if ($value > $high) {
            return false;
        }

        return true;
    }
}

if (!function_exists('upload')) {
    /**
     * Upload a file and move into appropriate directory.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $upload
     *
     * @return \Illuminate\Support\Collection
     */
    function upload(UploadedFile $upload): Collection
    {
        $directory = 'uploads/' . date('Y/m');
        $path = storage_path("app/public/{$directory}");
        $filename = md5(microtime()) . '.' . $upload->getClientOriginalExtension();

        $info = collect([
            'uploadedName' => $filename,
            'uploadedPath' => $path,
            'uploadFilename' => "{$path}/{$filename}",
            'url' => url("storage/{$directory}/{$filename}"),
            'basename' => $upload->getBasename(),
            'clientMimeType' => $upload->getClientMimeType(),
            'clientOriginalExtension' => $upload->getClientOriginalExtension(),
            'clientOriginalName' => $upload->getClientOriginalName(),
            'extension' => $upload->getExtension(),
            'fileInfo' => $upload->getFileInfo(),
            'filename' => $upload->getFilename(),
            'group' => $upload->getGroup(),
            'mimeType' => $upload->getMimeType(),
            'owner' => $upload->getOwner(),
            'path' => $upload->getPath(),
            'pathInfo' => $upload->getPathInfo(),
            'pathname' => $upload->getPathname(),
            'perms' => $upload->getPerms(),
            'realPath' => $upload->getRealPath(),
            'size' => $upload->getSize(),
            'type' => $upload->getType(),
            'isDir' => $upload->isDir(),
            'isExecutable' => $upload->isExecutable(),
            'isFile' => $upload->isFile(),
            'isLink' => $upload->isLink(),
            'isReadable' => $upload->isReadable(),
            'isValid' => $upload->isValid(),
            'isWritable' => $upload->isWritable(),
        ]);

        $upload->move($path, $filename);

        return $info;
    }

}
