<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sleimanx2\Plastic\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    
    use Searchable;
    public $documentType = 'custom_type';
    public $documentIndex = 'custom_index';
    public $searchable = ['id', 'name', 'body', 'tags', 'images'];

    public function buildDocument()
    {
        return [
            'id' => $this->id,
            'tags' => $this->tags
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
