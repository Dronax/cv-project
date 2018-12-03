<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvRequest;
use App\Application;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function sendCv(CvRequest $request)
    {
        $app = Application::create($request->except(['cv_path', '_token']));

        $cv = $request->file('cv_path');
        $cvfilename = 'cv-' . md5($cv->getClientOriginalName()) . '.' . $cv->getClientOriginalExtension();
        $cv->storeAs('public', $cvfilename);

        $app->cv_path = $cvfilename;
        $app->save();

        return back()->with('success', 'Success!! Cv was sent! We will call you soon..');
    }
}
