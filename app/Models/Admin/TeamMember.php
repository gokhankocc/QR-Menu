<?php

namespace App\Models\Admin;

use App\Models\Api\Company\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $table = "team_members";
}
