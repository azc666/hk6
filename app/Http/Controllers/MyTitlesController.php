<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use DB;
use Yajra\Datatables\Facades\Datatables;
use App\Title;

class MyTitlesController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->admin == '1') {
            $titles = Title::all();
        } else {
            $titles = Auth::user()->title;
        }
        // $title_title = $title->title;
// dd('here');
        return view('user.titles', compact('titles', 'title_title', 'request'));
    }

    public function showEditTitle(Request $request, Title $title)
    {
        $titles = Title::all();
        $title_id = $request->title_id;
        $title_type = $request->title_type;
        $title_title = $request->title_title;
        Title::where('id', $title_id)->update(['type' => $request->title_type, 'title' => $request->title_title]);
        // $title->title = $title_title;
        // dd($title_id);
        // return redirect('titles')->withSuccess('Your Title has been Updated!');
        return redirect('titles')->with('status', 'Your Title has been Updated!');
    }

    public function xshowEditTitle(Request $request, Title $title)
    {
        $title = new Title();
        $titles = Title::all();
        // $title->id = $request->title_id;
        $title->type = $request->title_type;
        $title->title = $request->title_title;
// dd($title->type . $title->title . $title->id);
        $title->save();
        // Title::where('id', '$request->title_id')->update(['type' => $request->title_type, 'title' => $request->title_title]);
        
// exit();
        // dd($title->title);
        // return view('user.editTitle', compact('title', 'titles', 'request'));
        // return route('editTitle', compact('request', 'title'))->withSuccess('Your Title has been Updated!');
        return view('user.titles', compact('titles'))->withSuccess('Your Title has been Updated!');

    }

    public function editTitle(Request $request, Title $title)
    {
        $title = new Title();
        $titles = Title::all();
        $title_id = $request->title_id;
        $title_type = $request->title_type;
        $title_title = $request->title_title;
// dd($title_id);
        // Title::save();
        // Title::where('id', $request->title_id)->update(['type' => $title->type, 'title' => $title->title]);
// exit();
        
        return view('user.editTitle', compact('titles', 'title', 'title_id', 'title_type', 'title_title'));
        // return route('editTitle', compact('request', 'title'))->withSuccess('Your Title has been Updated!');
    }

    public function deleteTitle(Request $request)
    {
        
        // dd($request->title_id);
        Title::destroy($request->title_id);
        return redirect('titles')->with('status', 'Your Title has been Deleted!');
    }

    public function createTitle(Request $request)
    {
        $title = new Title;

        $title->type = $request->title_type;
        $title->title = $request->title_title;
        // dd('hola');
        return view('user.createTitle', compact('title', 'title_type', 'title_title'));
        // $title->save();
    }

    public function storeTitle(Request $request)
    {
        $title = new Title;

        $title->type = $request->title_type;
        $title->title = $request->title_title;
        // dd('hola');
        
        $title->save();
        return redirect('titles')->with('status', 'Your Title has been Created!');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function mytitlesData()
    {
        return Datatables::of(Order::query())->make(true);
    }
}
