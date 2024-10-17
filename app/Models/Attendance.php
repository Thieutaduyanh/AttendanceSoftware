<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classes() : BelongsTo{
        return $this->belongsTo(Classes::class, 'class_id'); // many to one
    }

    public function subjects() : BelongsTo{
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function users() : BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    public function classrooms() : BelongsTo{
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function students() : BelongsToMany{
        return $this->belongsToMany(Student::class, 'attendance_detail', 'attendance_id', 'student_id')->withPivot('status', 'note')
            ->withTimestamps();
    }


}
