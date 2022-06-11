<?php 
namespace App\Models;
use CodeIgniter\Model;
class RandomWordModel extends Model
{
    protected $table = 'random_words';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['word'];
}