<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $model = Orders::class;
    protected $rules = [
        'user_id' => 'required|integer|exists:users,user_id',
        'order_number' => 'required|integer|max:12',
        'order_status' => 'required|string|in:dikirim,diterima,selesai,dibatal,cart,error',
    ];
    protected $rulesMessages = [
        'user_id.integer' => 'User ID tidak valid',
        'user_id.required' => 'User ID tidak boleh kosong',
        'user_id.exists' => 'User ID tidak valid',
        'order_number.required' => 'Order Number tidak boleh kosong',
        'order_number.integer' => 'Order Number tidak valid',
        'order_number.max' => 'Order Number tidak boleh lebih dari 12',
        'order_status.required' => 'Order Status tidak boleh kosong',
        'order_status.string' => 'Order Status tidak valid',
        'order_status.in' => 'Order Status tidak valid',
    ];

    public function index(Request $request)
    {
        try {
            $limit = $request->all('limit') ?? 10;
            $response = $this->model::simplePaginate($limit);
            if ($response->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan', 'success' => false, 'data' => null], 404);
            }
            return response()->json(['message' => 'Berhasil mengambil data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data: '.$e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([$this->rules, $this->rulesMessages]);
            $response = $this->model::create($request->all());
            if (!$response) {
                return response()->json(['message' => 'Data gagal dimasukkan', 'success' => false, 'data' => null], 404);
            }
            return response()->json(['message' => 'Berhasil menambahkan data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data: '.$e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $request->validate([$this->rules, $this->rulesMessages]);
            $response = $this->model::where('id', $id)->update($request->all());
            if (!$response) {
                return response()->json(['message' => 'Data gagal diubah', 'success' => false, 'data' => null], 404);
            }
            return response()->json(['message' => 'Berhasil mengubah data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengubah data: '.$e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function destroy($id) {
        try {
            $response = $this->model::where('id', $id)->delete();
            if (!$response) {
                return response()->json(['message' => 'Data gagal dihapus', 'success' => false, 'data' => null], 404);
            }
            return response()->json(['message' => 'Berhasil menghapus data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data: '.$e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }

    public function show(Request $request, $id) {
        try {
            $limit = $request->all('limit') ?? 10;
            $response = $this->model::where('id', $id)->simplePaginate($limit);
            if ($response->isEmpty()) {
                return response()->json(['message' => 'Data tidak ditemukan', 'success' => false, 'data' => null], 404);
            }
            return response()->json(['message' => 'Berhasil mengambil data', 'success' => true, 'data' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data: '.$e->getMessage(), 'success' => false, 'data' => null], 500);
        }
    }
}
