<?php

namespace App\Services;

use App\Models\RecruitingReservation;
use Illuminate\Http\Request;

class RecruitingReservationService
{
    private $recruitingReservation;

    /**
     * @return RecruitingReservation
     */
    public function getRecruitingReservation(): RecruitingReservation
    {
        return $this->recruitingReservation;
    }

    /**
     * @param RecruitingReservation $recruitingReservation
     */
    public function setRecruitingReservation(RecruitingReservation $recruitingReservation): void
    {
        $this->recruitingReservation = $recruitingReservation;
    }

    public function save(Request $request)
    {
        $this->recruitingReservation->recruiting_id = $request->recruiting_id;
        $this->recruitingReservation->date = $request->date;
        $this->recruitingReservation->title = $request->title;
        $this->recruitingReservation->content = $request->get('content');
        $this->recruitingReservation->save();

        return $this->recruitingReservation;
    }
}
