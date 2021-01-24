<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductModel;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function create() {
        
        return view('create');
     }

    public function storeProduct(Request $request) {
        //  dd($request->all());
        $data = [
            'title' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'availability' => $request->availability,
        ];
        DB::table('products')->insert($data);
        
        DB::connection('mysql2')->table('products')->insert($data);
        // $this->validate($request, [
        //     'name' => 'required',
        //     'name_ar' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'availability' => 'required',
        // ]);
        // $product = new ProductModel();
        // $product->title = $request->name;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->availability = $request->availability;
        // if($request->hasFile('image')) {
        //     \Image::make($request->image)->save(public_path('img/profile/').$request->image);
        //     // $filepath = Storage::putfile('public/img/product', $request->file('image'));
        //     $product->image = $request->image;
        // }
       
        // $product->save();
        return redirect()->route('home')->with('messages', 'Information successfully Saved.');
    }

    public function edit($id, $con) {
        // dd($con);
        if($con == 'one') {

          $products =  DB::table('products')->where('id',$id)->first();
        }else {
            
           $products = DB::connection('mysql2')->table('products')->where('id',$id)->first();
        }
        
        return view('edit', compact(['products','con']));
        
    }

    public function update(Request $request) {
        $data = [
            'title' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'availability' => $request->availability,
        ];
        if($request->db == 'one') {

            $products =  DB::table('products')->where('id',$request->id)->update($data);
          }else {
              
             $products = DB::connection('mysql2')->table('products')->where('id',$request->id)->update($data);
          }
          
          return redirect()->route('home');
    }

    public function destroye($product, $con) {
        if($con == 'one') {

            DB::table('products')->where('id',$product)->delete();
          }else {
              
            DB::connection('mysql2')->table('products')->where('id',$product)->delete();
          }
          return redirect()->route('home')->with('messages', 'Product deleted.');
    }
}
