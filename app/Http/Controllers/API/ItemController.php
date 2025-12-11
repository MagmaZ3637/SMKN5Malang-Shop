<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Items;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $validate = [
        'name' => 'required|min:3|max:100|string',
        'price' => 'required|max:12|integer',
        'image' => 'required|string',
        'stock' => 'required|max:12|integer',
        'brand' => 'required|max:100|string',
        'color' => 'required|max:100|string',
        'weight' => 'required|max:10|integer',
        'dimension' => 'required|max:10|string',
        'description' => 'required|string',
        'discount' => 'required|max:10|integer',
    ];

    protected $validationMessages = [
        'name.required' => 'Nama tidak boleh kosong',
        'name.min' => 'Nama minimal 3 karakter',
        'name.max' => 'Nama maximal 100 karakter',
        'price.required' => 'Harga tidak boleh kosong',
        'price.max' => 'Harga maximal 12 karakter',
        'image.required' => 'Gambar tidak boleh kosong',
        'image.string' => 'Gambar harus berupa gambar',
        'stock.required' => 'Stok tidak boleh kosong',
        'stock.max' => 'Stok maximal 12 karakter',
        'brand.required' => 'Brand tidak boleh kosong',
        'brand.max' => 'Brand maximal 100 karakter',
        'color.required' => 'Color tidak boleh kosong',
        'color.max' => 'Color maximal 10 karakter',
        'weight.required' => 'Weight tidak boleh kosong',
        'weight.max' => 'Weight maximal 10 karakter',
        'dimension.required' => 'Dimensi tidak boleh kosong',
        'dimension.max' => 'Dimensi maximal 10 karakter',
        'description.required' => 'Deskripsi tidak boleh kosong',
        'discount.required' => 'Diskon tidak boleh kosong',
        'discount.max' => 'Diskon maximal 10 karakter',
    ];

    public $model = Items::class;

    public function index(Request $request)
    {
        try {
            $params = $request->validate(['limit']) ?? 10;
            $items = $this->model::simplePaginate($params);
            if ($items->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan', 'success' => false], 404);
            }
            return response()->json(['data' => $items, 'success' => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate($this->validate, $this->validationMessages);
            $item = $this->model::create($request->all());
            if ($item) {
                return response()->json(['message' => 'Data berhasil ditambahkan', 'success' => true]);
            }
            return response()->json(['message' => 'Data gagal ditambahkan', 'success' => false], 500);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $item = $this->model::findOrFail($id);
            $request->validate($this->validate, $this->validationMessages);
            $response = $item->update($request->all());
            if ($response) {
                return response()->json(['message' => 'Data berhasil diupdate', 'success' => true]);
            }
            return response()->json(['message' => 'Data gagal diupdate', 'success' => false], 500);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function destroy($id) {
        try {
            $item = $this->model::findOrFail($id);
            $item->delete();
            return response()->json(['message' => 'Data berhasil dihapus', 'success' => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function show(Request $request,$id) {
        try {
            $limit = $request->validate(['limit']) ?? 10;
            $item = $this->model::findOrFail($id)->simplePaginate($limit);
            if ($item->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan', 'success' => false], 404);
            }
            return response()->json(['data' => $item, 'success' => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }
}
