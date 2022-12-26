<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['artist_Name', 'image', 'gerne', 'shortDesc', 'amount', 'date', 'venue'];
    public function scopeFilter($query, array $filters)
    {

        if ($filters['tag'] ?? false) {
            $query->where('gerne', 'like', '%' . request('tag') . '%');
        }
        if ($filters['artist'] ?? false) {
            $query->where('artist_Name', 'like', '%' . request('artist') . '%');
        }
        if ($filters['venue'] ?? false) {
            $query->where('venue', 'like', '%' . request('venue') . '%');
        }

        if (($filters['typeA'] ?? false) && ($filters['typeG'] ?? false) && ($filters['search'] ?? false)) {
            $query->where('venue','like', '%' . request('search') . '%')
            ->where('artist_Name','=',request('typeA'))
            ->where('gerne','like', '%' . request('typeG') . '%')
            ->get();
        }
        
        // count( $request->all());
        else if (($filters['typeA'] ?? false) && ($filters['typeG'] ?? false)) {
            $query->where('artist_Name','=',request('typeA'))
            ->where('gerne','like', '%' . request('typeG') . '%')
            ->get();
        }
        else if (($filters['search'] ?? false) && ($filters['typeG'] ?? false)) {
            $query->where('venue','like', '%' . request('search') . '%')
            ->where('gerne','like', '%' . request('typeG') . '%')
            ->get();
        }
        else if (($filters['typeA'] ?? false) && ($filters['search'] ?? false)) {
            $query->where('venue','like', '%' . request('search') . '%')
            ->where('artist_Name','=',request('typeA'))
            ->get();
        }
        else if (($filters['search'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));

            $query->whereBetween('date', [$start_date, $end_date])->Where(function ($query) {
                $query->where('artist_Name', 'like', '%' . request('search') . '%')
                    ->orwhere('gerne', 'like', '%' . request('search') . '%')
                    ->orwhere('venue', 'like', '%' . request('search') . '%');
            })->get();
        }
        else if (($filters['typeA'] ?? false) && ($filters['search'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));

            $query->where('artist_Name', request('typeA'))
                ->whereBetween('date', [$start_date, $end_date])
                ->Where(function ($query) {
                    $query->where('artist_Name', 'like', '%' . request('search') . '%')
                        ->orwhere('gerne', 'like', '%' . request('search') . '%')
                        ->orwhere('venue', 'like', '%' . request('search') . '%');
                });
        }
        else if (($filters['search'] ?? false) && ($filters['typeG'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));

            $query->where('gerne', request('typeG'))
                ->whereBetween('date', [$start_date, $end_date])
                ->Where(function ($query) {
                    $query->where('artist_Name', 'like', '%' . request('search') . '%')
                        ->orwhere('gerne', 'like', '%' . request('search') . '%')
                        ->orwhere('venue', 'like', '%' . request('search') . '%');
                });
        }
        else if (($filters['search'] ?? false) && ($filters['typeA'] ?? false) && ($filters['typeG'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));
            $query->where('artist_Name', request('typeA'))
                ->where('gerne', request('typeG'))
                ->whereBetween('date', [$start_date, $end_date])
                ->Where(function ($query) {
                    $query->where('artist_Name', 'like', '%' . request('search') . '%')
                        ->orwhere('gerne', 'like', '%' . request('search') . '%')
                        ->orwhere('venue', 'like', '%' . request('search') . '%');
                });
        }
        else if (($filters['typeA'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));

            $query->whereBetween('date', [$start_date, $end_date])->Where(function ($query) {
                $query->where('artist_Name','=',request('typeA'));
            });
        }
        else if (($filters['typeG'] ?? false) && (($filters['start'] ?? false) && ($filters['end'] ?? false))) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));

            $query->whereBetween('date', [$start_date, $end_date])->Where(function ($query) {
                $query->where('gerne','like', '%' . request('typeG') . '%');
            })->get();
        }
        else if (($filters['start'] ?? false) && ($filters['end'] ?? false)) {
            $start_date = date('Y-m-d 00:00:00', strtotime($filters['start']));
            $end_date = date('Y-m-d 23:59:59', strtotime($filters['end']));
            $query->whereBetween('date', [$start_date, $end_date]);
        }
        else if (($filters['search'] ?? false) && ($filters['search'] != null)) {
            $query->where('artist_Name', 'like', '%' . request('search') . '%')
                ->orwhere('gerne', 'like', '%' . request('search') . '%')
                ->orwhere('venue', 'like', '%' . request('search') . '%');
        }
        else if (($filters['typeA'] ?? false) && ($filters['typeA'] != null)) {
            $query->where('artist_Name', 'like', '%' . request('typeA') . '%')
                ->orwhere('gerne', 'like', '%' . request('typeA') . '%')
                ->orwhere('venue', 'like', '%' . request('typeA') . '%');
        }
        else if (($filters['typeG'] ?? false) && ($filters['typeG'] != null)) {
            $query->where('artist_Name', 'like', '%' . request('typeG') . '%')
                ->orwhere('gerne', 'like', '%' . request('typeG') . '%')
                ->orwhere('venue', 'like', '%' . request('typeG') . '%');
        }
    }
}
