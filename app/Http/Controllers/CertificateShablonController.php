<?php

namespace App\Http\Controllers;

use App\Models\Certificate_shablon;
use Illuminate\Http\Request;
use \PDF;

class CertificateShablonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moderator_kurs_certificate($kurs_id)
    {
        $certificate_shablons = Certificate_shablon::get();


        return view('certificate/certificate_page', [
            'certificate_shablons' => $certificate_shablons,
            'kurs_id' => $kurs_id,
        ]);
    }

    public function moderator_kurs_certificate_shablon($kurs_id, $certificate_shablon_id)
    {
        $certificate_shablons = Certificate_shablon::where('id', $certificate_shablon_id)->first();
        return view('certificate/shablons/'.$certificate_shablons->name, [
            'certificate_shablons' => $certificate_shablons,
            'kurs_id' => $kurs_id,
        ]);
    }

    public function moderator_kurs_certificate_download()
    {
        //$pdf = PDF::loadView('certificate.shablons.shablon2');
        //return $pdf->download('shablon2.pdf');

        $pdf = PDF::loadView('certificate.shablons.shablon2');
        return $pdf->download('invoice.pdf');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate_shablon  $certificate_shablon
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate_shablon $certificate_shablon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate_shablon  $certificate_shablon
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate_shablon $certificate_shablon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate_shablon  $certificate_shablon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate_shablon $certificate_shablon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate_shablon  $certificate_shablon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate_shablon $certificate_shablon)
    {
        //
    }
}