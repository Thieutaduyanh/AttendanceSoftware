<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    protected $attendance_id;

    public function __construct($attendance_id)
    {
        $this->attendance_id = $attendance_id;
    }

    public function collection()
    {
        return Attendance::with('students')
            ->where('id', $this->attendance_id)
            ->get()
            ->flatMap(function ($attendance) {
                return $attendance->students->map(function ($student) use ($attendance) {
                    return [
                        'Student Code' => $student->Code,
                        'Student Name' => $student->Name,
                        'Status' => $student->pivot->status,
                        'Note' => $student->pivot->note,
                    ];
                });
            });
    }

    public function headings(): array
    {
        return [
            'Student Code',
            'Student Name',
            'Status',
            'Note',
        ];
    }
}

