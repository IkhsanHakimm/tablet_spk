<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\GradeAlternativeCriteria;
use Illuminate\Support\Collection;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = Criteria::where('user_id', '=', auth()->user()->id)->get();
        $columns = (new Criteria)->getTableColumns();

        return view('pages.criteria', ['criteria' => $criteria]);
    }

    public function store(Request $request){
        $newCriteria = $request->except('_token');
        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|numeric|min:0',
            'benefited' => 'required|numeric|min:0|max:1',
        ]);
        $newCriteria['user_id'] = auth()->user()->id;

        $newCriteria = Criteria::create($newCriteria);

        $allAlternative = Alternative::where('user_id', '=', auth()->user()->id)->get();
        $gradeData = [];
        foreach ($allAlternative as $alternative) {
            array_push($gradeData, [
                'alternative_id' => $alternative->id,
                'criteria_id' => $newCriteria->id,
                'grade' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
        $gradeDataa = GradeAlternativeCriteria::insert($gradeData);
        
        return redirect()->route('pages.criteria')->with('toast_success', 'Kriteria '.$request->name.' ditambahkan!');
    }

    public function delete(Request $request){
        $criteria = Criteria::find($request->id);
        $criteria->delete();
        return redirect()->route('pages.criteria')->with('toast_success', 'Kriteria '.$criteria->name.' dihapus!');
    }

    public function update(Request $request){
        $oldCriteria = Criteria::find($request->id);
        $updatedCriteria = $request->except('_token');
        $oldCriteria->update($updatedCriteria);

        return redirect()->route('pages.criteria')->with('toast_success', 'Kriteria '.$request->name.' diperbarui!');
    }

}
