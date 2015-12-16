<?php

/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * 判断文件的MIME类型是否为avi
 */
function is_avi($mimeType)
{
    return starts_with($mimeType, 'video/avi');
}

/**
 * 判断文件的MIME类型是否为rmvb
 */
function is_rmvb($mimeType)
{
    return starts_with($mimeType, 'application/vnd.rn-realmedia-vbr');
}

/**
 * 判断文件的MIME类型是否为mp3
 */
function is_mp3($mimeType)
{
    return starts_with($mimeType, 'audio/mpeg');
}

/**
 * 判断文件的MIME类型是否为txt
 */
function is_txt($mimeType)
{
    return starts_with($mimeType, 'text/plain');
}

/**
 * 判断文件的MIME类型是否为doc文档
 */
function is_doc($mimeType)
{
    return starts_with($mimeType, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
}

/**
 * 判断文件的MIME类型是否为excel文档
 */
function is_excel($mimeType)
{
    return starts_with($mimeType, '	application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
}

/**
 * 判断文件的MIME类型是否为ppt文档
 */
function is_ppt($mimeType)
{
    return starts_with($mimeType, 'application/vnd.openxmlformats-officedocument.presentationml.presentation');
}

/**
 * 判断文件的MIME类型是否为pdf文档
 */
function is_pdf($mimeType)
{
    return starts_with($mimeType, 'application/pdf');
}

/**
 * Return "checked" if true
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * Return img url for headers
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (! starts_with($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }

    return $value;
}