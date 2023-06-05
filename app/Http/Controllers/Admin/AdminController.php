<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public $crud;

    function __construct()
    {
        $this->crud = app('crud');
        $this->setup();
    }

    function setup(){}


    function admin_view($view, $params = []){
        return view('backend.'.$view)
        ->with('crud', $this->crud)
        ->with($params);
    }

    function search(Request $request){
        $draw = $request->draw;
        $start = ($request->start != null) ? $request->start : 0;
        $rowperpage = ($request->length != null) ? $request->length : 10;
        $order = ($request->order != null) ? $request->order : false;
        $search = ($request->search != null && $request->search['value'] != null) ? $request->search : false;

        $model = $this->crud->model;

        $totalRows = $model->count();
        $filteredRows = $model->count();

        if ($search) {
            $search = $request->search['value'];
            $columns = $this->crud->columns;
            $model = $model->where(function($query) use($search, $columns){
                foreach($columns as $column){
                    if(array_key_exists('search', $column)){
                        $query = $column['search']($search, $query);
                    }
                }
            }); 
            $filteredRows = $model->count();
        }

        $model = $model->skip((int) $start);
        $model = $model->take((int) $rowperpage);

        if($order){
            $direction = ($order[0]['dir'] == 'asc') ? 'ASC' : 'DESC';
            if($order[0]['column'] == 0){
                $model = $model->orderBy($this->crud->columns[0]['name'], $direction);
            }else{
                foreach(request()->input('columns') as $key => $column){
                    if($key == $order[0]['column']){
                        if(array_key_exists('orderLogic', $this->crud->columns[$order[0]['column']])){
                            $column = $this->crud->columns[$order[0]['column']];
                            $model = $column['orderLogic']($model, $column, $direction);
                        }else{
                            $model = $model->orderBy($this->crud->columns[$order[0]['column']]['name'], $direction);
                        }
                    }
                }
            }
        }

        $results = $model->get();

        return [
            'draw'            => $draw,
            'recordsTotal'    => $totalRows,
            'recordsFiltered' => $filteredRows,
            'data'            => $this->getApplyColumnResult($results),
        ];

    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.categorie', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request){
        $update = $this->crud->model->where($this->crud->model->getKeyName(), $id)
        ->update($request);
        flash()->addSuccess('Your data '.$this->crud->title.' success to update');
        return $update;
    }

    function destroy($id){
        $delete = $this->crud->model
        ->where($this->crud->getPrimaryKey(), $id)
        ->delete();
        return $delete;
    }

    private function getApplyColumnResult($results){
        $data = [];
        foreach($results as $dataset){
            $datacolumn = [];
            foreach($this->crud->get_all_columns() as $column){
                $value = (array_key_exists($column['name'], $dataset->toArray())) ? $dataset[$column['name']] : $dataset;
                $datacolumn[$column['name']] = View::make('backend.component.column.'.$column['type'])
                ->with('value', $value)
                ->with('crud', $this->crud)
                ->with('column', $column)
                ->with('query', $dataset)->render();
            }
            $datacolumn['action'] = View::make('backend.component.column.action')
            ->with('crud', $this->crud)
            ->with('query', $dataset)->render();
            $data[] = $datacolumn;
        }
        return $data;
    }


    function get_validator(Array $rule, $request){
        $validator = Validator::make($request, $rule);
        if ($validator->fails()) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(redirect()->back()
            ->withErrors($validator->errors())
            ->withInput());
       }
    }

}
