# Changelog

Todos los cambios notables de este proyecto serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/),
y este proyecto adhiere a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2024-01-XX

### Agregado
- Funcionalidad inicial del plugin Steam Game Meta
- Metabox para buscar y seleccionar juegos de Steam
- Integración con la API de Steam Store
- Sistema de cache para optimizar consultas
- Interfaz de usuario con búsqueda en tiempo real
- Botón para limpiar cache (solo administradores)
- Estilos CSS responsivos para el metabox
- JavaScript con autocompletado y debounce
- Validación de permisos para acciones administrativas
- Soporte para múltiples idiomas (español/inglés)

### Características técnicas
- Cache de juegos individuales por 24 horas
- Cache de búsquedas por 1 hora
- Uso de transients de WordPress para cache
- Sanitización de datos de entrada
- Verificación de nonce para seguridad
- Manejo de errores de API
- Compatibilidad con WordPress 5.0+

### Archivos incluidos
- `steam-game-meta.php` - Archivo principal del plugin
- `steam-game-meta.css` - Estilos del metabox
- `steam-game.js` - Funcionalidad JavaScript
- `README.md` - Documentación completa
- `.gitignore` - Archivos ignorados por Git

## [Unreleased]

### Planificado
- Soporte para múltiples juegos por post
- Shortcode para mostrar información del juego en el frontend
- Widget para mostrar juegos populares
- Integración con Steam API para obtener más datos
- Soporte para diferentes tipos de post (páginas, custom post types)
- Opciones de configuración en el panel de administración
- Exportación/importación de datos de juegos
- Estadísticas de uso del plugin

### Mejoras técnicas
- Refactorización del código para mejor mantenibilidad
- Tests unitarios
- Documentación de API
- Optimización de rendimiento
- Soporte para WordPress Multisite
- Internacionalización completa (i18n)

---

## Tipos de cambios

- **Agregado** para nuevas funcionalidades
- **Cambiado** para cambios en funcionalidades existentes
- **Deprecado** para funcionalidades que serán removidas
- **Removido** para funcionalidades removidas
- **Corregido** para correcciones de bugs
- **Seguridad** para vulnerabilidades
