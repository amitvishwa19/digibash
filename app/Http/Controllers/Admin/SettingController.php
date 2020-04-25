<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\Valuestore\Valuestore;

class SettingController extends Controller
{
	private $setting;
	private $themes;

	public function __construct()
	{
		$this->setting = Valuestore::make(storage_path('app\setting.json'));

		
        $dirs = File::directories(resource_path('views\content\themes'));
        foreach($dirs as $dir){
            $this->themes[] = array(
                'folder' => basename($dir),
            );
        }
     
	}
    
    public function index()
    {	
    	$settings = $this->setting->all();
    	$themes = $this->themes;
        return view('admin.pages.setting.settings',compact('settings','themes'));   
    }

    public function update(Request $request, $id)
    {

    	if($request->app_name){	$this->setting->put('app_name',$request->app_name);}
    	if($request->app_desc){	$this->setting->put('app_description',$request->app_desc);}
    	if($request->post_per_page){ $this->setting->put('post_per_page',$request->post_per_page);}
    	if($request->app_page){	$this->setting->put('app_page',$request->app_page);}
    	if($request->app_theme){ $this->setting->put('app_theme',$request->app_theme);}
    	
    	if($request->app_icon){
    		$image_name = time().$request->app_icon->getClientOriginalName();
            $destinationPath = public_path().'/assets/';
            $img = Image::make($request->app_icon);
            $img->save($destinationPath.$image_name);
            $this->setting->put('app_icon','/assets/'. $image_name);
    	}
    	if($request->app_fevicon){
    		$image_name = time().$request->app_fevicon->getClientOriginalName();
            $destinationPath = public_path().'/assets/';
            $img = Image::make($request->app_fevicon);
            $img->save($destinationPath.$image_name);
            $this->setting->put('app_fevicon','/assets/'. $image_name);
    	}





        return redirect() ->route('setting.index')->with('success','Settings updated successfully');   
    }

}
