<?php

namespace App\Http\Controllers\API;
use App\Models\Mahasiswa;
use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::getMahasiswa()->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => '',
            'id_barang' => 'required',
        ]);
        try {
            //$filename = time().$request->file('foto')->getClientOriginalName();
            //$path = $request->file('foto')->storeAs('uploads/mahasiswas', $filename);
            //$validasi['foto']=$path;
            $response = Mahasiswa::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' =>[$e -> getMessage()]
                )
            ]);
        }
    }

    function barang(){
        $data = Barang::all();
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => '',
            'id_barang' => 'required',
        ]);
        try {
            //if($request->file('foto')){
                //$filename = time().$request->file('foto')->getClientOriginalName();
                //$path = $request->file('foto')->storeAs('uploads/mahasiswas', $filename);
                //$validasi['foto']=$path;
            //}
            $response = Mahasiswa::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' =>[$e -> getMessage()]
                )
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' =>[$e -> getMessage()]
                )
            ]);
        }
        
        
    }
}