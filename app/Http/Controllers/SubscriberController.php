<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subscriber.index');
    }

    public function data()
    {
        $query = Subscriber::orderBy('created_at');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('email', function ($query) {
                return '<a href="mailto:' . $query->email . '" target="_blank">' . $query->email . '</a>';
            })
            ->editColumn('created_at', function ($query) {
                return tanggal_indonesia($query->created_at);
            })
            ->addColumn('action', function ($query) {
                return '
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('subscriber.destroy', $query->id) . '`,`' . $query->email . '`)"><i class="fas fa-trash"></i></button>

                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->json(['data' => null, 'message' => 'Subscriber berhasil dihapus']);
    }
}
