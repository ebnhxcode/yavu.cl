<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $table = 'user_sessions';
    protected $fillable = ['user_id'];
}
