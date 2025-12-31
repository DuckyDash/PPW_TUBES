<?php

namespace App\Http\Controllers;

use App\Models\Kolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KolamController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $kolams = Kolam::orderBy('created_at', 'desc')->get();
        } else {
            $kolams = Kolam::where('pemilik', Auth::user()->name)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }

        return view('data_kolam', compact('kolams'));
    }


    public function adminIndex()
    {
        $kolams = Kolam::orderBy('created_at', 'desc')->get();
        
        return view('admin.kolam.index', compact('kolams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kolam' => 'required',
            'jenis_ikan' => 'required',
            'suhu_air'   => 'required|numeric',
            'ph_air'     => 'required|numeric',
            'berat_bibit' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['pemilik'] = Auth::user()->name; 

        Kolam::create($data);

        sendNotification(
            Auth::id(),
            'Kolam Ditambahkan',
            'Kolam "' . $request->nama_kolam . '" berhasil ditambahkan.'
        );


        return redirect()->back()->with('success', 'Kolam berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kolam = Kolam::findOrFail($id);
        
        $data = $request->except(['pemilik']);
        
        $kolam->update($request->except(['pemilik']));

        return redirect()->back()->with('success', 'Data kolam berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kolam::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kolam berhasil dihapus!');
    }
}