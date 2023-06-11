<?php


class view
{
    public function generate($content_view, $data = null)
    {

        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        include 'app/views/template_view.php';
    }
}