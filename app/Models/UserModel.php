<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey ='user_id';
    protected $allowedFields = [
        'user_name','user_fullname' ,'user_email', 'user_password','user_image',
    ];
}