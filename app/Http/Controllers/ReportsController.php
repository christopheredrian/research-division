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
        // Remove stored Monitored legislations in session
        session()->pull('LR_monitored_ordinances') ? session()->forget('LR_monitored_ordinances') : null;
        session()->pull('LR_monitored_resolutions') ? session()->forget('LR_monitored_resolutions') : null;
        session()->pull('results') ? session()->forget('results') : null;
        session()->pull('series') ? session()->forget('series') : null;

        $series = $request->series === null ? Ordinance::orderBy('series', 'desc')->first()->series : $request->series;
        $includes = $request->includes === null ?
                ['rrOrdinances', 'monitoringOrdinances', 'monitoredOrdinances',
                    'rrResolutions', 'monitoringResolutions', 'monitoredResolutions'] : $request->includes;
        $results = array();

        foreach ($includes as $include) {
            switch ($include){
                case 'rrOrdinances':
                    $rr_ordinances = Ordinance::where('is_monitoring', '=', 0)
                        ->where('series', '=', $series)
                        ->select('number as ORDINANCE NUMBER', 'series as SERIES', 'title as TITLE', 'keywords as KEYWORDS')
                        ->get();
                    $results['R&R Ordinances'] = $rr_ordinances;
                    break;

                case 'monitoringOrdinances':
                    $monitoring_ordinances = Ordinance::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->doesntHave('statusreport');
                            $query->orWhereHas('statusreport', function ($query) {
                                $query->whereNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '=', '');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select(
                            'number as ORDINANCE NUMBER',
                            'series as SERIES',
                            'title as TITLE',
                            'keywords as KEYWORDS')
                        ->get();
                    $results['Monitoring Ordinances'] = $monitoring_ordinances;
                    break;

                case 'monitoredOrdinances':
                    $monitored_ordinances = Ordinance::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->whereHas('statusreport', function ($query) {
                                $query->whereNotNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '!=', ' ');
                            })->get();
                        });
                    $results['Monitored Ordinances'] = $monitored_ordinances
                        ->where('series', '=', $series)
                        ->select('number as ORDINANCE NUMBER', 'series as SERIES', 'title as TITLE', 'keywords as KEYWORDS')
                        ->get();

                    $LR_monitored_ordinances = $monitored_ordinances
                        ->where('series', '=', $series)
                        ->select(
                            'status_report_date as DATE OF STATUS REPORT',
                            'number as RESOLUTION NUMBER',
                            'series as YEAR',
                            'title as TITLE',
                            'summary as SUMMARY OF FINDINGS, SUGGESTIONS AND RECOMMENDATIONS',
                            'status as STATUS',
                            'legislative_action as LEGISLATIVE ACTION',
                            'updates as UPDATES'
                        )
                        ->get();
                    session(['LR_monitored_ordinances' => $LR_monitored_ordinances]);
                    break;

                case 'rrResolutions':
                    $rr_resolutions = Resolution::where('is_monitoring', '=', 0)
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as SERIES', 'title as TITLE', 'keywords as KEYWORDS')
                        ->get();
                    $results['R&R Resolutions'] = $rr_resolutions;
                    break;

                case 'monitoringResolutions':
                    $monitoring_resolutions = Resolution::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->doesntHave('statusreport');
                            $query->orWhereHas('statusreport', function ($query) {
                                $query->whereNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '=', '');
                            })->get();
                        })
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as SERIES', 'title as TITLE', 'keywords as KEYWORDS')
                        ->get();
                    $results['Monitoring Resolutions'] = $monitoring_resolutions;
                    break;

                case 'monitoredResolutions':
                    $monitored_resolutions = Resolution::where('is_monitoring', '=', 1)
                        ->where(function($query){
                            $query->whereHas('statusreport', function ($query) {
                                $query->whereNotNull('pdf_file_path');
                                $query->orWhere('pdf_file_path', '!=', ' ');
                            })->get();
                        });

                    $results['Monitored Resolutions'] = $monitored_resolutions
                        ->where('series', '=', $series)
                        ->select('number as Resolution Number', 'series as SERIES', 'title as TITLE', 'keywords as KEYWORDS')
                        ->get();

                    $LR_monitored_resolutions = $monitored_resolutions
                        ->where('series', '=', $series)
                        ->select(
                            'status_report_date as DATE OF STATUS REPORT',
                            'number as RESOLUTION NUMBER',
                            'series as YEAR',
                            'title as TITLE',
                            'summary as SUMMARY OF FINDINGS, SUGGESTIONS AND RECOMMENDATIONS',
                            'status as STATUS',
                            'legislative_action as LEGISLATIVE ACTION',
                            'updates as UPDATES'
                            )
                        ->get();
                    session(['LR_monitored_resolutions' => $LR_monitored_resolutions]);
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

    public function downloadLegislativeReport($legislation_type){
        $monitored_legislations  = $legislation_type === 'ordinances' ? session()->pull('LR_monitored_ordinances') : session()->pull('LR_monitored_resolutions');
        $series = session()->pull('series');

        $file_name = 'Legislative Monitoring and Evaluation Report ' . $series . '(' . lcfirst($legislation_type) . ')';
        $sheet_title = $series . ' Monitored '. lcfirst($legislation_type);

        Excel::create($file_name, function($excel) use($sheet_title, $monitored_legislations) {
            $excel->sheet($sheet_title, function($sheet) use($monitored_legislations){
                $sheet->fromArray($monitored_legislations);
            });
        })->export('xls');
    }
}
