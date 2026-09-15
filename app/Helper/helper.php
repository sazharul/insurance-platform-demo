<?php
function sanitizeFileName($title)
{
    // Characters not allowed in file names for various OS
    $invalidCharacters = ['\\', '/', ':', '*', '?', '"', '<', '>', '|', ' '];
    // Replace invalid characters with an underscore
    $title = str_replace($invalidCharacters, '_', $title);
    return $title;
}

function image_upload($image, $title = '')
{
    // Sanitize the title
    $sanitizedTitle = sanitizeFileName($title);

    if ($image->extension() == 'pdf') {
        $imageName = 'COVERSURE' . '-' . $sanitizedTitle . '-' . rand(1, 999) . '.' . $image->extension();
        // Public Folder
        $image->move(public_path('storage/uploads'), $imageName);
        return 'storage/uploads/' . $imageName;
    } else {
        $imageName = time() . rand(1, 999) . '.' . $image->extension();
        // Public Folder
        $image->move(public_path('storage/uploads'), $imageName);
        return 'storage/uploads/' . $imageName;
    }
}

function delete_image($image_name, $path = '')
{
    if (isset($image_name)) {
        if (file_exists(public_path($image_name))) {
            unlink($image_name);
        }
    }
}

function eng_to_bng($value)
{
    $value = (int)$value;
    if (app()->getLocale() == 'en') {
        return $value;
    } else {
        $numto = new \Rakibhstu\Banglanumber\NumberToBangla();
        return $numto->bnNum($value);
    }
}

function bn_money($value)
{
    $numto = new \Rakibhstu\Banglanumber\NumberToBangla();
    return $numto->bnMoney($value);
}
