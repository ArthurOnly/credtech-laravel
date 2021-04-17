<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper{
    public static function storeDoc($doc){
        $extension = $doc->extension();
        $name = uniqid("");
        $fullName = "{$name}.{$extension}";
        $doc->storeAs("docs", $fullName);
        return $fullName;
    }

    public static function deleteDoc($doc){
        Storage::delete("docs/{$doc}");
    }

    public static function verifyFiles($request, $file){
        $isValid = true;
        foreach ($file as $fileName){
            if (!($request->hasFile($fileName) && $request->file($fileName)->isValid())){
                $isValid = false;
            }
        }
        return $isValid;
    }
}