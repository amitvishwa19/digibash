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
            $dirs = File::directories(base_path('public/themes'));
            foreach($dirs as $dir){
                $themes[] = array(
                    'theme_dir' => basename($dir),
                    'theme_details' => $this->getThemeDetails($dir),
                    'theme_image' => $this->checkForThemeImage($dir)
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
        $lines=[];
        try
        {
            $content = @fopen($folder . '\style.css','r');
            // while (!feof($content)) {
            //    $lines[] = fgets($content);
            // }
            // fclose($content);
            return $lines;
        }
        catch (Exception $ex)
        {
            die($ex);
        }
        
    }
    

    
    public function checkForThemeImage($dir)
    {
        if(file_exists($dir . '/screenshot.jpg')){
            return url('public/themes/' . basename($dir) . '/screenshot.jpg' );
        }else{
            return null;
        }
        

       
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        setting('app.theme',$request->theme);
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
        return response()->json(null, 204);
    }
}
