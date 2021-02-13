<?php

namespace App\Http\Controllers\UserPanel\Analysis\Queue;

use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Support\Facades\Http;

class QueueAnalysisService
{
    private $html;
    private $request;
    public $table;

    public function __construct($html, $request)
    {
        $this->html = $html;
        $this->request = $request;
        $this->table = $this->initializeHtml($this->html);
    }

    private function initializeHtml($html)
    {
        $clean = str_replace(["\n", "\t", "\r", "  "], null, $html);
        $clean2 = str_replace(["&quot;"], null, $clean);
        $clean3 = preg_replace('~{(.*?)}~', null, $clean2);
        $clean4 = preg_replace('~{(.*?)}~', null, $clean3);
        preg_match('~<table class="table table-striped table-bordered datatable">(.*?)<\/table>~', $clean4, $table);
        preg_match('~<tbody>(.*?)</tbody>~', $table[1], $tbody);
        preg_match_all('~<tr>(.*?)</tr>~', $tbody[1], $rows);

        return $rows;
    }

    public function incoming()
    {
        $response = [];
        foreach ($this->table[1] as $key => $row) {
            preg_match_all('~<td .*?>(.*?)</td>~', $row, $columns);
            $counter = 0;
            foreach ($columns[1] as $column) {
                if ($counter == 0) {
                    $response[$key]["date"] = date('Y-m-d', strtotime(str_replace('/', '-', $column)));
                } else if ($counter == 1) {
                    $response[$key]["name"] = rtrim($column);
                } else if ($counter == 2) {
                    preg_match('~<span .*?>(.*?)</span>~', $column, $data);
                    $response[$key]["total_incoming_call"] = $data[1];
                } else if ($counter == 3) {
                    preg_match('~<button .*?>(.*?)</button>~', $column, $data);
                    $response[$key]["total_incoming_success_call"] = $data[1];
                } else if ($counter == 4) {
                    preg_match('~<button .*?>(.*?)</button>~', $column, $data);
                    $exploded = explode('/', $data[1]);
                    $response[$key]["total_incoming_error_call"] = trim($exploded[0]);
                } else if ($counter == 5) {
                    preg_match('~<button .*?>(.*?)</button>~', $column, $data);
                    $response[$key]["total_incoming_abandoned_call"] = $data[1];
                }

                $counter++;
            }
        }

        foreach ($response as $data) {
            $queue = Queue::where('short', $data["name"])->first();

            $queueAnalysis = QueueAnalysis::
            where('queue_id', $queue->id)->
            where('date', $data["date"])->
            first();

            if (is_null($queueAnalysis)) {
                $queueAnalysis = new QueueAnalysis;
            }

            $queueAnalysis->company_id = $queue->company_id;
            $queueAnalysis->queue_id = $queue->id;
            $queueAnalysis->date = $data["date"];
            $queueAnalysis->total_incoming_call = $data["total_incoming_call"];
            $queueAnalysis->total_incoming_success_call = $data["total_incoming_success_call"];
            $queueAnalysis->total_incoming_error_call = $data["total_incoming_error_call"];
            $queueAnalysis->total_incoming_abandoned_call = $data["total_incoming_abandoned_call"];
            $queueAnalysis->total_incoming_in_of_company_call = 0;
            $queueAnalysis->total_incoming_out_of_company_call = 0;
            $queueAnalysis->save();
        }

        return $response;
    }

