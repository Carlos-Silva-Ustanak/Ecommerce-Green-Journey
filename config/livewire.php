<?php

// config/livewire.php
return [
    'temporary_file_upload' => [
        'disk' => 's3', // Store temporary files on S3
        'directory' => 'livewire-tmp',
    ],
];
