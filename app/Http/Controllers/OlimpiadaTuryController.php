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
use App\Models\OlimpiadaTuryKlass;
use App\Models\OlimpiadaTuryKlassPredmety;
use App\Models\Klassy;
use App\Models\Predmety;

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

    public function moderator_olimpiada_tury_class($olimpiada_id, $olimpiada_tury_id)
    {
        
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();
        $class = OlimpiadaTuryKlass::where('olimpiada_tury_id', $olimpiada_tury_id)->orderBy('klassy_id')->get();
        
        $list_klass = DB::table('klassies')->whereNotIn('id', $class->pluck('klassy_id'))->get();
        if ($olimpiada_tury != null) {
            return view('moderator.olimpoada_tury_class', [
                'olimpiada' => $olimpiada,
                'olimpiada_tury' => $olimpiada_tury,
                'class' => $class,
                'list_klass' => $list_klass,
            ]);
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }

    public function moderator_olimpiada_tury_class_vybrate(Request $request, $olimpiada_id, $olimpiada_tury_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            return redirect()->back()->withSuccess2('Класс не выбрано!');
        }else{
            foreach ($request->class_id as $rclass) {
                $class = OlimpiadaTuryKlass::where('olimpiada_tury_id', $olimpiada_tury_id)->where('klassy_id', $rclass)->first();
                if ($class != null) {
                    # code...
                }else{
                    OlimpiadaTuryKlass::create([
                        'olimpiada_id' => $olimpiada_id,
                        'olimpiada_tury_id' => $olimpiada_tury_id,
                        'klassy_id' => $rclass,
                    ]);
                }
            }
            
            return redirect()->back()->withSuccess('Класс создан');
        }
    }

    public function moderator_olimpiada_tury_class_update_status1(Request $request, $class_id)
    {
        
        $request->validate([
            'status' => 'required|numeric',
        ]);
        DB::table('olimpiada_tury_klasses')->where('id', $class_id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->withSuccess('Класс стал активным.');
    }
    public function moderator_olimpiada_tury_class_update_status2(Request $request, $class_id)
    {
        
        $request->validate([
            'status2' => 'required|numeric',
        ]);
        DB::table('olimpiada_tury_klasses')->where('id', $class_id)->update([
            'status' => $request->status2,
        ]);
        return redirect()->back()->withSuccess2('Класс стал не активным.');
    }

    public function moderator_olimpiada_tury_class_predmet_update_status1(Request $request, $olimpiada_tury_class_predmet_id)
    {
        
        $request->validate([
            'status' => 'required|numeric',
        ]);
        DB::table('olimpiada_tury_klass_predmeties')->where('id', $olimpiada_tury_class_predmet_id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->withSuccess('Предмет стал активным.');
    }
    public function moderator_olimpiada_tury_class_predmet_update_status2(Request $request, $olimpiada_tury_class_predmet_id)
    {
        
        $request->validate([
            'status2' => 'required|numeric',
        ]);
        DB::table('olimpiada_tury_klass_predmeties')->where('id', $olimpiada_tury_class_predmet_id)->update([
            'status' => $request->status2,
        ]);
        return redirect()->back()->withSuccess2('Предмет стал не активным.');
    }

    

    
    public function moderator_olimpiada_tury_class_predmet($olimpiada_id, $olimpiada_tury_id, $olimpiada_tury_class_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = Olimpiada_tury::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();
        $olimpiada_tury_class = OlimpiadaTuryKlass::where('id', $olimpiada_tury_class_id)->first();
        $olimpiada_tury_class_predmets = OlimpiadaTuryKlassPredmety::where('olimpiada_tury_klass_id', $olimpiada_tury_class_id)->get();
        $predmets = Predmety::whereNotIn('id', $olimpiada_tury_class_predmets->pluck('predmety_id'))->get();
        $test = Test::where('user_id', \Auth::user()->id)->get();

        if ($olimpiada_tury != null) {
            return view('moderator.olimpoada_tury_class_predmet', [
                'olimpiada' => $olimpiada,
                'olimpiada_tury' => $olimpiada_tury,
                'olimpiada_tury_class' => $olimpiada_tury_class,
                'olimpiada_tury_class_predmets' => $olimpiada_tury_class_predmets,
                'predmets' => $predmets,
                'test' => $test,
            ]);
        }else{
            return redirect()->back()->withSuccess('Хотель схитрить!');
        }
    }


    
    public function moderator_olimpiada_tury_class_predmet_vybrate(Request $request, $olimpiada_id, $olimpiada_tury_id, $olimpiada_tury_class_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->first();

        if ($olimpiada->user_id != \Auth::user()->id) {
            return redirect()->back()->withSuccess2('Предмет не выбрано!');
        }else{
            foreach ($request->predmet_id as $predmet) {
                $class = OlimpiadaTuryKlassPredmety::where('olimpiada_tury_klass_id', $olimpiada_tury_class_id)->where('predmety_id', $predmet)->first();
                if ($class != null) {
                    # code...
                }else{
                    OlimpiadaTuryKlassPredmety::create([
                        'olimpiada_id' => $olimpiada_id,
                        'olimpiada_tury_id' => $olimpiada_tury_id,
                        'klassy_id' => $olimpiada_tury_class_id,
                        'olimpiada_tury_klass_id' => $olimpiada_tury_class_id,
                        'predmety_id' => $predmet,
                        'test_id' => 0,
                    ]);
                }
            }
            
            return redirect()->back()->withSuccess('Предмет создан');
        }
    }






    public function moderator_olimpiada_tury_update_data_okonchanie_tura_1 ($olimpiada_id, $olimpiada_tury_id, Request $request)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();
        $olimpiada_tury = OlimpiadaTuryKlassPredmety::where('id', $olimpiada_tury_id)->where('olimpiada_id', $olimpiada->id)->first();

        if ($olimpiada_tury != null) {
            $data_okonchanie_tura2 = preg_replace('~[^0-9]+~','', $request->data_okonchanie_tura);

            $kun1 = substr($data_okonchanie_tura2, 0, -10);
            $ai1 = substr($data_okonchanie_tura2, 2, -8);
            $god1 = substr($data_okonchanie_tura2, 4, -4);
            $saat1 = substr($data_okonchanie_tura2, 8, 2);
            $minuta1 = substr($data_okonchanie_tura2, 10, 2);

            $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
            $data_num = strtotime($data_num3);

            $olimpiada_tury->update([
                'star' => $data_num,
            ]);
            return redirect()->back()->withSuccess('Турдун убактысы өзгөртүлдү');
            
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
                'color' => 'nullable|string',
            ]);

            $olimpiada_tury->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'price' => $request->price * 100,
                'color' => $request->color,
            ]);

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
            'color' => 'nullable|string',
        ]);
        $olimpiada_tury0011 = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->count();
        $olimpiada_tur = new Olimpiada_tury([
            'olimpiada_id' => $olimpiada_id,
            'tur_number' => $olimpiada_tury0011 + 1,
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'price' => $request->price * 100,
            'color' => $request->color,
        ]);
        $olimpiada_tur->save();
        
        return redirect()->route('moderator_olimpiada_tury_index', $olimpiada_id)->withSuccess('Олимпиаданын туру ийгиликтүү кошулду');
    }

    public function moderator_olimpiada_tury_tests_vybrate(Request $request, $olimpiada_tury_class_predmet_id)
    {
        DB::table('olimpiada_tury_klass_predmeties')->where('id', $olimpiada_tury_class_predmet_id)->update([
            'test_id' => $request->test_id,
            'end' => NULL,
        ]);
        return redirect()->back()->withSuccess('Тест выбрано. Дата окончания тура установлено по умолчанию');
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
            if ($olimpiada_tury != null) {
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'status' => $request->status,
                ]);
                return redirect()->back()->withSuccess('Тур стал активным.');
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
                return redirect()->back()->withSuccess2('Тур стал не активным!');
            }else{
                DB::table('olimpiada_turies')->where('id', $olimpiada_tury_id)->update([
                    'status' => $request->status2,
                ]);
                DB::table('olimpiadas')->where('id', $olimpiada_tury->olimpiada_id)->update([
                    'status' => 0,
                ]);
                return redirect()->back()->withSuccess2('Тур и олимпиада (потому что вы сделали не актвным первый тур олимпиады) стал не активным!');
            }
        }
    }

    public function moderator_olimpiada_tury_tests_izyat($olimpiada_tury_class_predmet_id)
    {
        DB::table('olimpiada_tury_klass_predmeties')->where('id', $olimpiada_tury_class_predmet_id)->update([
            'test_id' => 0,
            'status' => 0,
            'end' => NULL,
        ]);

        return redirect()->back()->withSuccess('Тест был изъят!');    
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
