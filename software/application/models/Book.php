<?php
class Book extends MY_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null,$cond=null) {
        if(is_array($cond)){
            if(isset($cond['AuthorId']) and !empty($cond['AuthorId'])){
                $this->db->where('books.AuthorId', $cond['AuthorId']);
            }
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('books.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('books.*');
        $this->db->from('books');
        $this->db->order_by('books.BookId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['AuthorId']) and !empty($cond['AuthorId'])){
                $this->db->where('books.AuthorId', $cond['AuthorId']);
            }
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('books.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('books.*');
        return $this->db->count_all_results('books');
    }
    function add($data) {
        return $this->db->insert('books', $data);
    }
    function add_details($data){
        return $this->db->insert_batch('book_details', $data);
    }
    function read($id){
        return $this->db->get_where('books',array('BookId'=>$id))->row();
    }
    function read_details($id){
        return $this->db->get_where('book_details',array('BookId'=>$id))->result_array();
    }
    function edit($data){
        return $this->db->update('books', $data, array('BookId'=> $data['BookId']));
    }
    function edit_details($book_id,$data){
        $this->db->trans_start();
        $this->db->delete('book_details', array('BookId' => $book_id));
        $this->db->insert_batch('book_details', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('books', array('BookId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function edit_detail_by_details_id($data){
        return $this->db->update('book_details', $data, array('BookDetailsId'=> $data['BookDetailsId']));
    }

    function get_author_list(){
        $this->db->order_by('AuthorId');
        $this->db->select('*');
        $this->db->from('book_authors');
        $query = $this->db->get();
        $query = $query->result_array();
        $author_array = array();
        foreach($query as $row){
            $author_array[$row['AuthorId']]['AuthorId'] =$row['AuthorId'];
            $author_array[$row['AuthorId']]['AuthorName'] =$row['AuthorName'];
        }
        return $author_array;
    }
    function get_book_types_list(){
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('book_types');
        $query = $this->db->get();
        $query = $query->result_array();
        $book_type_array = array();
        foreach($query as $row){
            $book_type_array[$row['TypeId']]['TypeId'] =$row['TypeId'];
            $book_type_array[$row['TypeId']]['TypeName'] =$row['TypeName'];
        }
        return $book_type_array;
    }
    function get_book_list(){
        $this->db->order_by('BookId');
        $this->db->select('*');
        $this->db->from('books');
        $query = $this->db->get();
        $query = $query->result_array();
        $book_array = array();
        foreach($query as $row){
            $book_array[$row['BookId']]['BookId'] =$row['BookId'];
            $book_array[$row['BookId']]['BookName'] =$row['BookName'];
        }
        return $book_array;
    }
    function get_book_details_list(){
        $this->db->order_by('BookDetailsId');
        $this->db->select('book_details.*,books.*');
        $this->db->from('book_details');
        $this->db->join('books', 'book_details.BookId = books.BookId');
        $this->db->where('book_details.BookStatus','A');
        $query = $this->db->get();
        $query = $query->result_array();
        $book_array = array();
        foreach($query as $row){
            $book_array[$row['BookDetailsId']]['BookDetailsId'] =$row['BookDetailsId'];
            $book_array[$row['BookDetailsId']]['BookName'] =$row['BookName'].'('.$row['BookCode'].') - '.$row['IdentificationNumber'];
        }
        return $book_array;
    }
}
