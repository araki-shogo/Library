<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lending;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title'];

    public $timestamps = false;

    // Lendingrモデルに多対1のリレーション
    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }

    public function getData()
    {
        $datas = [
            'id' => $this->id,
            'title' => $this->title,
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
        return 'https://hooks.slack.com/services/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';
    }
}
