<?php
// Cambiar al directorio del proyecto
$projectDir = dirname(__DIR__);
chdir($projectDir);

// Leer configuración de autograding
$autogradingFile = $projectDir . '/.github/classroom/autograding.json';
$autogradingData = json_decode(file_get_contents($autogradingFile), true);

$totalPoints = 0;
$earnedPoints = 0;
$testResults = [];

// Ejecutar cada test
if ($autogradingData && isset($autogradingData['tests'])) {
    foreach ($autogradingData['tests'] as $test) {
        $testName = $test['name'] ?? 'Test';
        $command = $test['run'] ?? '';
        $points = $test['points'] ?? 0;
        $totalPoints += $points;
        
        // Ejecutar el comando
        $output = shell_exec($command . ' 2>&1');
        $exitCode = 0;
        exec($command . ' 2>&1', $outputLines, $exitCode);
        
        // Determinar si pasó
        $passed = ($exitCode === 0);
        
        $testResults[] = [
            'name' => $testName,
            'passed' => $passed,
            'points' => $passed ? $points : 0,
            'maxPoints' => $points,
            'output' => $output
        ];
        
        if ($passed) {
            $earnedPoints += $points;
        }
    }
}

// Calcular porcentaje
$percentage = $totalPoints > 0 ? round(($earnedPoints / $totalPoints) * 100, 2) : 0;


// Determinar color del score basado en porcentaje
$scoreClass = 'failed';
if ($percentage >= 90) $scoreClass = 'excellent';
elseif ($percentage >= 80) $scoreClass = 'good';
elseif ($percentage >= 70) $scoreClass = 'ok';
elseif ($percentage >= 60) $scoreClass = 'sufficient';

?>
<style>
    .score-summary {
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: center;
        font-size: 1.2em;
        font-weight: bold;
    }

    .excellent {
        background: #d4edda;
        color: #155724;
        border: 2px solid #28a745;
    }

    .good {
        background: #d1ecf1;
        color: #0c5460;
        border: 2px solid #17a2b8;
    }

    .ok {
        background: #fff3cd;
        color: #856404;
        border: 2px solid #ffc107;
    }

    .sufficient {
        background: #f8d7da;
        color: #721c24;
        border: 2px solid #fd7e14;
    }

    .failed {
        background: #f8d7da;
        color: #721c24;
        border: 2px solid #dc3545;
    }

    .test-result {
        padding: 10px;
        margin: 5px 0;
        border-radius: 4px;
        border-left: 4px solid #ccc;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .test-result.passed {
        background: #d4edda;
        color: #155724;
        border-left-color: #28a745;
    }

    .test-result.failed {
        background: #f8d7da;
        color: #721c24;
        border-left-color: #dc3545;
    }
    
    .test-points {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        background: rgba(0,0,0,0.1);
    }
</style>

<div class="score-summary <?php echo $scoreClass; ?>">
    🎯 Puntuación Final: <?php echo $earnedPoints; ?> / <?php echo $totalPoints; ?> puntos (<?php echo $percentage; ?>%)
    <br>
    <?php
    if ($percentage >= 90) echo "🎉 ¡EXCELENTE! - Trabajo excepcional";
    elseif ($percentage >= 80) echo "✅ ¡MUY BIEN! - Buen trabajo";
    elseif ($percentage >= 70) echo "👍 BIEN - Cumple con los requisitos";
    elseif ($percentage >= 60) echo "⚠️ SUFICIENTE - Necesita mejoras menores";
    else echo "❌ INSUFICIENTE - Requiere trabajo adicional";
    ?>
</div>

<h3>Resultados Detallados:</h3>
<?php foreach ($testResults as $result): ?>
    <div class="test-result <?php echo $result['passed'] ? 'passed' : 'failed'; ?>">
        <div>
            <?php echo $result['passed'] ? '✅' : '❌'; ?>
            <strong><?php echo htmlspecialchars($result['name']); ?></strong>
        </div>
        <div class="test-points">
            <?php echo $result['points']; ?> / <?php echo $result['maxPoints']; ?> pts
        </div>
    </div>
<?php endforeach; ?>

<?php if (empty($testResults)): ?>
    <div class="test-result failed">
        ⚠️ No se encontraron tests para ejecutar. Verifica el archivo autograding.json
    </div>
<?php endif; ?>

<!-- Información de debugging -->
<div style="margin-top: 20px; padding: 10px; background: #f8f9fa; border-radius: 4px; font-size: 0.9em; color: #666;">
    <strong>🔧 Información de Debug:</strong><br>
    • Tests ejecutados: <?php echo count($testResults); ?><br>
    • Tests aprobados: <?php echo count(array_filter($testResults, fn($t) => $t['passed'])); ?><br>
    • Tests fallidos: <?php echo count(array_filter($testResults, fn($t) => !$t['passed'])); ?><br>
    • Directorio: <code><?php echo htmlspecialchars(getcwd()); ?></code><br>
</div>

<div style="margin-top: 20px; padding: 15px; background: #e7f3ff; border-radius: 4px;">
    <strong>💡 Próximos pasos:</strong><br>
    <?php if ($percentage >= 60): ?>
        • ✅ ¡Felicitaciones! Has alcanzado el puntaje mínimo<br>
        • 📝 Revisa los tests que aún fallan para mejorar tu puntuación<br>
        • 🔄 Haz commit y push para que se ejecute el autograding oficial en GitHub
    <?php else: ?>
        • 📝 Revisa los tests que fallan y corrige tu código<br>
        • 🧪 Usa <code>composer test</code> para ejecutar todos los tests<br>
        • 🔧 Usa <code>composer style-fix</code> para corregir problemas de formato<br>
        • 🔍 Usa <code>composer analyze</code> para detectar problemas de código<br>
        • 🔄 Vuelve a ejecutar el autograding hasta alcanzar el puntaje mínimo (60/100 puntos)
    <?php endif; ?>
</div>