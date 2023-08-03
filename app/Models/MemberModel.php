<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class MemberModel extends Model{
    protected $table = 'member_info';
    
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'email',
        'cell_leader_id',
        'if_cell_leader',
        'pre_encounter',
        'encounter',
        'post_encounter',
        'sol1',
        'sol2',
        'sol3',
        'created_at'
    ];

    public function getAllCellLeader(){

        return $this->table('member_info')
                    ->select('id,firstname,lastname')
                    ->where('if_cell_leader', 1)
                    ->get()
                    ->getResult();

    }


}