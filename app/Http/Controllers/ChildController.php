<?php

namespace RP\Kiosk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use RP\Kiosk\Child;
use RP\Kiosk\DebitEntry;
use RP\Kiosk\Godparenthood;

class ChildController extends Controller
{
    /**
     * @param Child $child
     * @return View
     */
    public function show(Child $child): View
    {
        return view('child.show', [
            'child' => $child
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $child = Child::create($request->all());

        if ((float)$request->get('first_deposit') !== 0.0) {
            DebitEntry::create([
                'value' => (float)$request->get('first_deposit'),
                'child_id' => $child->id
            ]);
        }

        return Redirect::back();
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('child.create', [
            'godparenthoods' => Godparenthood::all(),
        ]);
    }

    /**
     * @param Child $child
     * @return View
     */
    public function edit(Child $child): View
    {
        return view('child.edit', [
            'child' => $child,
            'godparenthoods' => Godparenthood::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param Child $child
     * @return RedirectResponse
     */
    public function update(Request $request, Child $child): RedirectResponse
    {
        $child->fill($request->all())->save();

        return Redirect::action('ChildController@show', [
            'child' => $child,
        ]);
    }
}
