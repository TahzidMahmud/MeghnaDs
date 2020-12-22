<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Response;
use ZipArchive;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $notices=Notice::get();

        return view('notice.notice_show',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('notice.notice_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Notice::create(
            [
                'title'=>$request['title'],
                'description'=>$request['description'],
            ]
        );

        return back()->with('msg','Notice Created Succesfully..!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        $notices=Notice::orderBy('created_at', 'desc')->get();
        $now=Carbon::now();
        $date=Carbon::parse($now)->format('m-d');
        $members=Member::all();

        return view('notice.notice_board
        ',compact('notices','members','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $notice= Notice::findOrFail($id);
        return view('notice.notice_edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy( $notice)
    {

        Notice::findOrFail($notice)->delete();

        return back()->with('msg','Notice deleted Succesfully..!!');
    }
    public function download(){

        $filename="meghnads.apk";

        $file_path = public_path($filename) ;

        $public_dir=public_path();
                // Zip File Name
                $zipFileName = 'app.zip';
                // Create ZipArchive Obj
                $zip = new ZipArchive;
                if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
                    // Add File in ZipArchive
                    $zip->addFile($file_path,$filename);
                    // Close ZipArchive
                    $zip->close();
                }
                // Set Header
                $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
                $filetopath=$public_dir.'/'.$zipFileName;
                // Create Download Response
                if(file_exists($filetopath)){
                    return response()->download($filetopath,$zipFileName,$headers);
                }



    }
}
