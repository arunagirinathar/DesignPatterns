# DesignPatterns
A lightweight PHP package implementing common design patterns like Singleton and Factory. Useful for clean and efficient object management in PHP projects.

# Design Patterns (PHP)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

A lightweight PHP package implementing common design patterns like **Singleton** and **Factory**. Useful for clean and efficient object management in PHP projects.

---

## 📌 Features
✅ **Singleton** – Ensures only one instance of a class exists.  
✅ **Factory**  – Creates objects without specifying the exact class type.  

## Polyfills (Extra Feature)
Older versions of PHP may not have certain function available. For example
`json_validate()` is not available in PHP versions older than 8.3.0.
This class transparently implements all this functionality as a shim / polyfill without disturbing environments where such functions are available.

Functions currently implemented in the polyfill
✅ **`json_validate`** 

---

## 📥 Installation
Using [Composer](https://getcomposer.org/):
```sh
composer require arunagirinathar/design-patterns
```

---

## 🛠 Usage

### Singleton Example
```php
use Arunagirinathar\DesignPatterns\Singleton;

class MySingleton extends Singleton
{
    private string $data = "Hello, Singleton!";

    public function getData(): string
    {
        return $this->data;
    }
}

$instance1 = MySingleton::getInstance();
$instance2 = MySingleton::getInstance();

echo $instance1->getData(); // Hello, Singleton!
var_dump($instance1 === $instance2); // true (Both refer to the same instance)
```

---

## 📝 License
This project is licensed under the **GNU GPLv3**. See the [LICENSE](LICENSE) file for details.

---

## 📬 Contact
Maintainer: **Arunagirinathar**  
📧 Email: [arunagirinathar@gmail.com](mailto:arunagirinathar@gmail.com)  
🔗 GitHub: [Arunagirinathar/DesignPatterns](https://github.com/arunagirinathar/DesignPatterns)
