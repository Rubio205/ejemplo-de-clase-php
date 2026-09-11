# Ejercicio 0: Calculadora Básica en PHP

## 🌐 Interfaz Web del Servidor

**Antes de comenzar**, puedes acceder a la interfaz web para monitorear tu progreso en tiempo real:

- **Dashboard Principal**: [http://localhost:8000](http://localhost:8000)
- **Resultados de Tests**: [http://localhost:8000/test-results.php](http://localhost:8000/test-results.php) (se actualiza automáticamente cada 30 segundos)
- **Información de PHP**: [http://localhost:8000/phpinfo.php](http://localhost:8000/phpinfo.php)

💡 **Tip**: Mantén abierta la página de resultados de tests en tu navegador mientras desarrollas para ver feedback inmediato.

---

## Objetivo

El objetivo de este ejercicio introductorio es familiarizarte con el entorno de desarrollo de PHP, la estructura del proyecto y los conceptos básicos de programación orientada a objetos en PHP. Implementarás una calculadora básica que realiza operaciones aritméticas fundamentales.

## 📊 Puntuación

- **Puntos de este ejercicio**: 15
- **Puntos totales del proyecto**: 100

## Consideraciones

Este ejercicio cubre conceptos básicos de PHP:

- Definición de clases y métodos
- Tipos de datos (float)
- Parámetros y valores de retorno
- Manejo básico de excepciones
- Operadores aritméticos básicos

**Documentación de referencia:**

- https://www.php.net/manual/es/language.oop5.php
- https://www.php.net/manual/es/language.exceptions.php

## Conocimientos que se evaluarán

### 1. Programación Orientada a Objetos

- **Clases**: Definición de la clase `Calculator`
- **Métodos**: Implementación de métodos públicos
- **Encapsulación**: Uso de visibilidad pública para métodos

### 2. Tipos de Datos y Parámetros

- **Tipos primitivos**: Uso del tipo `float` para números decimales
- **Parámetros tipados**: Definición de parámetros con tipos específicos
- **Valores de retorno**: Especificación del tipo de retorno

### 3. Operadores Aritméticos

- **Suma**: Operador `+`
- **Resta**: Operador `-`
- **Multiplicación**: Operador `*`
- **División**: Operador `/`

### 4. Manejo de Excepciones

- **Validación de entrada**: Verificar división por cero
- **Lanzamiento de excepciones**: Uso de `throw new \InvalidArgumentException()`

## Instrucciones

1. **Archivo de trabajo**: Crear esta carpeta y archivo `/exercises/Calculator.php`

2. **Implementar los siguientes métodos** (Los métodos ya están implementados como referencia):

   **a) Método de suma:**
   - `add(float $a, float $b): float`
     - QUÉ HACE: Suma dos números decimales
     - IMPLEMENTACIÓN: `return $a + $b;`
     - EJEMPLO: `add(2.5, 3.7)` debe retornar `6.2`

   **b) Método de resta:**
   - `subtract(float $a, float $b): float`
     - QUÉ HACE: Resta el segundo número del primero
     - IMPLEMENTACIÓN: `return $a - $b;`
     - EJEMPLO: `subtract(10, 3)` debe retornar `7`

   **c) Método de multiplicación:**
   - `multiply(float $a, float $b): float`
     - QUÉ HACE: Multiplica dos números
     - IMPLEMENTACIÓN: `return $a * $b;`
     - EJEMPLO: `multiply(4, 2.5)` debe retornar `10`

   **d) Método de división:**
   - `divide(float $a, float $b): float`
     - QUÉ HACE: Divide el primer número entre el segundo
     - VALIDACIÓN: Debe verificar que el divisor no sea cero
     - IMPLEMENTACIÓN:
       ```php
       if ($b == 0) {
           throw new \InvalidArgumentException('División por cero no permitida');
       }
       return $a / $b;
       ```
     - EJEMPLO: `divide(15, 3)` debe retornar `5`

## Casos de Prueba que Deben Pasar

### Tests Básicos

1. **Suma**: `2 + 3 = 5`
2. **Resta**: `5 - 3 = 2`
3. **Multiplicación**: `4 * 3 = 12`
4. **División**: `10 / 2 = 5`

### Test de Excepción

5. **División por cero**: Debe lanzar `InvalidArgumentException`

### Tests con Data Provider

6. **Múltiples casos**:
   - `1 + 1 = 2`, `1 - 1 = 0`
   - `10 + 5 = 15`, `10 - 5 = 5`
   - `-5 + 5 = 0`, `-5 - 5 = -10`
   - `0.5 + 0.5 = 1.0`, `0.5 - 0.5 = 0.0`

## Conceptos Clave

### Tipos de Datos en PHP

```php
// Declaración de tipos en parámetros y retorno
public function add(float $a, float $b): float
```

### Manejo de Excepciones

```php
// Lanzar excepción cuando ocurre un error
if ($b == 0) {
    throw new \InvalidArgumentException('Mensaje de error');
}
```

### Uso de la Calculadora

```php
$calculator = new Calculator();
$result = $calculator->add(5, 3);  // 8
$result = $calculator->divide(10, 2);  // 5
```

## Ejecución de Tests

Para ejecutar los tests de este ejercicio:

```bash
# Ejecutar todos los tests
composer test

# Ejecutar solo el test de Calculator
./vendor/bin/phpunit tests/CalculatorTest.php

# Ejecutar con detalles
./vendor/bin/phpunit tests/CalculatorTest.php --verbose
```

## Criterios de Evaluación

- ✅ Correcta implementación de operaciones aritméticas básicas
- ✅ Uso apropiado de tipos de datos (float)
- ✅ Manejo correcto de la división por cero con excepción
- ✅ Comprensión de la estructura de clases en PHP
- ✅ Cada método que pase sus tests suma puntos parciales
- ✅ Todos los tests deben pasar para obtener los 15 puntos completos

## Estructura del Proyecto

```
exercises/
├── Calculator.php          # Clase principal (tu código aquí)
tests/
├── CalculatorTest.php      # Tests unitarios
```

## Comandos Útiles

```bash
# Instalar dependencias
composer install

# Ejecutar tests
composer test

# Revisar sintaxis del código
php -l exercises/Calculator.php

# Ver información de PHP
php --version
```

## Recursos Adicionales

- [Documentación oficial de PHP - Clases](https://www.php.net/manual/es/language.oop5.basic.php)
- [Documentación oficial de PHP - Excepciones](https://www.php.net/manual/es/language.exceptions.php)
- [Documentación de PHPUnit](https://phpunit.de/documentation.html)

¡Este es tu primer paso en PHP! Una vez que domines estos conceptos básicos, estarás listo para ejercicios más avanzados.
