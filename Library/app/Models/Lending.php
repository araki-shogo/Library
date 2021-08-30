<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lending extends Model
{
    protected $table = 'lendings';

    protected $fillable = [
        "user_id",
        'book_id',
        'lent_date',
        'return_date',
        'status',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function getData()
    {
        $datas = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'lent_date' => $this->lent_date,
            'return_date' => $this->status,
        ];
        return $datas;
    }
    
    use Notifiable;
    /**
     * Slackチャンネルに対する通知をルートする
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForSlack($notification)
    {
        return '';
    }
}
