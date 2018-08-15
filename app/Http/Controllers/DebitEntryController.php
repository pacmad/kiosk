<?php

namespace RP\Kiosk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RP\Kiosk\DebitEntry;

class DebitEntryController extends Controller
{
    /**
     * @param DebitEntry $debitEntry
     * @return RedirectResponse
     */
    public function destroy(DebitEntry $debitEntry): RedirectResponse
    {
        $debitEntry->destroy($debitEntry->id);

        return Redirect::back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        DebitEntry::create([
            'value' => request('value'),
            'child_id' => request('child_id')
        ]);

        return Redirect::back();
    }

    /**
     * Basically this is a list of all children ordered by their
     * current balance. I couldn't figure out a better way so it's
     * just a SQL command transfered to Eloquent ORM, but with joins
     * and so on. Not the best way :/
     *
     * @return View
     */
    public function statistics(): View
    {
        $debitEntries = DebitEntry::selectRaw('children.*, godparenthoods.title AS godparenthood_title, ABS(ROUND(SUM(debit_entries.value), 2)) AS amount_left')
            ->leftJoin('children', 'debit_entries.child_id', '=', 'children.id')
            ->leftJoin('godparenthoods', 'children.godparenthood_id', '=', 'godparenthoods.id')
            ->groupBy('children.id')
            ->orderBy('amount_left', 'DESC')
            ->orderBy('children.first_name', 'ASC')
            ->get();

        return view('debit_entry.statistics', [
            'debitEntries' => $debitEntries,
        ]);
    }
}
