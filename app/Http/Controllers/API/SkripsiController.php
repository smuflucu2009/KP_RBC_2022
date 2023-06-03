<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\skripsi2;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $data_query = skripsi2::with(['Bidang', 'Dosen', 'Dosen2']);
        
        $result =   $data_query->where('judul', 'LIKE', '%' . $request->q . '%')->orWhere('name', 'LIKE', '%' . $request->q . '%')->get();

        // $data_query = DB::table('skripsi')
        // ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        // ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        // ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id');

    
        // $data = Skripsi::with(['Bidang', 'Dosen', 'Dosen2'])->paginate();
        if($request->bidang){
            $data_query->whereHas('Bidang', function($query) use($request){
                $query->where('name', $request->bidang);
            });
        }
        $data = $data_query->paginate();

        if(count($result)){
            return ApiFormatter::createApi(200, 'Success', $data);

        } else{
            return ApiFormatter::createApi(400, 'Failled');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {

            $request->validate([
                'name' => 'required',
                'nim' => 'required',
                'bidang_id' => 'required',
                'tahun' => 'required',
                'judul' => 'required',
                'koleksi' => 'required',
                'dosen_id' => 'required',
                'dosen2_id' => 'required',
                'abstrak' => 'required',
                'file' => 'required|file|mimes:pdf,docx',

              ]);
            //   $filename = time().$request->file('file')->getClientOriginalExtension();
            //   $path = $request->file('file')->move('pdf/kp', $filename);

            //   $response = KPv2::create($validate);
            //   return response()->json([
            //       'success' => true,
            //       'message' => 'bisa',
            //       'data' => $response
            //   ]);
            $filename = $request->file->getClientOriginalName();
            $kp = Skripsi2::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'bidang_id' => $request->bidang_id,
                'tahun' => $request->tahun,
                'judul' => $request->judul,
                'koleksi' => $request->koleksi,
                'dosen_id' => $request->dosen_id,
                'dosen2_id' => $request->dosen2_id,
                'abstrak' => $request->abstrak,
                'file' => $request->file->StoreAs('pdf/skripsi', $filename, 'public')
            ]);


            $data = Skripsi2::where('id', '=', $kp->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);

            } else{
                return ApiFormatter::createApi(400, 'Failled');
            }
          } catch (\Exception $e){
            return ApiFormatter::createApi(400, 'Failled');
          }
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
        $data = skripsi2::with(['Bidang', 'Dosen'])->where('id_skripsi', $id)->first();
        // $data= DB::table('skripsi')
        // ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        // ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        // ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')->where('id_skripsi', $id)
        // ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
        //  'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        // ->first();

        if(!$data){
            return ApiFormatter::createApi(400, 'id not found');
        } else{
            return ApiFormatter::createApi(200, 'success', $data);
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
