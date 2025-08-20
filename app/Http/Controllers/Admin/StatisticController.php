<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopulationStatistic;
use App\Models\EducationStatistic;
use App\Models\OccupationStatistic;
use App\Models\ReligionStatistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $populationStats = PopulationStatistic::orderBy('year', 'desc')->get();
        $educationStats = EducationStatistic::orderBy('year', 'desc')->get();
        $occupationStats = OccupationStatistic::orderBy('year', 'desc')->get();
        $religionStats = ReligionStatistic::orderBy('year', 'desc')->get();

        return view('admin.statistics.index', compact(
            'populationStats',
            'educationStats',
            'occupationStats',
            'religionStats'
        ));
    }

    public function populationCreate()
    {
        return view('admin.statistics.population.create');
    }

    public function populationStore(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|unique:population_statistics,year',
            'total_population' => 'required|integer|min:0',
            'male_population' => 'required|integer|min:0',
            'female_population' => 'required|integer|min:0',
            'total_families' => 'required|integer|min:0',
            'age_0_4' => 'required|integer|min:0',
            'age_5_9' => 'required|integer|min:0',
            'age_10_14' => 'required|integer|min:0',
            'age_15_19' => 'required|integer|min:0',
            'age_20_24' => 'required|integer|min:0',
            'age_25_29' => 'required|integer|min:0',
            'age_30_34' => 'required|integer|min:0',
            'age_35_39' => 'required|integer|min:0',
            'age_40_44' => 'required|integer|min:0',
            'age_45_49' => 'required|integer|min:0',
            'age_50_54' => 'required|integer|min:0',
            'age_55_59' => 'required|integer|min:0',
            'age_60_64' => 'required|integer|min:0',
            'age_65_plus' => 'required|integer|min:0',
        ]);

        PopulationStatistic::create($request->all());

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Data statistik penduduk berhasil ditambahkan.');
    }

    public function populationEdit(PopulationStatistic $populationStatistic)
    {
        return view('admin.statistics.population.edit', compact('populationStatistic'));
    }

    public function populationUpdate(Request $request, PopulationStatistic $populationStatistic)
    {
        $request->validate([
            'year' => 'required|integer|unique:population_statistics,year,' . $populationStatistic->id,
            'total_population' => 'required|integer|min:0',
            'male_population' => 'required|integer|min:0',
            'female_population' => 'required|integer|min:0',
            'total_families' => 'required|integer|min:0',
            'age_0_4' => 'required|integer|min:0',
            'age_5_9' => 'required|integer|min:0',
            'age_10_14' => 'required|integer|min:0',
            'age_15_19' => 'required|integer|min:0',
            'age_20_24' => 'required|integer|min:0',
            'age_25_29' => 'required|integer|min:0',
            'age_30_34' => 'required|integer|min:0',
            'age_35_39' => 'required|integer|min:0',
            'age_40_44' => 'required|integer|min:0',
            'age_45_49' => 'required|integer|min:0',
            'age_50_54' => 'required|integer|min:0',
            'age_55_59' => 'required|integer|min:0',
            'age_60_64' => 'required|integer|min:0',
            'age_65_plus' => 'required|integer|min:0',
        ]);

        $populationStatistic->update($request->all());

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Data statistik penduduk berhasil diperbarui.');
    }

    public function populationDestroy(PopulationStatistic $populationStatistic)
    {
        $populationStatistic->delete();

        return redirect()->route('admin.statistics.index')
                        ->with('success', 'Data statistik penduduk berhasil dihapus.');
    }
}
