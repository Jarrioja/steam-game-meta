# Guía de Contribución

¡Gracias por tu interés en contribuir al plugin Steam Game Meta! Este documento proporciona pautas y estándares para contribuir al proyecto.

## 📋 Tabla de Contenidos

- [Código de Conducta](#código-de-conducta)
- [Cómo Contribuir](#cómo-contribuir)
- [Proceso de Desarrollo](#proceso-de-desarrollo)
- [Estándares de Código](#estándares-de-código)
- [Reportar Bugs](#reportar-bugs)
- [Solicitar Funcionalidades](#solicitar-funcionalidades)
- [Pull Requests](#pull-requests)

## 🤝 Código de Conducta

Este proyecto y todos los participantes se rigen por un código de conducta. Al participar, se espera que mantengas este código. Por favor, reporta comportamientos inaceptables a [tu-email@ejemplo.com](mailto:tu-email@ejemplo.com).

## 🚀 Cómo Contribuir

### Tipos de Contribuciones

- **Reportar bugs** - Encuentra y reporta problemas
- **Sugerir funcionalidades** - Propón nuevas características
- **Mejorar documentación** - Ayuda a mejorar la documentación
- **Contribuir código** - Implementa mejoras o nuevas funcionalidades
- **Traducir** - Ayuda con la internacionalización

### Configuración del Entorno de Desarrollo

1. **Fork el repositorio** en GitHub
2. **Clona tu fork** localmente:
   ```bash
   git clone https://github.com/jarrioja/steam-game-meta.git
   cd steam-game-meta
   ```
3. **Configura un entorno de WordPress** para testing
4. **Instala el plugin** en tu entorno de desarrollo

## 🔧 Proceso de Desarrollo

### 1. Crear una Rama

```bash
git checkout -b feature/nombre-de-la-funcionalidad
# o
git checkout -b bugfix/descripcion-del-bug
# o
git checkout -b docs/mejora-documentacion
```

### 2. Hacer Cambios

- Sigue los [estándares de código](#estándares-de-código)
- Escribe código limpio y bien documentado
- Agrega tests si es posible
- Actualiza la documentación si es necesario

### 3. Commit

```bash
git add .
git commit -m "feat: agregar nueva funcionalidad de búsqueda"
```

### 4. Push y Pull Request

```bash
git push origin feature/nombre-de-la-funcionalidad
```

Luego crea un Pull Request en GitHub.

## 📝 Estándares de Código

### PHP

- Sigue las [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Usa espacios en lugar de tabs (4 espacios)
- Nombres de variables y funciones en `snake_case`
- Nombres de clases en `PascalCase`
- Comenta funciones y métodos complejos
- Usa `wp_remote_get()` para llamadas HTTP
- Sanitiza todas las entradas de usuario
- Valida y escapa todas las salidas

### JavaScript

- Sigue las [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/)
- Usa `jQuery` cuando sea apropiado
- Nombres de variables en `camelCase`
- Comenta funciones complejas
- Maneja errores apropiadamente

### CSS

- Sigue las [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/)
- Usa prefijos específicos del plugin (`.steam-`)
- Organiza las reglas lógicamente
- Comenta secciones complejas
- Usa unidades relativas cuando sea posible

### Convenciones de Commits

Usa [Conventional Commits](https://www.conventionalcommits.org/):

```
tipo(alcance): descripción

[descripción opcional más larga]

[notas opcionales]
```

Tipos:
- `feat`: Nueva funcionalidad
- `fix`: Corrección de bug
- `docs`: Cambios en documentación
- `style`: Cambios de formato
- `refactor`: Refactorización de código
- `test`: Agregar o modificar tests
- `chore`: Cambios en herramientas o configuración

## 🐛 Reportar Bugs

### Antes de Reportar

1. Verifica que el bug no haya sido reportado ya
2. Asegúrate de usar la versión más reciente
3. Revisa la documentación

### Información Requerida

- **Descripción clara** del problema
- **Pasos para reproducir** el bug
- **Comportamiento esperado** vs **comportamiento actual**
- **Información del entorno**:
  - Versión de WordPress
  - Versión de PHP
  - Versión del plugin
  - Tema activo
  - Plugins activos
- **Capturas de pantalla** si es relevante
- **Logs de error** si están disponibles

### Template de Bug Report

```markdown
**Descripción del Bug**
Una descripción clara y concisa del problema.

**Pasos para Reproducir**
1. Ve a '...'
2. Haz clic en '...'
3. Observa el error

**Comportamiento Esperado**
Lo que esperabas que pasara.

**Comportamiento Actual**
Lo que realmente pasó.

**Información del Entorno**
- WordPress: X.X.X
- PHP: X.X.X
- Plugin: X.X.X
- Tema: [nombre del tema]

**Capturas de Pantalla**
Si aplica, agrega capturas de pantalla.

**Información Adicional**
Cualquier otra información relevante.
```

## 💡 Solicitar Funcionalidades

### Antes de Solicitar

1. Verifica que la funcionalidad no exista ya
2. Revisa los issues existentes
3. Considera si la funcionalidad es apropiada para el plugin

### Información Requerida

- **Descripción clara** de la funcionalidad
- **Caso de uso** específico
- **Beneficios** para los usuarios
- **Alternativas** consideradas
- **Capturas de pantalla** o mockups si es posible

## 🔄 Pull Requests

### Antes de Enviar

- [ ] El código sigue los estándares del proyecto
- [ ] Se han agregado tests si es necesario
- [ ] La documentación ha sido actualizada
- [ ] El código funciona correctamente
- [ ] No hay conflictos con la rama principal

### Proceso de Review

1. **Revisión automática** - CI/CD checks
2. **Revisión de código** - Maintainers revisan el código
3. **Testing** - Se prueba en diferentes entornos
4. **Aprobación** - Se aprueba y mergea

### Template de Pull Request

```markdown
**Descripción**
Breve descripción de los cambios.

**Tipo de Cambio**
- [ ] Bug fix
- [ ] Nueva funcionalidad
- [ ] Breaking change
- [ ] Documentación

**Testing**
- [ ] He probado estos cambios localmente
- [ ] He agregado tests que prueban mi fix/feature
- [ ] Todos los tests existentes pasan

**Checklist**
- [ ] Mi código sigue los estándares del proyecto
- [ ] He realizado una auto-revisión de mi código
- [ ] He comentado mi código, especialmente en áreas difíciles
- [ ] He actualizado la documentación
- [ ] Mis cambios no generan warnings
- [ ] He agregado tests que prueban que mi fix es efectivo
- [ ] Los tests nuevos y existentes pasan localmente
```

## 📚 Recursos Adicionales

- [WordPress Plugin Development](https://developer.wordpress.org/plugins/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [GitHub Flow](https://guides.github.com/introduction/flow/)
- [Conventional Commits](https://www.conventionalcommits.org/)

## ❓ Preguntas

Si tienes preguntas sobre cómo contribuir:

1. Revisa la documentación existente
2. Busca en los issues cerrados
3. Abre un nuevo issue con la etiqueta `question`
4. Contacta a los maintainers en [jarrioja/steam-game-meta](https://github.com/jarrioja/steam-game-meta)

---

¡Gracias por contribuir al plugin Steam Game Meta! 🎮
