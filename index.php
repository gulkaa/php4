<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
</body>
</html>

<?php

class Cookie {
    private $type;

    private $availableTypes = ['шоколадное', 'клубничное', 'банановое', 'ванильное'];

    public function setType($type) {
        if (in_array($type, $this->availableTypes)) {
            $this->type = $type;
        } else {
            throw new Exception("Недопустимый тип печенья: $type. Доступные типы: " . implode(', ', $this->availableTypes));
        }
    }

    public function getType() {
        return $this->type;
    }

    public function displayInfo() {
        echo "<div class='border'>";
        echo "<h2 style='color: rgb(236, 158, 0);'>Информация о печенье</h2>";

        if ($this->type) {
            echo "<p>Тип печенья: <strong style='color: rgb(148, 39, 24); font-size:20px' class='type'>{$this->getType()}</strong></p>";
        } else {
            echo "<p>Тип печенья еще не установлен.</p>";
        }

        echo "<h3>Доступные типы:</h3>";
        echo "<ul style='list-style-type: square;'>";
        foreach ($this->availableTypes as $availableType) {
            echo "<li>{$availableType}</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

try {
    $cookie = new Cookie();
    $cookie->setType('шоколадное');
    $cookie->displayInfo();
    $cookie->setType('фисташковое');
} catch (Exception $e) {
    echo "<div style='font-family: Arial, sans-serif;' class='warning'>Ошибка: " . $e->getMessage() . "</div>";
}