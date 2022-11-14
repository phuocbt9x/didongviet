<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RoleRequest;
use App\Models\AdminModel\RoleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = RoleModel::all();
            return Datatables::of($roles)
                ->editColumn('activated', function ($role) {
                    if ($role->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($role) {
                    $routeEdit = route('role.edit', $role->id);
                    $routeDelete = route('role.delete', $role->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['activated', 'action'])
                ->make(true);
        }
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $roleModel = new RoleModel();
        if ($roleModel->create($request->validated())) {
            return response()->json([
                'statusCode' => '200'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleModel $roleModel)
    {
        return view('admin.role.action', compact('roleModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, RoleModel $roleModel)
    {
        if ($roleModel->update($request->validated())) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('role.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleModel $roleModel)
    {
        if ($roleModel->delete()) {
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
