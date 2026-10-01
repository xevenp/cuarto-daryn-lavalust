<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 * 
 * Automatically generated via CLI.
 */
class ProductModel extends Model {
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = ['product_name', 'description', 'price', 'quantity'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->table($this->table)->order_by('created_at', 'DESC')->get_all() ?: [];
    }

    public function find($id)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->get();
    }

    public function create(array $data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function change($id, array $data)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->update($data);
    }

    public function remove($id)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->delete();
    }
}