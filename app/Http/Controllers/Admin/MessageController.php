<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Get all messages
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $messages = null;
        $q = $request->input('q');
        if ($q) {
            $messages = Message::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('email', 'LIKE', '%' . $q . '%')
                ->orWhere('subject', 'LIKE', '%' . $q . '%')
                ->orWhere('message', 'LIKE', '%' . $q . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.contact.index', [
            'messages' => $messages
        ]);
    }

    /**
     * Method for specific view
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        return view('admin.contact.show', [
            'message' => Message::findOrFail($id)
        ]);
    }

}
