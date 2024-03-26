<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Members;
use App\Models\Scope;
use App\Models\Seccional;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Gender;
use App\Models\Positions;
use App\Models\SocialNetwork;
use App\Http\Requests\MembersStoreRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ComiteLocalController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $optionsScope = Scope::getOptions();
        $optionsGender = Gender::getGenders();
        $optionsSocialN = SocialNetwork::getSocialNet();
        $optionsPositions = Positions::getPositions();
        $optionsTypesPositions = Positions::getTypesPositions();
        $optionsBuro = Positions::getBuro();
        $optionsBuroSecFemenina = Positions::getBuroSecFemenina();
        $optionsBuroSecCultura = Positions::getBuroSecCultura();
        $seccionales = Seccional::all();

        $optionsBuro = collect($optionsBuro)->map(function ($value, $key) {
            return ['key' => $key, 'value' => $value];
        })->values()->toJson();

        $optionsBuroSecFemenina = collect($optionsBuroSecFemenina)->map(function ($value, $key) {
            return ['key' => $key, 'value' => $value];
        })->values()->toJson();

        $optionsBuroSecCultura = collect($optionsBuroSecCultura)->map(function ($value, $key) {
            return ['key' => $key, 'value' => $value];
        })->values()->toJson();

        return view('pages.comite.create', compact('optionsScope', 'optionsGender', 'optionsSocialN', 'optionsTypesPositions', 'optionsPositions', 'seccionales', 'optionsBuro', 'optionsBuroSecFemenina', 'optionsBuroSecCultura'));
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
