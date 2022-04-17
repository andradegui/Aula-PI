<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'description', 'stock', 'category_id', 'image'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tag_id){  //pluck retorna os id's (ou o que eu quiser)
        return in_array($tag_id, $this->Tags->pluck('id')->toArray());
    }

}
