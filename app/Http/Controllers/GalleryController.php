<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Gallery;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use ZipArchive;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
   public function viewGalleryList()
	{
		$galleries = Gallery::where('created_by', Auth::user()->id)->get();
		$users = User::findorFail(Auth::user()->id);
		

		return view("gallery.gallery")
		->with('galleries',$galleries)->with('users',$users);
	}
	public function saveGallery(Request $request)
	{
		//validate the request through the validation rule
		
		$validator = Validator::make(
			$request->all(),
			['gallery_name' => 'required|min:3',]);

		if($validator->fails()){
			return redirect('gallery/list')
			->withErrors($validator)
			->withInput();
		}

		$gallery = new Gallery;

		// save a new gallery
		$gallery->name = $request->input('gallery_name');
		$gallery->created_by = Auth::user()->id;
		$gallery->published =1;
		$gallery->save();

		return redirect()->back();
/*
		DB::insert('insert into gallery (name,created_by,published) values (?, ?,?)', 
			[$request->input('gallery_name'), Auth::user()->id,1]);

		return redirect()->back();*/

	}

	public function viewGalleryPics($id)
	{
		 
		$gallery = Gallery::findorFail($id);

		// check ownership
		if($gallery->created_by != Auth::user()->id)
		{
			return view('errors.error');
			//abort('403','You are not allowed to view this gallery');
		}
		return view('gallery.gallery-view')
		->with('gallery',$gallery);
	}
	public function uploadImages($id){
        $gallery = Gallery::findorFail($id);
        //load the Gallery
     	
     	$users = User::findorFail(Auth::user()->id);
		if($users->upload_permission == "no")
		{
			return view('errors.error');
		}

		// check ownership
		if($gallery->created_by != Auth::user()->id)
		{
			return view('errors.error');
		}

        
        return view('gallery.gallery-upload')
        ->with('gallery',$gallery);
    }
	public function doImageUpload(Request $request)
	{
		//get the file name form the post request
		$file = $request->file('file');
		//set my new file name
		$filename = uniqid() . $file->getClientOriginalName();
		
		
		//check if folder exist or not,if not . create
		if(!file_exists('gallery/images/'))
		{
			mkdir('gallery/images',0777,true);
		}
		//save the file to correct location
		$file->move('gallery/images', $filename);

		if(!file_exists('gallery/images/thumbs'))
		{
			mkdir('gallery/images/thumbs',0777,true);
		}
		$thumb = Image::make('gallery/images/'.$filename)->resize(240,160)
		->save('gallery/images/thumbs/'.$filename,50);

		//save the image details into database 
		$gallery = Gallery::find($request->input('gallery_id'));
		$image = $gallery->images()->create([ 
				'gallery_id' => $request->input('gallery_id'),
				'file_name' => $filename,
				'file_size' => $file->getClientSize(),
				'file_mime' => $file->getClientMimeType(),
				'file_path' => 'gallery/images/' . $filename,
				'created_by' => Auth::user()->id,

			]);

	//return redirect('gallery/list');
	}

	public function deleteGallery($id)
	{
		//load the Gallery
		$currentGallery = Gallery::findorFail($id);

		// check ownership

		if($currentGallery->created_by != Auth::user()->id)
		{
			return view('errors.error');
		}

		//get the images
		$images = $currentGallery->images();

		//delete the images
		foreach ($currentGallery->images as $image) {
			
			unlink(public_path($image->file_path));
			unlink(public_path('/gallery/images/thumbs/'. $image->file_name));

			
		}

		//delete the DB records
		$images->delete();


		$currentGallery->delete();

		return redirect()->back();
	}

	public function downloadImages($id)
	{
		//load the Gallery
		 $gallery = Gallery::findorFail($id);
		$currentGallery = Gallery::findorFail($id);

		$images = $currentGallery->images();
		$usersa = User::findorFail(Auth::user()->id);

		$users = DB::table('users');
			if($usersa->download_permission == "no")
		{
			return view('errors.error');
		}

		// check ownership
		if($gallery->created_by != Auth::user()->id)
		{
			return view('errors.error');
		}

		// if($users->download_permission == "no")
		// {
		// 	abort('403','You are not allowed to download this gallery');
		// }

		//zip files
		 /*$zip = new ZipArchive;
		 $zip_name = $gallery->name.".zip"; // Zip name

		 if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
		{ 
		 // Opening zip file to load files
		$error .= "* Sorry ZIP creation failed at this time";
		}
		foreach ($currentGallery->images as $image) 
		{ 
		$zip->addFile(public_path($image->file_path)); // Adding files into zip
		}
		$zip->close();
		if(file_exists($zip_name))
		{
		// push to download the zip
		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename="'.$zip_name.'"');
		readfile($zip_name);
		// remove zip file is exists in temp path
		unlink($zip_name);
		}*/

		$zip = new ZipArchive();
		$zip_name = $currentGallery->name.".zip";
		$zip-> open($zip_name,ZipArchive::CREATE);


	
		foreach ($currentGallery->images as $image) {	
				
				  $zip->addFile($image->file_path);
				
				
		 }

		/* return response()->download($zip, $zip_name, array(
	    'content-type'          => 'application/zip',
	    'Content-disposition:'  =>  'attachment; filename=filename.zip',
	    'Content-Length:'       => filesize($zip_name)
		));*/
	
		$zip->close();
		if(file_exists(public_path($zip_name))){
    
		return response()->download(public_path($zip_name))->deleteFileAfterSend(true);

		}
		

		}


}
