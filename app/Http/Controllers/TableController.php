<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Balance;
use App\Faculty;
use Illuminate\Http\Request;

class TableController extends Controller
{
	public function index()
    {
        $entries = Entry::all();
        $balances = Balance::orderBy('year', 'asc')->get();
        $faculties = Faculty::all();

        $years = [];
        foreach ($balances as $b => $balance){
	    	if($b == 0){
	    		$years[] = $balances[$b]['year'];
	    	}else {
	        	$balances[$b]['year'] === $balances[$b-1]['year'] ? $years[] = $balances[$b]['year'] : '';
	    	}
        }

        return view('table.index',compact('entries', 'years', 'faculties'));
    }

    public function search(Request $request)
    {
    	$year = $request->year;
    	$faculty = $request->faculty;
    	$entries = Entry::all();
        $balances = Balance::orderBy('year', 'asc')->get();
        $faculties = Faculty::all();

        $years = [];
        foreach ($balances as $b => $balance){
	    	if($b == 0){
	    		$years[] = $balances[$b]['year'];
	    	}else {
	        	$balances[$b]['year'] === $balances[$b-1]['year'] ? $years[] = $balances[$b]['year'] : '';
	    	}
        }

        $fil_faculties = Faculty::where('id', '=', $faculty)->get();
        $fil_b = Balance::whereYear('year','=',$year)->where('faculty_id', '=', $faculty)->get();
        $fil_entries = Entry::whereYear('date','=',$year)->where('faculty_id', '=', $faculty)->get();

        $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $table = [];


        foreach ($months as $m => $month) {
            foreach ($fil_entries as $e => $entry) {
                if($month === date('M',strtotime($entry->date))){
                    if ($entry->budget_type == 'blu') {
                        $entry->spending_blu += $entry->amount;
                        $entry->spending_rm = 0;
                    } else {
                        $entry->spending_rm += $entry->amount;
                        $entry->spending_blu = 0;
                    }       


                    $e == 0 && $m == 0 ? $entry->serapan_blu = $entry->spending_blu : $entry->serapan_blu = $fil_entries[$e-1]['serapan_blu'] + $entry->spending_blu;
                    $e == 0 && $m == 0 ? $entry->serapan_rm = $entry->spending_rm : $entry->serapan_rm = $fil_entries[$e-1]['serapan_rm'] + $entry->spending_rm;
                    $e == 0 && $m == 0 ? $entry->remain_blu = $fil_b[0]->blu_balance - $entry->spending_blu : $entry->remain_blu = $fil_entries[$e-1]['remain_blu'] - $entry->spending_blu;
                    $e == 0 && $m == 0 ? $entry->remain_rm = $fil_b[0]->rm_balance - $entry->spending_rm : $entry->remain_rm = $fil_entries[$e-1]['remain_rm'] - $entry->spending_rm;
                    if ($entry->budget_type == 'blu') {
                        $entry->percent_blu = ($entry->serapan_blu*100)/$fil_b[0]->blu_balance;
                        $entry->percent_rm = 0 ;
                    } else {
                        $entry->percent_rm = ($entry->serapan_rm*100)/$fil_b[0]->rm_balance;
                        $entry->percent_blu = 0 ;
                    }

                    $table[$m][] = $entry;

                    // t = total
                    $table[$m]['total_spending_blu'] ?? $table[$m]['total_spending_blu'] = 0;
                    $table[$m]['total_spending_blu'] += $entry->spending_blu;
                    $table[$m]['total_spending_rm'] ?? $table[$m]['total_spending_rm'] = 0;
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

        return view('table.show',compact('entries', 'balances', 'faculties', 'table', 'months', 'years' ,'fil_faculties', 'fil_b', 'fil_entries'));
    }
}
