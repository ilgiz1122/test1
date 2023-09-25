<?php

namespace App\Http\Controllers;

use App\Models\Partnerka;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Materialy;

class PartnerkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function proverka(Request $request, $materialyId)
    {
        $proverka = Partnerka::where('promocod', $request->promocod)->first();
        $materialies = Materialy::where('id', $materialyId)->first();

        if ($proverka != null){
            return redirect()->route('bay4', ['for_action' => $materialies->dop_category, 'podcat_id' => $materialies->materialpodcategory_id, 'materialyId' => $materialyId, 'proverkaId' => $proverka->id])->withSuccess('Куттуктайбыз, сиз 10% арзандатуу алдыңыз');
        }else{
            return redirect()->back()->withSuccess('Мындай промокод жок!');
        }
    }



    public function proverka_kursa(Request $request, $podcatId)
    {
        $proverka = Partnerka::where('promocod', $request->promocod)->first();

        if ($proverka != null){
            return redirect()->route('kupit_kupon_index', [$podcatId, $proverka->id])->withSuccess('Куттуктайбыз, сиз 10% арзандатуу алдыңыз');
        }else{
            return redirect()->back()->withSuccess2('Мындай промокод жок!');
        }
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
        $request->validate([
            'promocod' => ['required', 'string', 'max:255', Rule::unique(Partnerka::class),],
        ]);


        $partnerka = new Partnerka();
        $partnerka->user_id = \Auth::user()->id;
        $partnerka->promocod = $request->promocod;
        $partnerka->save();

       return redirect()->back()->withSuccess('Промокод түзүлдү.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partnerka  $partnerka
     * @return \Illuminate\Http\Response
     */
    public function show(Partnerka $partnerka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partnerka  $partnerka
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnerka $partnerka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partnerka  $partnerka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnerka $partnerka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partnerka  $partnerka
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partnerka = Partnerka::where('id', $id)->first();
        $partnerka->delete();

        return redirect()->back()->withSuccess('Промокод өчүрүлдү.');
    }
}