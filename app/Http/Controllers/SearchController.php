<?php

namespace RP\Kiosk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use RP\Kiosk\Child;
use RP\Kiosk\Godparenthood;

class SearchController extends Controller
{
    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        if (strtolower($request->get('q')) === 'chuck norris') {
            return Redirect::to('https://giphy.com/gifs/Grittv-fight-action-l1J3G5lf06vi58EIE/fullscreen');
        }

        $godparenthoods = Godparenthood::where('title', 'LIKE', '%' . $request->get('q') . '%');
        $children = Child::where('first_name', 'LIKE', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->get('q') . '%');

        if ($godparenthoods->count() === 1 && $children->count() === 0) {
            return Redirect::action('GodparenthoodController@show', [
                'godparenthood' => $godparenthoods->first()
            ]);
        }

        if ($godparenthoods->count() === 0 && $children->count() === 1) {
            return Redirect::action('ChildController@show', [
                'child' => $children->first()
            ]);
        }

        return view('search.search', [
            'godparenthoods' => $godparenthoods->get(),
            'children' => $children->get()
        ]);
    }
}
