<?php
namespace App\Repositories;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
class SettingRepository
{
    public function get($data = [], $paginate = true)
    {
        $settings=Setting::query();

        if (isset($data['key'])){
            $settings->where('key',$data['key']);
        }
        if (isset($data['value'])){
            $settings->where('value',$data['value']);
        }
        if (isset($data['hashed_id'])){
            $settings->where('hashed_id',$data['hashed_id']);
        }
        return $paginate ? $settings->paginate(10) : $settings->get();
    }
    public function store(array $data)
    {
        return Setting::create($data);
    }
    public function update(array $data,Setting $setting)
    {
        return $setting->update($data);
    }
    public function destroy(Setting $setting)
    {
        $setting->delete();
    }
}
