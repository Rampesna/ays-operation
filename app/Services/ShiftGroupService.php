<?php

namespace App\Services;

use App\Models\ShiftGroup;
use Illuminate\Http\Request;

class ShiftGroupService
{
    private $shiftGroup;

    /**
     * @return ShiftGroup
     */
    public function getShiftGroup()
    {
        return $this->shiftGroup;
    }

    /**
     * @param ShiftGroup $shiftGroup
     */
    public function setShiftGroup(ShiftGroup $shiftGroup): void
    {
        $this->shiftGroup = $shiftGroup;
    }

    public function save(
        $companyId,
        $name,
        $addType,
        $perDay,
        $breakDuration,
        $description,
        $deleteIfExist,
        $afterSunday,
        $setGroupWeekly,
        $day0,
        $day0StartTime,
        $day0EndTime,
        $day1,
        $day1StartTime,
        $day1EndTime,
        $day2,
        $day2StartTime,
        $day2EndTime,
        $day3,
        $day3StartTime,
        $day3EndTime,
        $day4,
        $day4StartTime,
        $day4EndTime,
        $day5,
        $day5StartTime,
        $day5EndTime,
        $day6,
        $day6StartTime,
        $day6EndTime,
        $employees
    )
    {
        $this->shiftGroup->company_id = $companyId;
        $this->shiftGroup->name = $name;
        $this->shiftGroup->add_type = $addType;
        $this->shiftGroup->per_day = $perDay;
        $this->shiftGroup->break_duration = $breakDuration;
        $this->shiftGroup->description = $description;
        $this->shiftGroup->delete_if_exist = $deleteIfExist;
        $this->shiftGroup->after_sunday = $afterSunday;
        $this->shiftGroup->set_group_weekly = $setGroupWeekly;
        $this->shiftGroup->day0 = $day0;
        $this->shiftGroup->day0_start_time = $day0StartTime;
        $this->shiftGroup->day0_end_time = $day0EndTime;
        $this->shiftGroup->day1 = $day1;
        $this->shiftGroup->day1_start_time = $day1StartTime;
        $this->shiftGroup->day1_end_time = $day1EndTime;
        $this->shiftGroup->day2 = $day2;
        $this->shiftGroup->day2_start_time = $day2StartTime;
        $this->shiftGroup->day2_end_time = $day2EndTime;
        $this->shiftGroup->day3 = $day3;
        $this->shiftGroup->day3_start_time = $day3StartTime;
        $this->shiftGroup->day3_end_time = $day3EndTime;
        $this->shiftGroup->day4 = $day4;
        $this->shiftGroup->day4_start_time = $day4StartTime;
        $this->shiftGroup->day4_end_time = $day4EndTime;
        $this->shiftGroup->day5 = $day5;
        $this->shiftGroup->day5_start_time = $day5StartTime;
        $this->shiftGroup->day5_end_time = $day5EndTime;
        $this->shiftGroup->day6 = $day6;
        $this->shiftGroup->day6_start_time = $day6StartTime;
        $this->shiftGroup->day6_end_time = $day6EndTime;
        $this->shiftGroup->save();

        $this->shiftGroup->employees()->sync($employees);
    }
}
