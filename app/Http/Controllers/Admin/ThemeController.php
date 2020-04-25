<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ThemeController extends Controller
{
    
    public function index()
    {   
        try {

            $themes = [];
            $dirs = File::directories(resource_path('views\content\themes'));
            foreach($dirs as $dir){
                $themes[] = array(
                    'folder' => basename($dir),
                    'theme_name' => $this->getThemeDetails($dir),
                    'theme_image' => $this->checkForThemeImage(basename($dir))
                );
            }

            //dd($themes);
            return view('admin.pages.theme.theme',compact('themes'));

        } catch ( Exception $ex ) {
            Log::error( $ex->getMessage() );
        }   
    }

    public function getThemeDetails($folder)
    {
        $lines=array();
        try
        {
            $content = @fopen($folder . '\style.css','r');
            while (!feof($content)) {
               $lines[] = fgets($content);
            }
            //fclose($folder);
            //dd($lines);
        }
        catch (Exception $ex)
        {
            die($ex);
        }
        
    }
    
    public function checkForThemeImage($dir)
    {
        //return asset('resource/views/content/themes/digizigs/screenshot.png');


        return resource_path('views/content/themes/'. $dir .'/screenshot.png');

        if (file_exists( $dir . '/screenshot.png')) {
            return '/images/photos/account/default.png';
        } else {
            return '/images/photos/account/default.png';
        }  

        return asset('public\admin\img\screenshot.jpg');
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
