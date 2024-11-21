<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UsersImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    public function model(array $row)
    {
        return new User([
            'name'         => $row['name'],
            'email'        => $row['email'],
            'student_id'   => $row['student_id'],
            'rf_id'        => $row['rf_id'],
            'course'       => $row['course'],
            'section'      => $row['section'],
            'section1'     => $row['section1'],
            'time_preference' => $row['time_preference'],
            'password'     => bcrypt('12345678'),
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
        ];
    }
}
