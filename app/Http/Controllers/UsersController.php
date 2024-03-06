<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    public function modal_delete(Users $users)
    {
        return view('pages.users.modal.deleteUsers', compact('users'));
    }

    public function list()
    {
        $model = Users::query()->orderBy('created_at', 'desc');

        $data = DataTables::of($model)
            ->addColumn('action', function($row){
                if ($row->id != 1) {
                    return '<div class="d-flex">
                        <button class="btn btn-icon btn-info btn-sm me-1">
                            <i class="ti ti-pencil"></i>
                        </button>
                        <button class="btn btn-icon btn-danger btn-sm modal-pers" data-path="'. route('users.modalDelete', $row) .'">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                } else {
                    return '-';
                }
            })
            ->rawColumns(['action'])
            ->toJson();

        return $data;
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
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        if ($users->id == 1) {
            return response()->json(['error' => 'No se puede eliminar el usuario con ID 1'], 403);
        } else {
            try {
                $users->delete();
                return response()->json(['success' => 'Usuario eliminado correctamente'], 200);
            } catch (\Throwable $th) {
                return response()->json(['error' => 'Lo sentimos, hubo un error al completar la acción'], 200);
            }
        }
    }
}
