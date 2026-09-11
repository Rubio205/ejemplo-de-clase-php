#!/bin/bash

# Script para configurar el entorno de estudiante
# Instala el pre-commit hook para verificar namespaces automáticamente

echo "🔧 Configurando entorno de estudiante..."
echo ""

# Instalar pre-commit hook
if [ -f ".git/hooks/pre-commit" ]; then
    echo "⚠️  Ya existe un pre-commit hook. Respaldando..."
    mv .git/hooks/pre-commit .git/hooks/pre-commit.backup
fi

cat > .git/hooks/pre-commit << 'EOF'
#!/bin/bash

# Pre-commit hook para verificar que todos los archivos tengan namespace correcto

echo ""
echo "🔒 Pre-commit hook: Verificando archivos PHP..."
echo ""

# Ejecutar el script de verificación
./scripts/verify-namespace.sh

exit_code=$?

if [ $exit_code -ne 0 ]; then
    echo ""
    echo "❌ Commit bloqueado por errores de namespace"
    echo ""
    echo "Por favor, corrige los errores antes de hacer commit."
    echo "Lee INSTRUCCIONES_ESTUDIANTES.md para más información."
    echo ""
    exit 1
fi

exit 0
EOF

chmod +x .git/hooks/pre-commit

echo "✅ Pre-commit hook instalado correctamente"
echo ""
echo "Ahora cada vez que hagas commit, se verificará automáticamente"
echo "que tus archivos PHP tengan el namespace correcto."
echo ""
echo "📚 Lee INSTRUCCIONES_ESTUDIANTES.md para más información."
echo ""
