<?php namespace ES\Todo\Controller;

use ES\Todo\Http\Controller;

class Api extends Controller
{
    public function getTodo()
    {
        $id = $this->request->getParam('id');

        return [
            'id'           => $id,
            'name'         => 'Todo item #' . $id,
            'date_created' => '2015-08-13 17:00'
        ];
    }

    public function postTodo()
    {
        return [
            'id'           => 'new-id',
            'name'         => 'Todo item #new-id',
            'date_created' => '2015-08-13 17:00'
        ];
    }

    public function putTodo()
    {
        $id = $this->request->getParam('id');

        return [
            'id'           => $id,
            'name'         => 'Todo item (updated) #' . $id,
            'date_created' => '2015-08-13 17:00'
        ];
    }

    public function deleteTodo()
    {
        $id = $this->request->getParam('id');

        return [
            'id' => $id
        ];
    }
}