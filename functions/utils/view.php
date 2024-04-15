<?php



interface IView
{
    public function render(): string;
}
/**
 * connects view parts as solid one
 *
 * @param string $viewFile
 * @param array $data
 * @return false|string|IView
 */

function view(string $viewFile, array $data = []): false|string| IView
{

    try {
        [$folder, $file] = explode('->', $viewFile);

        if (!is_dir('../app/views' . "/$folder")) {
            throw new \RuntimeException("Such folder not found: $folder");
        }


        if (!file_exists('../app/views' . "/$folder/$file.php")) {
            throw new \RuntimeException("Such view file not found: $file");
        }


        // Извлекаем данные для использования в представлении
        extract($data);

        // Начинаем буферизацию вывода
        ob_start();


        require "../app/views/$folder/$file.php";


        // Возвращаем содержимое представления
        return new class() implements IView {
            public function render(): string
            {
                // Получаем содержимое буфера вывода

                $content = ob_get_clean();
                return $content;
            }
        };
    } catch (Exception $e) {
        echo $e->getMessage();
        return '';
    }
}