    public function outgoing()
    {
        $response = [];
        foreach ($this->table[1] as $key => $row) {
            preg_match_all('~<td .*?>(.*?)</td>~', $row, $columns);
            $counter = 0;
            foreach ($columns[1] as $column) {
                if ($counter == 0) {
                    $response[$key]["date"] = date('Y-m-d', strtotime(str_replace('/', '-', $column)));
                } else if ($counter == 1) {
                    $response[$key]["name"] = rtrim($column);
                } else if ($counter == 2) {
                    preg_match('~<span .*?>(.*?)</span>~', $column, $data);
                    $response[$key]["total_outgoing_call"] = $data[1];
                } else if ($counter == 3) {
                    preg_match_all('~<button .*?>(.*?)</button>~', $column, $data);
                    $response[$key]["total_outgoing_success_call"] = $data[1][0];
                    $response[$key]["total_outgoing_error_call"] = $data[1][1];
                }

                $counter++;
            }
        }

        foreach ($response as $data) {
            $queue = Queue::where('short', $data["name"])->first();

            $calculating = $this->calculating($queue, $data["date"]);
            $calculated = count($calculating['answered']) + count($calculating['noAnswer']);

            $queueAnalysis = QueueAnalysis::
            where('queue_id', $queue->id)->
            where('date', $data["date"])->
            first();

            if (is_null($queueAnalysis)) {
                $queueAnalysis = new QueueAnalysis;
            }

            $queueAnalysis->company_id = $queue->company_id;
            $queueAnalysis->queue_id = $queue->id;
            $queueAnalysis->date = $data["date"];
            $queueAnalysis->total_outgoing_call = $data["total_outgoing_call"];
            $queueAnalysis->total_outgoing_success_call = $data["total_outgoing_success_call"];
            $queueAnalysis->total_outgoing_error_call = $data["total_outgoing_error_call"];
            $queueAnalysis->total_outgoing_in_of_company_call = $calculated;
            $queueAnalysis->total_outgoing_out_of_company_call = 0;
            $queueAnalysis->save();
        }

        return $response;
    }

    public function calculating($queue, $date)
    {
        $members = "";
        foreach ($queue->employees as $index => $employee) {
            $members .= $employee->extension_number;
            $index !== $queue->employees->keys()->last() ? $members .= ',' : null;
        }
        $params = [
            "draw" => "1",
            "columns[0][data]" => "callerNumber",
            "columns[0][name]" => "",
            "columns[0][searchable]" => "true",
            "columns[0][orderable]" => "true",
            "columns[0][search][value]" => "",
            "columns[0][search][regex]" => "false",
            "columns[1][data]" => "calledNumber",
            "columns[1][name]" => "",
            "columns[1][searchable]" => "true",
            "columns[1][orderable]" => "true",
            "columns[1][search][value]" => "",
            "columns[1][search][regex]" => "false",
            "columns[2][data]" => "answeredTime",
            "columns[2][name]" => "",
            "columns[2][searchable]" => "true",
            "columns[2][orderable]" => "true",
            "columns[2][search][value]" => "",
            "columns[2][search][regex]" => "false",
            "columns[3][data]" => "callTime",
            "columns[3][name]" => "",
            "columns[3][searchable]" => "true",
            "columns[3][orderable]" => "true",
            "columns[3][search][value]" => "",
            "columns[3][search][regex]" => "false",
            "columns[4][data]" => "recording",
            "columns[4][name]" => "",
            "columns[4][searchable]" => "true",
            "columns[4][orderable]" => "false",
            "columns[4][search][value]" => "",
            "columns[4][search][regex]" => "false",
            "order[0][column]" => "3",
            "order[0][dir]" => "desc",
            "start" => "0",
            "length" => "100000",
            "search[value]" => "",
            "search[regex]" => "false",
            "_csrf_token" => "istatistik_detay_getir",
            "t1" => date('d.m.Y', strtotime($date)),
            "t2" => date('d.m.Y', strtotime($date)),
            "departman" => "$queue->short",
            "tip" => "answered",
            "startHour" => "",
            "endHour" => "",
            "indate" => "",
            "maxbekleme" => "",
            "members" => $members,
            "saatlik" => ""
        ];

        try {
            $answeredResponse = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detayGiden', $params)["data"];
        } catch (\Exception $exception) {
            $answeredResponse = [];
        }

        try {
            $params["tip"] = "noAnswer";
            $noAnswerResponse = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detayGiden', $params)["data"];
        } catch (\Exception $exception) {
            $noAnswerResponse = [];
        }

        return [
            'answered' => $answeredResponse,
            'noAnswer' => $noAnswerResponse,
        ];
    }

}
