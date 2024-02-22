<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'judul',
    //     'slug',
    //     'kategori',
    //     'penerbit',
    //     'penulis'
    // ];

    protected $guarded = ['id'];


    public function kategori(){
      return $this->belongsTo(Kategori::class);
    }

    public function penerbit(){
      return $this->belongsTo(Penerbit::class);
    }

        public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters){
      $query->when($filters['cari'] ?? false, function($query, $cari){
        return $query->where('judul', 'like', '%'. $cari.'%')
              ->orWhere('penulis', 'like', '%'. $cari.'%');
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function getRouteKeyName(): string {
    return 'slug';
    }
}
