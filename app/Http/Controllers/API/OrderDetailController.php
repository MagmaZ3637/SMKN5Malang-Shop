<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    protected $model = OrderDetail::class;

    protected $rules = [
        'order_id' => 'required|exists:orders,order_id',
        'item_id' => 'required|exists:items,item_id',
        'jumlah' => 'required|numeric|max:12'
    ];

    protected $messages = [
        'order_id.required' => 'Order id tidak boleh kosong',
        'order_id.exists' => 'Order id tidak valid',
        'item_id.required' => 'Item id tidak boleh kosong',
        'item_id.exists' => 'Item id tidak valid',
        'jumlah.required' => 'Jumlah tidak boleh kosong',
        'jumlah.numeric' => 'Jumlah tidak valid',
    ];

    public function index(Request $request)
    {
        try {
            $page = $request->all(['limit']) ?? 10;
            $request->validate($this->rules, $this->messages);
            $response = $this->model::simplePaginate($page);
            if ($response->isEmpty()) {
                return response()->json(['message' => 'Data Kosong Tidak ada yang ditampilkan', 'success' => false, 'data' => null], 500);
            }
            return response()->json(['message' => 'Berhasil menampilkan data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate($this->rules, $this->messages);
            $response = $this->model::create($request->all());
            if (!$response) {
                return response()->json(['message' => 'Data gagal ditambahkan', 'success' => false, 'data' => null], 500);
            }
            return response()->json(['message' => 'Berhasil menambahkan data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $request->validate($this->rules, $this->messages);
            $response = $this->model::where('id', $id)->update($request->all());
            if (!$response) {
                return response()->json(['message' => 'Data gagal diubah', 'success' => false, 'data' => null], 500);
            }
            return response()->json(['message' => 'Berhasil mengubah data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->model::findOrFail($id)->delete();
            if (!$response) {
                return response()->json(['message' => 'Data gagal dihapus', 'success' => false, 'data' => null], 500);
            }
            return response()->json(['message' => 'Berhasil menghapus data', 'success' => true, 'data' => null], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $limit = $request->all('limit') ?? 10;
            $response = $this->model::where('id', $id)->simplePaginate($limit);
            if ($response->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan', 'success' => false, 'data' => null], 500);
            }
            return response()->json(['message' => 'Berhasil mengambil data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }
}
