<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ParticipantsModel extends Model{
    protected $table = 'participants';
    
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'created_at'
    ];

    public function getParticipantData($id){
        return $this->where('id', $id)->first();
    }
    
}