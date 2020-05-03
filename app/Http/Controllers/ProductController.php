<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = Product::all();
        return response($data);
    }
    public function show($id)
    {
        $data = Product::where('id', $id)->get();
        return response($data);
    }
    public function store(Request $request)
    {
        $data = new Product();
        $data->nama = $request->input('nama');
        $data->supplier = $request->input('supplier');
        $data->harga_eceran = $request->input('harga_eceran');
        $data->harga_grosir = $request->input('harga_grosir');
        $data->category = $request->input('category');
        $data->fav = $request->input(1);
        $data->status = $request->input(2);
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id)
    {
        $data = Product::where('id', $id)->first();
        $data->nama = $request->input('nama');
        $data->supplier = $request->input('supplier');
        $data->harga_eceran = $request->input('harga_eceran');
        $data->harga_grosir = $request->input('harga_grosir');
        $data->category = $request->input('category');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}
