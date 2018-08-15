<?php

namespace RP\Kiosk\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use RP\Kiosk\Godparenthood;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        \View::share('earnings', (function() {
            $earnings = 0.0;

            foreach (Godparenthood::all() as $godparenthood) {
                $earnings += $godparenthood->earnings;
            }

            return $earnings;
        })());
    }

    /**
     * Generates a database dump and downloads it.
     *
     * @return Response
     */
    public function generateDbDump(): Response
    {
        $date = Carbon::now()->format('Y-m-d_H-i');
        $filename = 'export_' . $date . '.sql';

        exec('/usr/local/bin/mysqldump --single-transaction --column-statistics=0 --user=' . env('DB_USERNAME') . ' ' . env('DB_DATABASE') . ' --host=' . env('DB_HOST') . ' --password=' . env('DB_PASSWORD') . ' --quick',
            $output
        );

        return new Response(implode("\n", $output), 200, [
            'Content-Transfer-Encoding' => 'binary',
            'Content-Type' => 'application/sql',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ]);
    }
}
