<?php

namespace App\Services;

use App\Models\FoodList;
use Illuminate\Http\Request;

class FoodListService
{
    private $foodList;

    /**
     * @return mixed
     */
    public function getFoodList()
    {
        return $this->foodList;
    }

    /**
     * @param mixed $foodList
     */
    public function setFoodList(FoodList $foodList): void
    {
        $this->foodList = $foodList;
    }

    public function save(Request $request)
    {
        $this->foodList->name = $request->name;
        $this->foodList->description = $request->description;
        $request->date ? $this->foodList->date = $request->date : null;
        $this->foodList->count = $request->count;
        $this->foodList->save();

        return $this->foodList;
    }
}
