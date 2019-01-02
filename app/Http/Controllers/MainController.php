<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $post = $request->all();

            $validator = Validator::make($post, [
                'store_id' => 'required',
                'card_number' => 'required|digits:16',
            ]);

            if ($validator->fails()) {
                return redirect()->route('index')->with('form_message', [
                    'message' => $validator->errors()->all(),
                    'status' => 'danger',
                ])->withInput();
            }
            return 'success';
        }
        $this->parse['form_action'] = route('index');

        return view('welcome', $this->parse);
    }
}
