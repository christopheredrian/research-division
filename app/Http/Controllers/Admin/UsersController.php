<?php

namespace App\Http\Controllers\Admin;

use App\Http\GoogleDriveUtilities;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $user_validation = [
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required',
        'role' => 'required',
        'repassword' => 'required|same:password'
    ];

    private $password_validation = [
        'old-password' => 'required',
        'new-password' => 'required',
        're-password' => 'required|same:password'
    ];

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->user_validation);
        $user = new User();

        $user->fill($request->all());
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function profile()
    {
        return view('admin.users.show', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function deleteImage()
    {


//        $id = Auth::user()->id;
//        $profImage = User::where('id', $id)->update(['image' => null]);
//
//        $profpic = 'user-' . $id . '.jpg';
//
//        File::delete('uploads/'.$profpic);

        $user = Auth::user();
        $user->image = GoogleDriveUtilities::deleteFile($user->image);
        $user->save();

        Session::flash('flash_message', "Successfully deleted profile picture!");

        return redirect('/admin/profile/edit');
    }

    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function profEdit()
    {
        return view('admin.users.edit', [
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);
        $user->save();

        if ($request->file('imageFile') !== null) {
            $imageFile = $request->file('imageFile');

            $user->image = GoogleDriveUtilities::upload($user, $imageFile, 'userimages');

            $user->save();
        }

        if (Auth::user()->id != $id) {
            return redirect('/admin/users');
        } elseif (Auth::user()->id == $id) {
            return redirect('/admin/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users');
    }

    /**
     * The get route for changing password
     */
    public function changePassword()
    {
        Session::flash(
            'flash_message',
            "Password has been changed!");
        return view('admin.users.edit');
    }

    /**
     * The get route for changing password
     */
    public function updatePassword(Request $request)
    {

        $request->validate($this->password_validation);

        $old = $request->input('old-password');
        $new = $request->input('new-password');

        if (Auth::check($old, Auth::user()->getAuthPassword())) {
            $user = Auth::user();
            $user->password = bcrypt($new);
            $user->save();
            // TODO: Add flash message here

            Session::flash(
                'flash_message',
                "Password has been changed!");
        }
        return redirect('/admin/users/edit')->with('user', $user);
    }

    public function resetPassword($user_id)
    {
        $user = User::findorFail($user_id)->first();
        $temporaryPassword = $this->generateRandomString(5);

        $user->password = bcrypt($temporaryPassword);
        $user->save();

        Session::flash(
            'flash_message',
            "Password has been reset for" . $user->name . ". The temporary password is <b>" . $temporaryPassword . "<b>.");

        return redirect('/admin/users');
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    // TO DO
//    public function changeStatus($id) {
//        $user = User::findOrFail($id)->first();
//
//        $user->status = $user->status == "active" ? 'disabled' : 'active';
//        $user->save();
//    }
}
