<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Helpers\ApiFormatter;
use App\Models\Bidang;
use App\Models\Kpsih;
use App\Models\kp;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        //


        $data_query = kp::with(['Bidang', 'Dosen']);

        $result =  $data_query->where('judul', 'LIKE', '%' . $request->q . '%')->orWhere('name', 'LIKE', '%' . $request->q . '%')->orWhere('tahun', 'LIKE', '%' . $request->q . '%')->get();


        // $data = kp::with(['Bidang', 'Dosen', 'Dosen2'])->paginate();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

            //   $response = kp::create($validate);
            //   return response()->json([
            //       'success' => true,
            //       'message' => 'bisa',
            //       'data' => $response
            //   ]);
            $filename = $request->file->getClientOriginalName();
            $kp = kp::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'bidang_id' => $request->bidang_id,
                'tahun' => $request->tahun,
                'judul' => $request->judul,
                'koleksi' => $request->koleksi,
                'dosen_id' => $request->dosen_id,
                'dosen2_id' => $request->dosen2_id,
                'abstrak' => $request->abstrak,
                'file' => $request->file->StoreAs('pdf/kp', $filename, 'public')
            ]);


            $data = kp::where('id_kp', '=', $kp->id)->get();

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
        $data = kp::with(['Bidang', 'Dosen'])->where('id_kp', $id)->first();

        if(!$data){
            return ApiFormatter::createApi(400, 'id not found');
        } else{
            return ApiFormatter::createApi(200, 'success', $data);
        }

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
