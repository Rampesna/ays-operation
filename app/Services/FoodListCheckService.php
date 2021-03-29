<?php

namespace App\Services;

use App\Models\FoodListCheck;
use Illuminate\Http\Request;

class FoodListCheckService
{
    private $foodListCheck;

    /**
     * @return mixed
     */
    public function getFoodListCheck()
    {
        return $this->foodListCheck;
    }

    /**
     * @param mixed $foodList
     */
    public function setFoodListCheck(FoodListCheck $foodListCheck): void
    {
        $this->foodListCheck = $foodListCheck;
    }

    public function create($foodListId, $employeeId, $checked = null, $locked = 0, $description = null)
    {
        $this->foodListCheck->food_list_id = $foodListId;
        $this->foodListCheck->employee_id = $employeeId;
        $checked != null ? $this->foodListCheck->checked = $checked : null;
        $locked != null ? $this->foodListCheck->locked = $locked : null;
        $description ? $this->foodListCheck->description = $description : null;
        $this->foodListCheck->save();

        return $this->foodListCheck;
    }
}
