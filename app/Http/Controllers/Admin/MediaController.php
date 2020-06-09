<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MediaRequest;
use App\Http\Controllers\Controller;
use App\Models\Media;

class MediaController extends Controller
{
    /** @var string */
    private $filesystem;

    /** @var string */
    private $directory = '';

    public function __construct()
    {
        $this->filesystem = config('digizigs.storage.disk');
    }

    public function index()
    {

        return view('admin.pages.media.media');
    }

}