<?php

namespace App\Http\Controllers\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogColor;

class ColorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */
    
    public function index(Request $request)
    {   
        $name = $request->get('name');

        if(isset($name)){
            $items = CatalogColor::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $items = CatalogColor::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.colors.index')->with('items', $items);
    }

    public function show($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.colors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:2|max:250|unique:catalog_colors',
        ],[
            'name.required' => 'Debe ingresar un nombre al color',
            'name.unique'   => 'El color ya existe',
        ]);

        $category = new CatalogColor($request->all());
        $category->save();
        
        return redirect()->route('cat_colors.index')->with('message','Color creado');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $item = CatalogColor::find($id);
        return view('vadmin.catalog.colors.edit')->with('item', $item);
    }

    public function update(Request $request, $id)
    {
        $item = CatalogColor::find($id);

        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:catalog_colors,name,'.$item->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a el color',
            'name.unique'   => 'El color ya existe'
        ]);
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('cat_colors.index')->with('message','Color editado');
    } 

    public function updateField(Request $request)
    {
        $article = CatalogColor::find($request->id);
        $article->{$request->field} = $request->value;
        
        try {
            $article->save();
            return response()->json([
                "response" => "success",
                "action"   => $request->action
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "response" => "error",
                "message"  => $e->getMessage()
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
    {   
        
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        
        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = CatalogColor::find($id);
                    $record->delete();
                }
                return response()->json([
                    'success'   => true,
                ]); 
            }  catch (\Exception $e) {
                return response()->json([
                    'success'   => false,
                    'error'    => 'Error: '.$e
                ]);    
            }
        } else {
            try {
                $record = CatalogColor::find($id);
                $record->delete();
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
} // End
