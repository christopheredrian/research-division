<?php

namespace App\Http\Controllers;

use App\Ordinance;
use App\Resolution;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function index(){
        return view('reports.index');
    }

    public function query(Request $request){
        $series = $request->series === null ? Ordinance::orderBy('series', 'desc')->first()->series : $request->series;
        $includes = $request->includes === null ?
                ['rrOrdinances', 'monitoringOrdinances', 'monitoredOrdinances',
                    'rrResolutions', 'monitoringResolutions', 'monitoredResolutions'] : $request->includes;
        $results = array();

        foreach ($includes as $include) {
            switch ($include){
                case 'rrOrdinances':
                    $rrOrdinances = Ordinance::where('is_monitoring', '=', 0)
                        ->where('series', '=', $series)
                        ->select('number as Ordinance Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['R&R Ordinances'] = $rrOrdinances;
                    break;

                case 'monitoringOrdinances':
                    $monitoringOrdinances = Ordinance::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->doesntHave('statusreport');
                            $query->orWhereHas('statusreport', function ($query) {
                                $query->whereNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '=', '');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select('number as Ordinance Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['Monitoring Ordinances'] = $monitoringOrdinances;
                    break;

                case 'monitoredOrdinances':
                    $monitoredOrdinances = Ordinance::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->whereHas('statusreport', function ($query) {
                                $query->whereNotNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '!=', ' ');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select('number as Ordinance Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['Monitored Ordinances'] = $monitoredOrdinances;
                    break;

                case 'rrResolutions':
                    $rrResolutions = Resolution::where('is_monitoring', '=', 0)
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['R&R Resolutions'] = $rrResolutions;
                    break;

                case 'monitoringResolutions':
                    $monitoringResolutions = Resolution::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->doesntHave('statusreport');
                            $query->orWhereHas('statusreport', function ($query) {
                                $query->whereNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '=', '');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['Monitoring Resolutions'] = $monitoringResolutions;
                    break;

                case 'monitoredResolutions':
                    $monitoredResolutions = Resolution::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->whereHas('statusreport', function ($query) {
                                $query->whereNotNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '!=', ' ');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as Series', 'title as Title', 'keywords as Keywords')
                        ->get();
                    $results['Monitored Resolutions'] = $monitoredResolutions;
                    break;
            }
        }

        session(['results' => $results]);
        session(['series' => $series]);

        return view('reports.index', [
            'results' => $results,
            'series' => $series
        ]);
    }

    public function downloadReport(){
        $results = session()->pull('results');
        $series = session()->pull('series');
        $fileName = 'RD Report Series of ' . $series;

        Excel::create($fileName, function($excel) use($results) {
            foreach ($results as $key => $value) {
                $excel->sheet($key, function($sheet) use($value){
                    $sheet->fromArray($value);
                });
            }
        })->export('xls');

    }
}
