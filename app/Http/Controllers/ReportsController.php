<?php

namespace App\Http\Controllers;

use App\Ordinance;
use App\Resolution;
use Illuminate\Http\Request;

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
                        ->get();
                    $results['R&R Ordinances'] = count($rrOrdinances);
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
                        ->get();
                    $results['Monitoring Ordinances'] = count($monitoringOrdinances);
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
                        ->get();
                    $results['Monitored Ordinances'] = count($monitoredOrdinances);
                    break;

                case 'rrResolutions':
                    $rrResolutions = Resolution::where('is_monitoring', '=', 0)
                        ->where('series', '=', $series)
                        ->get();
                    $results['R&R Resolutions'] = count($rrResolutions);
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
                        ->get();
                    $results['Monitoring Resolutions'] = count($monitoringResolutions);
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
                        ->get();
                    $results['Monitored Resolutions'] = count($monitoredResolutions);
                    break;
            }
        }

        return view('reports.index', [
            'results' => $results,
            'series' => $series
        ]);
    }
}
