<?php



class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $param1 = $param2 = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // получаем параметр 1
        if ( !empty($routes[3]) )
        {
            $param1 = $routes[3];
        }

        // получаем параметр 2
        if ( !empty($routes[4]) )
        {
            $param1 = $routes[4];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;



        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "app/models/".$model_file;

        if(file_exists($model_path))
        {
            include "app/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "app/controllers/".$controller_file;

        if(file_exists($controller_path))
        {
            include "app/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action($param1);
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    public  static function ErrorPage404()
    {
        $host = '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location: /404');
    }
}