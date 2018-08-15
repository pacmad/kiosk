<?php

namespace RP\Kiosk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facade\Redirect;
use RP\Kiosk\Godparenthood;

class GodparenthoodController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('godparenthood.index', [
            'godparenthoods' => Godparenthood::all()
        ]);
    }

    /**
     * @param Godparenthood $godparenthood
     * @return View
     */
    public function show(Godparenthood $godparenthood): View
    {
        return view('godparenthood.show', [
            'godparenthood' => $godparenthood
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('godparenthood.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Godparenthood::create($request->all());

        return Redirect::back();
    }
}
