<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Balance;
use App\Faculty;
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
        $faculties = Faculty::all();

        $currentyear = date('Y');
        $yearentries = Entry::whereYear('date','=', $currentyear)->get();
        $yearbalances = Balance::whereYear('year','=', $currentyear)->get();

        // $totalbalance = $yearbalances[0]->blu_balance + $yearbalances[0]->rm_balance;
        $totalbalance = 0;
        $spending = 0;

        foreach ($yearentries as $index => $year) {
            $spending += $year->amount;
            $totalbalance -= $year->amount;
        }

        return view('welcome',compact('entries', 'balances', 'faculties', 'spending', 'totalbalance'));
    }

    public function table()
    {
        $entries = Entry::all();
        $balances = Balance::all();
        $faculties = Faculty::all();

        // fil_b = filter balance
        $fil_b = Balance::whereYear('year','=',date('Y'))->where('faculty_id', '=', 3)->get();

        $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        // return date('M',strtotime($entries[0]->date));
        $table = [];

        foreach ($months as $m => $month) {
            foreach ($entries as $e => $entry) {

                if($month === date('M',strtotime($entry->date))){
                    if ($entry->budget_type == 'blu') {
                        $entry->spending_blu += $entry->amount;
                        $entry->spending_rm = 0;
                    } else {
                        $entry->spending_rm += $entry->amount;
                        $entry->spending_blu = 0;
                    }       

                    $e == 0 && $m == 0 ? $entry->serapan_blu = $entry->spending_blu : $entry->serapan_blu = $entries[$e-1]['serapan_blu'] + $entry->spending_blu;
                    $e == 0 && $m == 0 ? $entry->serapan_rm = $entry->spending_rm : $entry->serapan_rm = $entries[$e-1]['serapan_rm'] + $entry->spending_rm;
                    $e == 0 && $m == 0 ? $entry->remain_blu = $fil_b[0]->blu_balance - $entry->spending_blu : $entry->remain_blu = $entries[$e-1]['remain_blu'] - $entry->spending_blu;
                    $e == 0 && $m == 0 ? $entry->remain_rm = $fil_b[0]->rm_balance - $entry->spending_rm : $entry->remain_rm = $entries[$e-1]['remain_rm'] - $entry->spending_rm;
                    if ($entry->budget_type == 'blu') {
                        $entry->percent_blu = ($entry->serapan_blu*100)/$fil_b[0]->blu_balance;
                        $entry->percent_rm = 0 ;
                    } else {
                        $entry->percent_rm = ($entry->serapan_rm*100)/$fil_b[0]->rm_balance;
                        $entry->percent_blu = 0 ;
                    }

                    $table[$m][] = $entry;

                    // t = total
                    // $table[$m]['total_spending_blu'] ?? $table[$m]['total_spending_blu'] = 0;
                    if(!isset($table[$m]['total_spending_blu'])){
                        $table[$m]['total_spending_blu'] = 0;
                    }
                    $table[$m]['total_spending_blu'] += $entry->spending_blu;
                    // $table[$m]['total_spending_rm'] ?? $table[$m]['total_spending_rm'] = 0;
                    if(!isset($table[$m]['total_spending_rm'])){
                        $table[$m]['total_spending_rm'] = 0;
                    }
                    $table[$m]['total_spending_rm'] += $entry->spending_rm;
                    $table[$m]['total_serapan_blu'] = $entry->serapan_blu;
                    $table[$m]['total_serapan_rm'] = $entry->serapan_rm;
                    $table[$m]['total_remain_blu'] = $entry->remain_blu;
                    $table[$m]['total_remain_rm'] = $entry->remain_rm;
                    $table[$m]['total_percent_blu'] = ($table[$m]['total_serapan_blu']*100)/$fil_b[0]->blu_balance;
                    $table[$m]['total_percent_rm'] = ($table[$m]['total_serapan_rm']*100)/$fil_b[0]->rm_balance;
                    $table[$m]['common_size'] = ($table[$m]['total_serapan_blu']+$table[$m]['total_serapan_rm'])*100/($fil_b[0]->blu_balance+$fil_b[0]->rm_balance);
                    $m == 0 ? $table[$m]['trend'] = 0 : $table[$m]['trend'] = ($table[$m]['total_spending_blu']+$table[$m]['total_spending_rm']-$table[$m-1]['total_spending_blu']-$table[$m-1]['total_spending_rm'])*100/($table[$m-1]['total_spending_blu']+$table[$m-1]['total_spending_rm']);
                }
            }
        }

        // dd($table);
        // return response()->json($table);

        return view('table',compact('entries', 'balances', 'faculties', 'table', 'months', 'fil_b'));
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
        $faculties = Faculty::all();
        return view('entry.edit', compact('entry', 'faculties'));
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
        // return redirect()->back();
        return redirect('/table');
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
        return redirect()->back();
    }
}
