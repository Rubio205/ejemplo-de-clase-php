# Ejercicio 4: Arrays Mixtos (10 puntos)

## 🌐 Interfaz Web del Servidor

**Antes de comenzar**, puedes acceder a la interfaz web para monitorear tu progreso en tiempo real:

- **Dashboard Principal**: [http://localhost:8000](http://localhost:8000)
- **Resultados de Tests**: [http://localhost:8000/test-results.php](http://localhost:8000/test-results.php) (se actualiza automáticamente cada 30 segundos)
- **Información de PHP**: [http://localhost:8000/phpinfo.php](http://localhost:8000/phpinfo.php)

💡 **Tip**: Mantén abierta la página de resultados de tests en tu navegador mientras desarrollas para ver feedback inmediato.

---

## Objetivo

Aprender a crear arrays que contengan múltiples tipos de datos (arrays mixtos).

## 📊 Puntuación

- **Puntos de este ejercicio**: 10
- **Puntos totales del proyecto**: 100

## Consideraciones

Este ejercicio cubre:

- Creación de arrays en PHP
- Arrays con tipos de datos mixtos
- Comprensión de la flexibilidad de tipos en PHP

**Documentación de referencia:** https://www.php.net/manual/es/language.types.array.php

## Instrucciones

1. **Archivo de trabajo**: `/exercises/MixedArrayCreator.php`
2. **Archivo de tests**: `/tests/MixedArrayCreatorTest.php`

3. **Implementar el siguiente método**:

   **Método `createMixedArray(): array`**
   - QUÉ HACER: Retorna un array que contenga exactamente estos elementos en este orden:
     1. Un boolean `true`
     2. Un integer `42`
     3. Un float `3.14`
     4. Un string `"PHP"`
     5. Un array vacío `[]`
     6. El valor `null`

   - EJEMPLO:
     ```php
     return [true, 42, 3.14, "PHP", [], null];
     ```

## Estructura del Código

```php
<?php

namespace Exercises;

class MixedArrayCreator
{
    public function createMixedArray(): array
    {
        // TODO: Retornar un array con los 6 elementos especificados
        return [];
    }
}
```

## ¿Qué es un Array Mixto?

En PHP, los arrays pueden contener elementos de diferentes tipos al mismo tiempo:

```php
$mixto = [
    true,           // boolean
    42,             // integer
    3.14,           // float
    "texto",        // string
    [1, 2, 3],      // array
    null            // null
];
```

Esto es diferente de lenguajes tipados estáticamente donde los arrays suelen contener un solo tipo.

## Casos de Prueba

El test verificará:

- ✅ El array contiene exactamente 6 elementos
- ✅ Elemento 0 es boolean `true`
- ✅ Elemento 1 es integer `42`
- ✅ Elemento 2 es float `3.14`
- ✅ Elemento 3 es string `"PHP"`
- ✅ Elemento 4 es array vacío `[]`
- ✅ Elemento 5 es `null`

## Ejecución de Tests

```bash
# Ejecutar solo este test
./vendor/bin/phpunit tests/MixedArrayCreatorTest.php

# Ejecutar todos los tests
composer test
```

## Criterios de Evaluación

- ✅ Array contiene los 6 elementos en el orden correcto
- ✅ Cada elemento tiene el tipo y valor correctos
- ✅ Cada test que pase suma puntos parciales
- ✅ Todos los tests deben pasar para obtener los 10 puntos completos

## Recursos

- [Arrays en PHP](https://www.php.net/manual/es/language.types.array.php)
- [Tipos de datos en PHP](https://www.php.net/manual/es/language.types.intro.php)
