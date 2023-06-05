<?php
    namespace App\Library;

    class CrudPanel {
        public $url;
        public $query;
        public $title;
        public $model;
        public $columns = [];
        public $permissions = [
            'create', 'update', 'delete', 'info'
        ];

        function __construct()
        {}

        function set_model($modelclass){
            $this->model = new $modelclass;
        }

        function set_title($str){
            $this->title = $str;
        }

        function add_column($condition){
            if(!array_key_exists('orderable', $condition)){
                $condition['orderable'] = false;
            }
            $this->columns[] = $condition;
        }

        function get_column($index){
            if(array_key_exists($index, $this->columns)){
                return $this->columns[$index];
            }
            return false;
        }

        function get_all_columns(){
            return $this->columns;
        }
    
        function set_url($str){
            $this->url = 'admin/'.$str;
        }

        function deny_access($access){
            $this->permissions = array_diff($this->permissions, [$access]);
        }

        function allow_access($access){
            if(in_array($access, $this->permissions)){
                return 0;
            }
            $this->permissions[] = $access;
        }

        function has_permission($permission){
            if(in_array($permission, $this->permissions)){
                return true;
            }
            return false;
        }

        function get_item($id){
            $d = $this->model::where($this->model->getKeyName(), $id)->first();
            if($d != null){
                return $d;
            }
            abort(404);
        }

        function getPrimaryKey(){
            return $this->model->getKeyName();
        }

    }
?>