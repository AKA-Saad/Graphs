<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        $json_data = file_get_contents(APPPATH . 'json/data.json');
        $data = json_decode($json_data, true);
        $Threatent = $data['Report'][0]["Threatent"];
        $General_User_Conduct_per = $data['Report'][0]["General_User_Conduct_per"];
        $Alertness = $data['Report'][0]["Alertness"];
        $final_score = $data['Report'][0]["final_score"];

        $locations = array();
        foreach ($data['Threatend'] as $threat) {
            $location1 = trim($threat['threat1_geolocation']);
            $location2 = trim($threat['threat2_geolocation']);
            $location3 = trim($threat['threat3_geolocation']);
            $location4 = trim($threat['threat4_geolocation']);
            $location4 = trim($threat['threat5_geolocation']);
            if (!empty($location1)) {
                if (isset($locations[$location1])) {
                    $locations[$location1] += 1;
                } else {
                    $locations[$location1] = 1;
                }
            }
            if (!empty($location2)) {
                if (isset($locations[$location2])) {
                    $locations[$location2] += 1;
                } else {
                    $locations[$location2] = 1;
                }
            }
            if (!empty($location3)) {
                if (isset($locations[$location3])) {
                    $locations[$location3] += 1;
                } else {
                    $locations[$location3] = 1;
                }
            }
            if (!empty($location4)) {
                if (isset($locations[$location4])) {
                    $locations[$location4] += 1;
                } else {
                    $locations[$location4] = 1;
                }
            }
            if (!empty($location5)) {
                if (isset($locations[$location5])) {
                    $locations[$location5] += 1;
                } else {
                    $locations[$location5] = 1;
                }
            }
        }
        arsort($locations);
        $location_list = json_encode($locations);




        return view('report_view', array('report' => $data, 'final_score' => $final_score, 'Alertness' => $Alertness, 'General_User_Conduct_per' => $General_User_Conduct_per, 'locations' => $location_list, 'Threatent' => $Threatent,));
    }
}
