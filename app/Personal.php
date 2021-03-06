<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Personal extends Model implements AuthenticatableContract,Searchable
{
    use Notifiable;

    protected $table="personal";
    protected $fillable=[
        'nick',
        'password',
        'tipo_personal',
        'rol'
    ];
    public $timestamps=false;
    public function persona(){
        return $this->belongsTo('App\Persona','personaid','id');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthIdentifierName()
    {
        return "nick";
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return $this->{$this->getRememberTokenName()};
        }
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    public function getRole(){
        return $this->rol;
    }

    public function getSearchResult(): SearchResult
    {
        $url=route('user.buscar',$this->nick);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nick,
            $url
        );
    }
}
