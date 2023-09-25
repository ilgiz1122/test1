<?php

namespace App\Http\Controllers;

use App\Models\Olimpiada_tury;
use App\Models\Olimpiada;
use Illuminate\Support\Facades\DB;
use App\Models\User; // добавлена для связи с подкатегориями
use App\Models\language; // добавлена для связи с подкатегориями
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Test;

class OlimpiadaTuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moderator_olimpiada_tury_index($olimpiada_id)
    {
        $olimpiada01 = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();

        if ($olimpiada01 != null) {
            $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada01->id)->where('tur_number', '>', 0)->orderBy('nachalo_zdachi_tura', 'asc')->get();
            $olimpiada_tury2 = Olimpiada_tury::where('olimpiada_id', $olimpiada01->id)->where('tur_number', '<', 1)->orderBy('nachalo_zdachi_tura', 'asc')->get();
            $test = Test::where('user_id', \Auth::user()->id)->get();

            return view('moderator.olimpoada_tury_2', [
                'olimpiada_tury' => $olimpiada_tury,
                'olimpiada_tury2' => $olimpiada_tury2,
                'olimpiada01' => $olimpiada01,
                'test' => $test,
               ]);
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }


    public function moderator_olimpiada_tury_create($olimpiada_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tur_count = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->count();

        return view('moderator.olimpiada_tury_create', [
            'olimpiada' => $olimpiada,
            'olimpiada_tur_count' => $olimpiada_tur_count,
        ]);
    }


    public function moderator_olimpiada_tury_edit($olimpiada_id, $olimpiada_tury_id)
    {
        
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();

        if ($olimpiada_tury != null) {
            return view('moderator.olimpiada_tury_edit', [
                'olimpiada' => $olimpiada,
                'olimpiada_tury' => $olimpiada_tury,
            ]);
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }


    public function moderator_olimpiada_tury_update_data_okonchanie_tura_1 ($olimpiada_id, $olimpiada_tury_id, Request $request)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();

        if ($olimpiada_tury != null) {
            
            $test = Test::where('id', $olimpiada_tury->test_id)->first();

            $data_okonchanie_tura22 = $olimpiada_tury->nachalo_zdachi_tura + $test->time;


            $data_okonchanie_tura2 = preg_replace('~[^0-9]+~','', $request->data_okonchanie_tura);

            $kun1 = substr($data_okonchanie_tura2, 0, -10);
            $ai1 = substr($data_okonchanie_tura2, 2, -8);
            $god1 = substr($data_okonchanie_tura2, 4, -4);
            $saat1 = substr($data_okonchanie_tura2, 8, 2);
            $minuta1 = substr($data_okonchanie_tura2, 10, 2);

            $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
            $data_num = strtotime($data_num3);

            if ($data_num < $data_okonchanie_tura22) {
                return redirect()->route('moderator_olimpiada_tury_index', $olimpiada_id)->withSuccess2('Турдун аяктоо убактысына, анын башталуу убактысына тесттин убактысын кошкондон чоң болуусу керек');
            }else{
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'data_okonchanie_tura' => $data_num,
                ]);

                return redirect()->route('moderator_olimpiada_tury_index', $olimpiada_id)->withSuccess('Турдун убактысы өзгөртүлдү');
            }
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }

    

    public function moderator_olimpiada_tury_update($olimpiada_id, $olimpiada_tury_id, Request $request)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();

        if ($olimpiada_tury != null) {
            $request->validate([
                'title' => 'required|string',
                'opisanie' => 'required|string',
                'price' => 'required|numeric',
                'data_nachalo_tura' => 'required|string',
            ]);

            $data_nachalo_tura2 = preg_replace('~[^0-9]+~','', $request->data_nachalo_tura);

            $kun1 = substr($data_nachalo_tura2, 0, -10);
            $ai1 = substr($data_nachalo_tura2, 2, -8);
            $god1 = substr($data_nachalo_tura2, 4, -4);
            $saat1 = substr($data_nachalo_tura2, 8, 2);
            $minuta1 = substr($data_nachalo_tura2, 10, 2);

            $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
            $data_num = strtotime($data_num3);

            if ($olimpiada_tury->data_okonchanie_tura != null) {
                $data_okonchanie_tura22 = $olimpiada_tury->data_okonchanie_tura - $olimpiada_tury->nachalo_zdachi_tura;
                $data_num5 = $data_num + $data_okonchanie_tura22;

                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'title' => $request->title,
                    'opisanie' => $request->opisanie,
                    'price' => $request->price * 100,
                    'nachalo_zdachi_tura' => $data_num5,
                ]);
            }else{
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'title' => $request->title,
                    'opisanie' => $request->opisanie,
                    'price' => $request->price * 100,
                    'nachalo_zdachi_tura' => $data_num,
                ]);
            }

            $olimpiada_tury0011 = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->orderBy('nachalo_zdachi_tura', 'asc')->get();
            $i = 1;
            foreach($olimpiada_tury0011 as $olimpiada_tury_id0011)
            {
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id0011->id)->update([
                    'tur_number' => $i++,
                ]);
            }


            $olimpiada_tury00112 = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 0)->orderBy('nachalo_zdachi_tura', 'asc')->get();
            foreach($olimpiada_tury00112 as $olimpiada_tury_id00112)
            {
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id00112->id)->update([
                    'tur_number' => 0,
                ]);
            }

            return redirect()->route('moderator_olimpiada_tury_index', $olimpiada_id)->withSuccess('Олимпиаданын туру ийгиликтүү өзгөртүлдү');
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }


    public function moderator_olimpiada_tury_store($olimpiada_id, Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'opisanie' => 'required|string',
            'price' => 'required|numeric',
            'data_nachalo_tura' => 'required|string',
        ]);

        $data_nachalo_tura2 = preg_replace('~[^0-9]+~','', $request->data_nachalo_tura);

        $kun1 = substr($data_nachalo_tura2, 0, -10);
        $ai1 = substr($data_nachalo_tura2, 2, -8);
        $god1 = substr($data_nachalo_tura2, 4, -4);
        $saat1 = substr($data_nachalo_tura2, 8, 2);
        $minuta1 = substr($data_nachalo_tura2, 10, 2);

        $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
        $data_num = strtotime($data_num3);
        
        $olimpiada_tur = new Olimpiada_tury([
            'olimpiada_id' => $olimpiada_id,
            'tur_number' => 0,
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'price' => $request->price * 100,
            'nachalo_zdachi_tura' => $data_num,
        ]);
        $olimpiada_tur->save();

        $olimpiada_tury0011 = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->orderBy('nachalo_zdachi_tura', 'asc')->get();
        $i = 1;
        foreach($olimpiada_tury0011 as $olimpiada_tury_id0011)
        {
            DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id0011->id)->update([
                'tur_number' => $i++,
            ]);
        }


        $olimpiada_tury00112 = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 0)->orderBy('nachalo_zdachi_tura', 'asc')->get();
        foreach($olimpiada_tury00112 as $olimpiada_tury_id00112)
        {
            DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id00112->id)->update([
                'tur_number' => 0,
            ]);
            }
        
        return redirect()->route('moderator_olimpiada_tury_index', $olimpiada_id)->withSuccess('Олимпиаданын туру ийгиликтүү кошулду');
    }

    public function moderator_olimpiada_tury_tests_vybrate(Request $request, $olimpiada_tury_id)
    {
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->first();
        $olimpiada = Olimpiada::where('id', $olimpiada_tury->olimpiada_id)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            return redirect()->back()->withSuccess2('Тест не выбрано!');
        }else{
            DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                'test_id' => $request->test_id,
                'data_okonchanie_tura' => NULL,
            ]);
            return redirect()->back()->withSuccess('Тест выбрано. Дата окончания тура установлено по умолчанию');
        }
    }

    public function moderator_olimpiada_tury_update_status1(Request $request, $olimpiada_tury_id)
    {
        
        $request->validate([
            'status' => 'required|numeric',
        ]);

        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->first();
        $olimpiada = Olimpiada::where('id', $olimpiada_tury->olimpiada_id)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            
        }else{
            if ($olimpiada_tury->test_id != null) {
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'status' => $request->status,
                ]);

                $olimpiada_tury0011 = Olimpiada_tury::where('olimpiada_id', $olimpiada->id)->where('status', 1)->orderBy('nachalo_zdachi_tura', 'asc')->get();
                $i = 1;
                foreach($olimpiada_tury0011 as $olimpiada_tury_id0011)
                {
                    DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id0011->id)->update([
                        'tur_number' => $i++,
                    ]);
                }


                return redirect()->back()->withSuccess('Тур стал активным.');
            }else{
               return redirect()->back()->withSuccess2('Алгач тест кошуу керек!'); 
            }
        }
    }

    public function moderator_olimpiada_tury_update_status2(Request $request, $olimpiada_tury_id)
    {
        
        $request->validate([
            'status2' => 'required|numeric',
        ]);

        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->first();
        $olimpiada = Olimpiada::where('id', $olimpiada_tury->olimpiada_id)->first();

        $olimpiada_tury_2 = Olimpiada_tury::where('olimpiada_id', $olimpiada_tury->olimpiada_id)->where('tur_number', 1)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            return redirect()->back()->withSuccess2('Тур стал не активным!');
        }else{
            if ($olimpiada_tury_id != $olimpiada_tury_2->id) {
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'status' => $request->status2,
                ]);

                $olimpiada_tury00112 = Olimpiada_tury::where('olimpiada_id', $olimpiada->id)->where('status', 0)->orderBy('nachalo_zdachi_tura', 'asc')->get();
                foreach($olimpiada_tury00112 as $olimpiada_tury_id00112)
                {
                    DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id00112->id)->update([
                        'tur_number' => 0,
                    ]);
                }
                return redirect()->back()->withSuccess2('Тур стал не активным!');
            }else{
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'status' => $request->status2,
                ]);
                DB::table('olimpiadas')->where('id', $olimpiada_tury->olimpiada_id)->update([
                    'status' => 0,
                ]);

                $olimpiada_tury00112 = Olimpiada_tury::where('olimpiada_id', $olimpiada->id)->where('status', 0)->orderBy('nachalo_zdachi_tura', 'asc')->get();
                foreach($olimpiada_tury00112 as $olimpiada_tury_id00112)
                {
                    DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id00112->id)->update([
                        'tur_number' => 0,
                    ]);
                }
                return redirect()->back()->withSuccess2('Тур и олимпиада (потому что вы сделали не актвным первый тур олимпиады) стал не активным!');
            }
        }
    }

    public function moderator_olimpiada_tury_tests_izyat($olimpiada_tury_id)
    {
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->first();
        $olimpiada = Olimpiada::where('id', $olimpiada_tury->olimpiada_id)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            return redirect()->back()->withSuccess2('У вас нет доступа!');
        }else{
            DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                'test_id' => NULL,
                'status' => 0,
                'data_okonchanie_tura' => NULL,
            ]);

            return redirect()->back()->withSuccess('Тест был изъят!');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Olimpiada_tury  $olimpiada_tury
     * @return \Illuminate\Http\Response
     */
    public function show(Olimpiada_tury $olimpiada_tury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olimpiada_tury  $olimpiada_tury
     * @return \Illuminate\Http\Response
     */
    public function edit(Olimpiada_tury $olimpiada_tury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olimpiada_tury  $olimpiada_tury
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olimpiada_tury $olimpiada_tury)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olimpiada_tury  $olimpiada_tury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olimpiada_tury $olimpiada_tury)
    {
        //
    }
}
