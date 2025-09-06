# Steam Game Meta Plugin

Un plugin de WordPress que permite buscar juegos de Steam y asociarlos con posts, guardando el Steam ID como metadato personalizado.

## 🎮 Características

- **Búsqueda en tiempo real**: Busca juegos de Steam con autocompletado
- **Interfaz intuitiva**: Metabox fácil de usar en el editor de posts
- **Cache inteligente**: Sistema de cache para optimizar las consultas a la API de Steam
- **Información completa**: Muestra imagen, nombre, ID y enlace directo a Steam
- **Gestión de cache**: Botón para limpiar el cache cuando sea necesario

## 📋 Requisitos

- WordPress 5.0 o superior
- PHP 7.4 o superior
- Conexión a internet (para consultar la API de Steam)

## 🚀 Instalación

### Instalación manual

1. Descarga el plugin desde este repositorio
2. Sube la carpeta `steam-game-meta` al directorio `/wp-content/plugins/` de tu WordPress
3. Activa el plugin desde el panel de administración de WordPress

### Instalación via Git

```bash
cd wp-content/plugins/
git clone https://github.com/jarrioja/steam-game-meta.git
```

## 📖 Uso

1. **Activar el plugin** desde el panel de administración
2. **Crear o editar un post** en WordPress
3. **Buscar el metabox "Steam Game"** en el editor de posts
4. **Escribir el nombre del juego** en el campo de búsqueda
5. **Seleccionar el juego** de los resultados mostrados
6. **Guardar el post** para asociar el juego

### Funcionalidades del metabox

- **Campo de búsqueda**: Escribe para buscar juegos automáticamente
- **Botón "Buscar"**: Búsqueda manual alternativa
- **Botón "Limpiar Cache"**: Limpia el cache de Steam (solo administradores)
- **Juego seleccionado**: Muestra información del juego asociado
- **Enlace a Steam**: Acceso directo a la página del juego en Steam

## 🔧 Configuración

El plugin funciona automáticamente sin configuración adicional. Utiliza la API pública de Steam para obtener información de los juegos.

### Cache

- **Cache de juegos**: 24 horas
- **Cache de búsquedas**: 1 hora
- **Limpieza manual**: Disponible para administradores

## 🛠️ Desarrollo

### Estructura del plugin

```
steam-game-meta/
├── steam-game-meta.php    # Archivo principal del plugin
├── steam-game-meta.css    # Estilos del metabox
├── steam-game.js          # JavaScript para funcionalidad
├── README.md              # Documentación
├── CHANGELOG.md           # Historial de cambios
├── LICENSE                # Licencia
└── .gitignore            # Archivos ignorados por Git
```

### Hooks disponibles

El plugin utiliza los siguientes hooks de WordPress:

- `add_meta_boxes`: Para agregar el metabox
- `save_post`: Para guardar el Steam ID
- `admin_enqueue_scripts`: Para cargar CSS y JS
- `wp_ajax_search_steam_game`: Para búsquedas AJAX
- `wp_ajax_clear_steam_cache`: Para limpiar cache

### Metadatos

- **Campo**: `_steam_game_id`
- **Tipo**: String (Steam App ID)
- **Alcance**: Posts individuales

## 🐛 Solución de problemas

### El metabox no aparece
- Verifica que el plugin esté activado
- Asegúrate de estar editando un post (no página)
- Revisa los permisos de usuario

### No se encuentran juegos
- Verifica tu conexión a internet
- Comprueba que la API de Steam esté disponible
- Intenta limpiar el cache del plugin

### Errores de JavaScript
- Verifica que jQuery esté cargado
- Revisa la consola del navegador para errores
- Asegúrate de que los archivos CSS/JS se carguen correctamente

## 📝 Changelog

Ver [CHANGELOG.md](CHANGELOG.md) para el historial completo de cambios.

## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agrega nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

Ver [CONTRIBUTING.md](CONTRIBUTING.md) para más detalles.

## 📄 Licencia

Este plugin está licenciado bajo la Licencia MIT. Ver [LICENSE](LICENSE) para más detalles.

## 👨‍💻 Autor

**Jesús Arrioja**

- GitHub: [@jarrioja](https://github.com/jarrioja)

## 🙏 Agradecimientos

- Steam por proporcionar su API pública
- La comunidad de WordPress por las mejores prácticas
- Todos los contribuidores del proyecto

⭐ Si este plugin te resulta útil, ¡considera darle una estrella en GitHub!
