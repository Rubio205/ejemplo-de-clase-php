#!/bin/bash

# Script para verificar que todos los archivos PHP en exercises/ tengan el namespace correcto
# Este script debe ejecutarse antes de hacer commit

echo "🔍 Verificando archivos en exercises/..."
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

has_errors=0

# Verificar cada archivo PHP en exercises/
for file in exercises/*.php; do
    if [ -f "$file" ]; then
        filename=$(basename "$file")
        
        # Verificar si el archivo tiene namespace
        if ! grep -q "^namespace Exercises;" "$file"; then
            echo -e "${RED}❌ ERROR: $filename no tiene 'namespace Exercises;' al inicio${NC}"
            has_errors=1
        else
            echo -e "${GREEN}✓ $filename - OK${NC}"
        fi
        
        # Extraer el nombre de la clase del archivo
        classname="${filename%.php}"
        
        # Verificar si la clase está declarada correctamente
        if ! grep -q "class $classname" "$file"; then
            echo -e "${RED}❌ ERROR: $filename no declara 'class $classname'${NC}"
            has_errors=1
        fi
    fi
done

echo ""

if [ $has_errors -eq 1 ]; then
    echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${RED}⚠️  HAY ERRORES QUE DEBES CORREGIR${NC}"
    echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo ""
    echo -e "${YELLOW}Todos los archivos en exercises/ deben tener:${NC}"
    echo ""
    echo "<?php"
    echo ""
    echo "namespace Exercises;  // ← Esta línea es OBLIGATORIA"
    echo ""
    echo "class NombreClase"
    echo "{"
    echo "    // tu código aquí"
    echo "}"
    echo ""
    echo -e "${YELLOW}Lee INSTRUCCIONES_ESTUDIANTES.md para más información${NC}"
    echo ""
    exit 1
else
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${GREEN}✅ Todos los archivos están correctos${NC}"
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo ""
    echo "Puedes hacer commit con confianza 🚀"
    echo ""
    exit 0
fi
