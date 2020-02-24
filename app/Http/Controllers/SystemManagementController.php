<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Customer;
use Illuminate\Http\Request;

class SystemManagementController extends Controller
{
    public function dashboard()
    {
        $activityCost = Activity::whereBetween('created_at', ['2020-01-01', '2020-01-31'])->sum('activity_cost');

        return view('management.dashboard', compact('activityCost'));
    }

    public function showCalendar()
    {
        return view('management.calendar');
    }

    public function management()
    {
        return view("management.uploadFile");
    }

    public function uplaodFile(Request $request)
    {
        $data = $request->all();
        $file = $data['fileCsv'];
        $filePath = $file->getPathName();

        $fileOpen = fopen($filePath, "r");

        $row = 0;
        while ($line = fgetcsv($fileOpen, 1000, ',')) {
            if ($row++ == 0) {
                continue;
            }

            $activities[] = [
                'atividade' => $line[0],
                'cliente' => strtolower($line[1]),
                'data_pedido' => $line[2],
                'data_para_entregua' => $line[3],
                'status' => $line[4],
                'data_entregue' => $line[5],
                'custo' => $line[6]
            ];
        }

        foreach ($activities as $activity) {
            $cliente = Customer::where('name', '=', $activity['cliente'])->first();

            if (!$cliente) {
                $cliente = Customer::create([
                    "name" => $activity['cliente']
                ]);
            }

            $date = str_replace('/', '-', $activity['data_pedido']);
            $createdAt = date('Y-m-d h:i:s', strtotime($date));
            $updatedAt = date('Y-m-d h:i:s', strtotime($date));


            if ($activity['data_para_entregua']) {
                $date = str_replace('/', '-', $activity['data_para_entregua']);
                $activityDeliveryEstimated = date('Y-m-d', strtotime($date));
            }

            $activityFinish = null;
            if ($activity['data_entregue']) {
                $date = str_replace('/', '-', $activity['data_entregue']);
                $activityFinish = date('Y-m-d', strtotime($date));
            }
            $custo = 0;
            if ($activity['custo'])  {
                $custo = str_replace("R$", "", $activity['custo']);
                $custo = str_replace(",", ".", $custo);
            }

            Activity::create([
                'activity_name' => $activity['atividade'],
                'customer_id' => $cliente->id,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
                'activity_delivery_estimated' => $activityDeliveryEstimated,
                'activity_finish' => $activityFinish,
                'activity_cost' => $custo
            ]);
        }

        return redirect(route('system.management'));
    }

    public function getInfos()
    {
        $activitiesLoad = Activity::all();

        $i = 0;
        foreach ($activitiesLoad as $activity)
        {
            $activities[] = [
                "title" => $activity->activity_name,
                "start" => $activity->activity_delivery_estimated.'T00:00:00',
                'end' => $activity->activity_delivery_estimated.'T00:00:00',
                "extendedProps" => [
                    "department" => "BioChemistry"
                ],
                "description" => $activity->activity_name,
            ];

            if ($activity->activity_finish) {
                $activities[$i]['textColor'] = 'white';
                $activities[$i]['backgroundColor'] = 'green';
                $activities[$i]['borderColor'] = 'green';
            }
            $i++;
        }
        return json_encode($activities);
    }
}
