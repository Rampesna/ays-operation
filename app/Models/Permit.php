<?php

namespace App\Models;

use App\Services\PermitService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @method static find($primaryKey)
 */
class Permit extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'duration'
    ];

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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function status()
    {
        return $this->belongsTo(PermitStatus::class, 'status_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(PermitType::class, 'type_id', 'id');
    }
}
