<?php
// Simple router for PHP built-in server
// This ensures static files are served properly

$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$file_path = __DIR__ . $path;

// If it's a static file and it exists, serve it
if (file_exists($file_path) && !is_dir($file_path)) {
    // Get the file extension
    $ext = pathinfo($file_path, PATHINFO_EXTENSION);
    
    // Set appropriate content type
    switch ($ext) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
        case 'png':
            header('Content-Type: image/png');
            break;
        case 'jpg':
        case 'jpeg':
            header('Content-Type: image/jpeg');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            break;
        case 'ico':
            header('Content-Type: image/x-icon');
            break;
        default:
            // Let PHP handle other files
            return false;
    }
    
    readfile($file_path);
    return true;
}

// For PHP files and directories, let PHP handle normally
return false;
?>