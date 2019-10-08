<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model {

    protected $fillable = [
        "id",
        "title",
        "link",
        "description",
    ];

    public static $rules = [
        "title" => "required|max:255",
        "link" => "required|url|max:255",
        "description" => "required|max:255",
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['tags'];

    public function relationTags()
    {
        return $this->belongsToMany(\App\Tags::class, 'tools_tags', 'tools_id', 'tags_id');
    }

    public function getTagsAttribute()
    {
        return $this->relationTags()->pluck('name');
    }
}
