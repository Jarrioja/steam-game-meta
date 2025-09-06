# Estructura del Repositorio

Este documento describe la estructura del repositorio del plugin Steam Game Meta.

## 📁 Estructura de Archivos

```
steam-game-meta/
├── .editorconfig                    # Configuración del editor
├── .gitignore                       # Archivos ignorados por Git
├── .github/                         # Configuración de GitHub
│   ├── ISSUE_TEMPLATE/              # Plantillas de issues
│   │   ├── bug_report.md           # Plantilla para reportar bugs
│   │   └── feature_request.md      # Plantilla para solicitar features
│   └── PULL_REQUEST_TEMPLATE.md    # Plantilla para pull requests
├── CHANGELOG.md                     # Historial de cambios
├── composer.json                    # Configuración de Composer
├── CONTRIBUTING.md                  # Guía de contribución
├── LICENSE                          # Licencia MIT
├── README.md                        # Documentación principal
├── STRUCTURE.md                     # Este archivo
├── steam-game-meta.php              # Archivo principal del plugin
├── steam-game-meta.css              # Estilos del plugin
└── steam-game.js                    # JavaScript del plugin
```

## 📋 Descripción de Archivos

### Archivos Principales del Plugin

- **`steam-game-meta.php`** - Archivo principal del plugin con toda la lógica PHP
- **`steam-game-meta.css`** - Estilos CSS para el metabox y la interfaz
- **`steam-game.js`** - JavaScript para la funcionalidad de búsqueda y AJAX

### Documentación

- **`README.md`** - Documentación principal con instrucciones de instalación y uso
- **`CHANGELOG.md`** - Historial detallado de todos los cambios del plugin
- **`CONTRIBUTING.md`** - Guía completa para contribuir al proyecto
- **`STRUCTURE.md`** - Este archivo que describe la estructura del repositorio

### Configuración

- **`.gitignore`** - Define qué archivos no deben ser incluidos en el repositorio
- **`.editorconfig`** - Configuración consistente para editores de código
- **`composer.json`** - Configuración de Composer para dependencias y scripts
- **`LICENSE`** - Licencia MIT del proyecto

### GitHub

- **`.github/ISSUE_TEMPLATE/`** - Plantillas para crear issues de manera consistente
- **`.github/PULL_REQUEST_TEMPLATE.md`** - Plantilla para pull requests

## 🎯 Propósito de Cada Archivo

### Archivos de Desarrollo

- **`.editorconfig`**: Asegura consistencia en el formato del código entre diferentes editores
- **`.gitignore`**: Evita que archivos innecesarios (logs, cache, etc.) se suban al repositorio
- **`composer.json`**: Define dependencias y scripts de desarrollo (linting, testing)

### Archivos de Documentación

- **`README.md`**: Punto de entrada para nuevos usuarios y desarrolladores
- **`CHANGELOG.md`**: Historial de cambios para usuarios y desarrolladores
- **`CONTRIBUTING.md`**: Guía para contribuidores del proyecto
- **`STRUCTURE.md`**: Documentación de la estructura del repositorio

### Archivos de GitHub

- **Plantillas de Issues**: Facilitan el reporte de bugs y solicitud de features
- **Plantilla de PR**: Asegura que los pull requests incluyan información relevante

## 🔄 Flujo de Desarrollo

1. **Desarrollo**: Modificar archivos PHP, CSS, JS
2. **Testing**: Probar funcionalidades localmente
3. **Documentación**: Actualizar README, CHANGELOG si es necesario
4. **Commit**: Usar mensajes de commit convencionales
5. **Pull Request**: Usar la plantilla para crear PRs consistentes

## 📦 Distribución

Para distribuir el plugin:

1. **Crear ZIP**: Incluir solo los archivos necesarios para el plugin
2. **Excluir**: Archivos de desarrollo (.git, .github, composer.json, etc.)
3. **Incluir**: Solo archivos PHP, CSS, JS, README, LICENSE

## 🚀 Próximos Pasos

- [ ] Agregar tests unitarios
- [ ] Configurar CI/CD con GitHub Actions
- [ ] Agregar más documentación de API
- [ ] Crear archivos de configuración para diferentes entornos
- [ ] Agregar soporte para internacionalización

---

Esta estructura sigue las mejores prácticas para plugins de WordPress y repositorios de código abierto.
