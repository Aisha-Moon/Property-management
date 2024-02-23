<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function get_record($request){
        $return=self::select('users.*','vendor_types.name as vendor_type_name','categories.category_name as category_name')
        ->join('vendor_types','vendor_types.id','=','users.vendor_type_id','left')
        ->join('categories','categories.id','=','users.category_id','left')
            ->orderBy('users.id','desc')
            ->where('users.is_admin',2)
            ->where('users.is_delete',0);
            // search starts
             if(!empty(Request::get('id'))){
                $return=$return->where('users.id','=',Request::get('id'));
             }
             if(!empty(Request::get('name'))){
                $return=$return->where('users.name','like','%'.Request::get('name').'%');
             }
             if(!empty(Request::get('last_name'))){
                $return=$return->where('users.last_name','like','%'.Request::get('last_name').'%');
             }
             if(!empty(Request::get('email'))){
                $return=$return->where('users.email','like','%'.Request::get('email').'%');
             }
             if(!empty(Request::get('mobile'))){
                $return=$return->where('users.mobile','like','%'.Request::get('mobile').'%');
             }
            // search ends

        $return= $return->paginate(4);
        return $return;
    }
    static public function get_record_user($request){
        $return=self::select('users.*')
            ->orderBy('users.id','desc')
            ->where('is_admin',0)
            ->where('is_delete',0);
         // search starts
         if(!empty(Request::get('id'))){
            $return=$return->where('users.id','=',Request::get('id'));
         }
         if(!empty(Request::get('name'))){
            $return=$return->where('users.name','like','%'.Request::get('name').'%');
         }
         if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','like','%'.Request::get('last_name').'%');
         }
         if(!empty(Request::get('email'))){
            $return=$return->where('users.email','like','%'.Request::get('email').'%');
         }
         if(!empty(Request::get('mobile'))){
            $return=$return->where('users.mobile','like','%'.Request::get('mobile').'%');
         }
        // search ends
         $return=$return->paginate(10);
         return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
