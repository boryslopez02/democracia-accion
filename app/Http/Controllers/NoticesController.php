<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\NoticesStoreRequest;
use Illuminate\Support\Facades\DB;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notices::all();
        return view('pages.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Notices $notices)
    {
        return $notices;
        return view('pages.notices.create', compact('notices'));
    }

    public function list()
    {
        $model = Notices::query()->orderBy('created_at', 'desc');

        $data = DataTables::of($model)
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('media_path', function ($row) {
                return $row->media_path;
            })
            ->addColumn('title', function ($row) {
                return $row->title;
            })
            ->addColumn('link', function ($row) {
                return $row->link;
            })
            ->addColumn('content', function ($row) {
                return Str::limit($row->content, 50);
            })
            ->addColumn('action', function($row){
                return '<div class="d-flex">
                    <a href='. route('notices.create', $row) .' class="btn btn-icon btn-info btn-sm me-1">
                        <i class="ti ti-pencil"></i>
                    </a>
                    <button class="btn btn-icon btn-danger btn-sm modal-pers" data-path="'. route('notices.modalDelete', $row) .'">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['id', 'media_path', 'title', 'link', 'content', 'action'])
            ->toJson();

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(NoticesStoreRequest $request)
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->all();
        // $validated = $request->validated();

        DB::beginTransaction();
        try {
            $notice = Notices::create($validated);

            DB::commit();

            session()->flash('success', 'Noticia creada con éxito.');

            return redirect()->route('notices.index');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Hubo un error al crear la noticia. Por favor, inténtalo de nuevo. Error: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notices  $notices
     * @return \Illuminate\Http\Response
     */
    public function show(Notices $notices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notices  $notices
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.notices.create', compact('notices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notices  $notices
     * @return \Illuminate\Http\Response
     */
    // public function update(NoticesStoreRequest $request, Notices $notices)
    public function update(Request $request, Notices $notices)
    {
        // return $request;
        // $validated = $request->validated();
        $validated = $request->all();

        DB::beginTransaction();
        try {
            $notices->update($validated);

            DB::commit();

            session()->flash('success', 'Noticia actualizada con éxito.');

            return redirect()->route('notices.index');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Hubo un error al actualizar la noticia. Por favor, inténtalo de nuevo. Error: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function modal_delete(Notices $notices)
    {
        return view('pages.notices.modal.deleteNotices', compact('notices'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notices  $notices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notices $notices)
    {
        try {
            $notices->delete();
            return response()->json(['success' => 'Noticia eliminada correctamente'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Lo sentimos, hubo un error al completar la acción'], 200);
        }
    }
}
