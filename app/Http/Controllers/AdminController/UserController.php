<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\UserRequest;
use App\Models\AdminModel\RoleModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = UserModel::all();
            return Datatables::of($users)
                ->editColumn('role_id', function ($user) {
                    return "<span class='badge badge-pill badge-info'>" . $user->role->name . "</span>";
                })
                ->editColumn('gender', function ($user) {
                    if ($user->gender == 1) {
                        return "<span class='badge badge-pill badge-success'>Male</span>";
                    }
                    return "<span class='badge badge-pill badge-primary'>Female</span>";
                })
                ->editColumn('activated', function ($user) {
                    if ($user->activated == 1) {
                        return "<span class='badge badge-pill badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-pill badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($user) {
                    $routeDetail = route('user.show', $user->id);
                    $routeEdit = route('user.edit', $user->id);
                    $routeDelete = route('user.delete', $user->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonDetail . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['gender', 'role_id', 'activated', 'action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RoleModel::where('activated', 1)->get();
        return view('admin.user.action', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $nameAvatar = $avatar->getClientOriginalName();
            $dirFolder = 'uploads/avatar/admin/';
            $newAvatar = $dirFolder . 'admin-' . time() . '-' . $nameAvatar;
            $dataMerge = $request->validated();
            $dataMerge['avatar'] = $newAvatar;
            $userModel = new UserModel();
            if ($userModel->create($dataMerge)) {
                $avatar->move($dirFolder, $newAvatar);
                return response()->json([
                    'statusCode' => '200'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminModel\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $userModel)
    {
        return view('admin.user.detail', compact('userModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserModel $userModel)
    {
        $roles = RoleModel::where('activated', 1)->get();
        return view('admin.user.action', compact('roles', 'userModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, UserModel $userModel)
    {
        $dataMerge = $request->validated();
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $nameAvatar = $avatar->getClientOriginalName();
            $dirFolder = 'uploads/avatar/admin/';
            $newAvatar = $dirFolder . 'admin-' . time() . '-' . $nameAvatar;
            $dataMerge['avatar'] = $newAvatar;
            $avatar->move($dirFolder, $newAvatar);
            @unlink($userModel->avatar);
        }
        if ($userModel->update($dataMerge)) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('user.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $userModel)
    {
        if ($userModel->delete()) {
            @unlink($userModel->avatar);
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
