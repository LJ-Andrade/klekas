<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogImage;
use File;

class ImagesController extends Controller
{
    public function index()
    {
    	$images = CatalogImage::all();
    	$images->each(function($images){
    		$images->article;
    	});

		return view('vadmin.images.index')->with('images', $images);
	}
	
	public function setFeatured($id, $image)
	{
		CatalogImage::where('article_id', $id)->update([
			'featured' => false
		]);

		$articleImage = CatalogImage::find($image);
		$articleImage->featured = true;
		$articleImage->save();

		return back();
	}
	
	public function destroy(Request $request)
	{
		$path = 'webimages/catalogo/';
		$record = CatalogImage::find($request->id);
		try {
			$record->delete();
			File::Delete(public_path( $path . $record->name));
			return response()->json([
				'success'   => true,
			]);  
			
		} catch (\Exception $e) {
			return response()->json([
				'success'   => false,
				'error'    => 'Error: '.$e
			]);    
		}
	}
}
