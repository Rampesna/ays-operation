<?php

namespace App\Services;

use App\Models\DeviceAction;
use Illuminate\Http\Request;

class DeviceActionService
{
    private $deviceAction;

    public function __construct(DeviceAction $deviceAction)
    {
        $this->deviceAction = $deviceAction;
    }

    public function store($deviceId, $relationId, $relationType)
    {
        $this->deviceAction->device_id = $deviceId;
        $this->deviceAction->relation_id = $relationId;
        $this->deviceAction->relation_type = $relationType;
        $this->deviceAction->date = date('Y-m-d H:i:s');
        $this->deviceAction->save();

        return $this->deviceAction;
    }
}
