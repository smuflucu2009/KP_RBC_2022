<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\helpers\ApiFormartter;
use App\helpers\ApiFormatter;
use App\Models\Bidang;
use App\Models\Gallery;
use App\Models\kp;
use App\Models\Kpsih;
use App\Models\KPv2;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        //


        $data_query = Gallery::with(['Post']);


        // $data = KPv2::with(['Bidang', 'Dosen', 'Dosen2'])->paginate();

        $data = $data_query->get();

        if($data){
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
                'post_id' => 'required',
                'file' => 'required|file|mimes:jpg,png,jpeg',

              ]);
            //   $filename = time().$request->file('file')->getClientOriginalExtension();
            //   $path = $request->file('file')->move('pdf/kp', $filename);

            //   $response = KPv2::create($validate);
            //   return response()->json([
            //       'success' => true,
            //       'message' => 'bisa',
            //       'data' => $response
            //   ]);
            $filename = str_replace(' ', '_',$request->file->getClientOriginalName());
            $kp = Gallery::create([

                'post_id' => $request->post_id,

                'file' => $request->file->StoreAs('img/news', $filename, 'public')
            ]);


            $data = Gallery::where('id', '=', $kp->id)->get();

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
        $data = kp::with(['Bidang', 'Dosen', 'Dosen2'])->where('id', $id)->first();

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


    public function uploadfile(Request $request){
        $filename = $request->file->getClientOriginalName();
        $upload_file = $request->file->storeAs('public/uploads', $filename);

        return ["result" => $upload_file];
    }
}
