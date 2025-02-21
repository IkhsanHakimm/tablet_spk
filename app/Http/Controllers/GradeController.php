<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeAlternativeCriteria as Grade;
use App\Models\Alternative;
use App\Models\Criteria; // Pastikan Anda mengimpor model Criteria
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index(){
        $alternatives = Alternative::where('user_id', '=', auth()->user()->id)->get();
        $criteria = Criteria::all(); // Ambil semua kriteria
        $forms = [];
        foreach ($alternatives as $alternative) {
            $forms[$alternative->id] = Grade::with(['alternative', 'criteria'])->where('alternative_id', $alternative->id)->get();
        }
        return view('pages.grade', compact('alternatives', 'criteria', 'forms'));
    }
    
    public function getForms(Request $request){
        $id = $request->id;
        $forms = Grade::with(['alternative', 'criteria'])->where('alternative_id', $id)->get();
    
        return view('modal.gradeModal.gradeForm', compact('forms'));
    }

    public function update(Request $request){
        $data = $request->except(['_token', '_method', 'alternative_id']);
        $alternativeId = $request->only('alternative_id')['alternative_id'];
        $alternative = Alternative::find($alternativeId);
        DB::beginTransaction();
        foreach ($data as $key => $value) {
            $affected = DB::table('grade_alternatives_criteria')
            ->where('id', '=', $key)
            ->update(['grade' => $value]);
        }        
        DB::commit();
        return redirect()->route('pages.grades')->with('toast_success', 'Penilaian alternatif '.$alternative->name.' diperbarui!');
    }
}
