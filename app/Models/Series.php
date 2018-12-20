<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Series extends Model
{
    protected $table = 'series';
    public $timestamps = false;
    protected $guarded = [];

    public function saveData(array $data)
    {
        DB::beginTransaction();
        foreach($data as $item) {
            try {
                $this->updateOrCreate($item);
            }
            catch (\Exception $e) {
                return null;
            }
        }
        DB::commit();

        return true;
    }

    public function getSearch (string $search = '')
    {
        $result = $this
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('episode', 'like', '%'.$search.'%')
            ->orderBy('date', 'desc')
            ->paginate(10);

        $result->appends(['s' => $search])->links();

        return $result;
    }
}
