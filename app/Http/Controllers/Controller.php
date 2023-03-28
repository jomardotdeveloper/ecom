<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createUser($request, $user_type)
    {
        $user = User::create([
            'email' => $request->email,
            'user_type' => $user_type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'password' => Hash::make($request->password),
        ]);
        return $user;
    }

    public function updateUser($request, $user)
    {
        $user->update([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
        ]);
        return $user;
    }

    public function uploadImage($request, $file_name, $file_path) {
        $path = Storage::putFile("public/" . $file_path, $request->file($file_name));
        $path = Storage::url($path);
        return $path;
    }

    public function getSelectOptions($model, $display_name="name", $col_filter = null)
    {
        $collections = $model::all();

        if($col_filter != null) {
            $collections = $col_filter;
        }

        $options = $collections->map(function ($obj, $key) use ($display_name) {
            return [
                "id" => $obj['id'],
                "name" => $obj[$display_name]
            ];
        });
        return $options;
    }

    public function sendEmail($email, $code) {
        $details = [
            'code' => $code,
            'email' => $email
        ];
       
        Mail::to($email)->send(new \App\Mail\MyTestMail2($details));

    }


}
