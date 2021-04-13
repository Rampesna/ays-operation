<?php

namespace App\Services;

use App\Models\Recruiting;
use Illuminate\Http\Request;

class RecruitingService
{
    private $recruiting;

    /**
     * @return Recruiting
     */
    public function getRecruiting()
    {
        return $this->recruiting;
    }

    /**
     * @param Recruiting $recruiting
     */
    public function setRecruiting(Recruiting $recruiting): void
    {
        $this->recruiting = $recruiting;
    }

    public function save(Request $request)
    {
        $this->recruiting->step_id = $request->step_id;
        $this->recruiting->name = $request->name;
        $this->recruiting->email = $request->email;
        $this->recruiting->phone_number = $request->phone_number;
        $this->recruiting->identification_number = $request->identification_number;
        $this->recruiting->birth_date = $request->birth_date;

        if ($request->hasFile('cv')) {
            $request->file('cv')->move('assets/media/recruiting/cv/', $request->file('cv')->getClientOriginalName());
            $this->recruiting->cv = 'assets/media/recruiting/cv/' . $request->file('cv')->getClientOriginalName();
        }

        $this->recruiting->save();

        return $this->recruiting;
    }
}
