<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;


class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    // public function viewProduct()
    // {
    //     return view('products');
    // }

    #tampil barang yang akan di edit
    public function edit($id)
    {
        #first di gunakan untuk mengambil data 1 baris seperti row_array di CI

        $product = Product::findOrFail($id);
        // $product = Product::where('id', $id)->first();
        return view('edit', compact('product'));
    }


    #proses update data ke dalam database
    public function prosesUpdate(Request $request, $id)
    {
        Product::findOrFail($id)->update($request->all());

        //Untuk menyeleksi banyak data
        // Product::where('id', $id)->update([
        //     'name_produk' => $request->name_produk,
        //     'price'       => $request->price,
        //     'stok'        => $request->stok
        // ]);
        return redirect('/viewProduct');
    }


    //  Proses menyimpan inputan
    public function store(Request $request)
    {
        //DI GUNAKAN JIKA URUTAN INPUT SUDAH URUT 
        Product::create($request->all());

        //DI GUNAKAN JIKA URUTAN INPUT TIDAK SESUAI
        // Product::create([
        //     'name_produk' => $request->name_produk,
        //     'price'       => $request->price,
        //     'stok'        => $request->stok
        // ]);
        return redirect('/viewProduct');
    }


    #tampil semua data product
    public function viewProduct()
    {
        #compact sebagai variabel yang di panggil di view untuk pengambilan data dari controller
        $product = Product::all();
        return view('products', compact('product'));
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}
