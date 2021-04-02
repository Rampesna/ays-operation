<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @method static where($column, $parameter)
 * @method static find($primaryKey)
 */
class Overtime extends Model
{
    use HasFactory, SoftDeletes;

    private function minutesToHours($minutes)
    {
        return intval($minutes / 60);
    }

    private function hoursToDays($hours)
    {
        return intval($hours / 8);
    }

    private function calculateMinutes()
    {
        $minutes = 0;

        if (date('Y-m-d', strtotime($this->start_date)) == date('Y-m-d', strtotime($this->end_date))) {
            $minutes =
                Carbon::createFromDate($this->start_date)->diffInMinutes($this->end_date) >= 480 ?
                    480 :
                    Carbon::createFromDate($this->start_date)->diffInMinutes($this->end_date);
        } else {
            $period = Carbon::createFromDate($this->start_date)->diffInDays($this->end_date);
            for ($counter = 0; $counter <= $period; $counter++) {
                if ($counter == 0) {
                    $minutes +=
                        Carbon::createFromDate($this->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($this->start_date))) >= 480 ?
                            480 :
                            Carbon::createFromDate($this->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($this->start_date)));
                } else if ($counter == $period) {
                    $minutes +=
                        Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($this->end_date)))->diffInMinutes($this->end_date) >= 480 ?
                            480 :
                            Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($this->end_date)))->diffInMinutes($this->end_date);
                } else {
                    $minutes += 480;
                }
            }
        }

        return $minutes;
    }

    public function getDurationAttribute()
    {
        $minutes = $this->calculateMinutes();

        $durationOfPermitMinutes = $minutes - ($this->minutesToHours($minutes) * 60);
        $durationOfPermitHours = $this->minutesToHours($minutes) - ($this->hoursToDays($this->minutesToHours($minutes)) * 8);
        $durationOfPermitDays = $this->hoursToDays($this->minutesToHours($minutes));

        return
            ($durationOfPermitDays != 0 ? $durationOfPermitDays . ' Gün' : '') .
            ($durationOfPermitHours != 0 ? ' ' . $durationOfPermitHours . ' Saat' : '') .
            ($durationOfPermitMinutes != 0 ? ' ' . $durationOfPermitMinutes . ' Dakika' : '');
    }

    public function getMinutesAttribute()
    {
        return $this->calculateMinutes();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function reason()
    {
        return $this->belongsTo(OvertimeReason::class, 'reason_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OvertimeStatus::class, 'status_id', 'id');
    }
}
