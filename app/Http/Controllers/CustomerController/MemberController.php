<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\CustomerModel\MemberModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductOrderModel;
use App\Rules\Phone;
use Auth;
use Illuminate\Http\Request;
use Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infoMember = Auth::user();
        $order = OrderModel::where('member', $infoMember->id)->get();
        return view('customer.profile', compact('infoMember', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerModel\MemberModel  $memberModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberModel $memberModel)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tbl_member,email,' . $memberModel->id,
            'phone' => ['required', new Phone('Không đúng định dạng số điện thoại!'), 'unique:tbl_member,phone,' . $memberModel->id],
            'avatar' => 'image',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required'
        ], [
            'required' => 'Trường này không được bỏ trống!',
            'unique' => 'Dữ liệu đã tồn tại!',
            'image' => 'Dữ liệu nhận vào phải là kiểu ảnh!'
        ]);
        $dataSave = $request->except('avatar', 'password');
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $nameAvatar = $avatar->getClientOriginalName();
            $avatarResize = Image::make($avatar->getRealPath());
            $avatarResize->resize(50, 50);
            $dirFolder = 'uploads/avatar/member/';
            $newAvatar = $dirFolder . 'member-' . time() . '-' . $nameAvatar;
            $dataSave['avatar'] = $newAvatar;
            @unlink($memberModel->avatar);
            $avatarResize->save($newAvatar);
        }

        if ($request->filled('password')) {
            $dataSave['password'] = bcrypt($request->password);
        }
        if ($memberModel->update($dataSave)) {
            return redirect()
                ->back()
                ->withErrors(['successUpdateMember' => 'Thông tin đã được cập nhật thành công!']);
        }
    }

    public function order($id)
    {
        $order = OrderModel::findOrFail($id);
        $orderDetail = OrderDetailModel::where('order_id', $order->id)->get();
        return view('customer.order', compact('order', 'orderDetail'));
    }
}
