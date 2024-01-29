<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Создайте запрос на вывод всех пользователей из таблицы users
        return view('admin.main'); // Выведите всех пользователей в таблицу (все поля)
   
    }
}
        //Сделайте так чтобы только авторизованный пользователь мог видеть все посты
        //(скрыть от гостя)