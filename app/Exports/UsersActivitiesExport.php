<?php

namespace App\Exports;

use App\Models\UserActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UsersActivitiesExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $userId;
    protected $date;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($userId, $date)
    {
        $this->userId = $userId;
        $this->date = $date;
    }

    public function collection()
    {
        $usersActivities = UserActivity::with('user')
            ->whereHas('user', function ($query) {
                $query->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'super Admin');
                });
            });
    
        if (!empty($this->userId) && $this->userId !== 'null') {
            $usersActivities->where('user_id', $this->userId);
        }
    
        if (!empty($this->date)) {
            $usersActivities->where(function ($query) {
                $query->whereDate('logged_in', $this->date)
                      ->orWhereDate('logged_out', $this->date);
            });
        }
    
        $usersActivities = $usersActivities->latest()->get();
    
        $data = [];
        foreach ($usersActivities as $usersActivitie) {
            $data[] = [
                'first_name' => $usersActivitie->user->first_name,
                'last_name'  => $usersActivitie->user->last_name,
                'punch_in'   => $usersActivitie->logged_in,
                'punch_out'  => $usersActivitie->logged_out
            ];
        }
    
        return collect($data);
    }
    
    public function headings(): array
    {
        return [
            'first_name',
            'last_name',
            'punch_in',
            'punch_out'
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '', // Set enclosure to empty string to avoid quotes
            'escape' => '\\',
        ];
    }
}
