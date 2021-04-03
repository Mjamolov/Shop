<?php


class FileUploader
{
    public static function upload($folder)
    {
        if (!empty($_FILES['picture']['tmp_name'])) {
            $fileName = md5(rand(10000, 99999) . microtime()) . $_FILES["picture"]["name"];
            copy($_FILES["picture"]["tmp_name"], __DIR__ . '/../../../uploads/' . $folder . '/'
                . $fileName);

            return $fileName;
        }
        return null;
    }
}


