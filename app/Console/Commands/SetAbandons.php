<?php

namespace App\Console\Commands;

use App\Http\Api\NetsantralApi;
use App\Models\Queue;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class SetAbandons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetAbandon:EveryThirtyMinutes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $netSantralApi = new NetsantralApi;
        $queues = Queue::where('company_id', 1)->pluck('short')->toArray();
        $response = (array)json_decode($netSantralApi->Abandons($queues)->body());

        $list = [];

        foreach ($queues as $queue) {
            if ($getQueue = Queue::where('short', $queue)->first()) {
                if (!is_null($getQueue->group_code) && $getQueue->group_code != 0) {
                    foreach ($response[$queue] as $phone) {
                        if (
                            $phone->isProcessed == 0 ||
                            $phone->isProcessed == "0" ||
                            $phone->result == "" ||
                            $phone->result == "Cevap Yok" ||
                            $phone->result == "Meşgul"
                        ) {
                            $list[] = [
                                'kayipGrupKodu' => $getQueue->group_code,
                                'tel' => $phone->callerNumber
                            ];
                        }
                    }
                }
            }
        }

        $operationApi = new \App\Http\Api\OperationApi\Operation\OperationApi;
        $operationApi->SetLostList($list);

        return 0;
    }
}
