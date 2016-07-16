<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class CompanyImageStatus extends Model
{
    protected $table = "company_image_statuses";
    protected $fillable = ['status_id','company_image_status'];

    public function setCompanyImageStatusAttribute($company_image_status)
    {
        $this->attributes['company_image_status'] = Carbon::now()->second.Carbon::now()->minute.Carbon::now()->hour.$company_image_status->getClientOriginalName();

        $name = Carbon::now()->second.Carbon::now()->minute.Carbon::now()->hour.$company_image_status->getClientOriginalName();

        \Storage::disk('local')->put($name, \File::get($company_image_status));
    }


}
