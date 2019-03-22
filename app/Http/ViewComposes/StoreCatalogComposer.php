<?php 

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\CatalogTag;
use App\CatalogSize;
use App\CatalogCategory;
use App\CatalogBrand;
use App\CatalogColor;

class StoreCatalogComposer
{
	public function compose(View $view)
	{   
		$tags = CatalogTag::orderBy('name', 'desc')->get();
		$sizes = CatalogSize::orderBy('name', 'asc')->get();
		$categories = CatalogCategory::orderBy('name', 'asc')->get();
		$brands = CatalogBrand::orderBy('name', 'asc')->get();
		$colors = CatalogColor::orderBy('name', 'asc')->get();
		
		$view->with('tags', $tags)
			 ->with('sizes', $sizes)
			 ->with('categories', $categories)
			 ->with('colors', $colors)
			 ->with('brands', $brands);
	}
}