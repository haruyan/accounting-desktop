<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Balance;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view("welcome");
        $entries = Entry::all();
        $balances = Balance::all();

        $currentyear = date('Y');
        $yearentries = Entry::whereYear('date','=', $currentyear)->get();
        $yearbalances = Balance::whereYear('year','=', $currentyear)->get();

        $totalbalance = $yearbalances[0]->blu_balance + $yearbalances[0]->rm_balance;
        $spending = 0;

        foreach ($yearentries as $index => $year) {
            $spending += $year->amount;
            $totalbalance -= $year->amount;
        }

        return view('welcome',compact('entries', 'balances', 'spending', 'totalbalance'));
    }

    public function table()
    {
        $entries = Entry::all();
        $balances = Balance::all();

        // dd($entries);

        return view('table',compact('entries', 'balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Entry::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        return view('entry.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entry = Entry::findOrFail($id);
        $entry->update($request->all());
        return redirect()->route('entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entries.index');
    }
}
