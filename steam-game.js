jQuery(document).ready(function($) {
    let searchTimeout;
    
    // Función de búsqueda
    function performSearch(query) {
        if (!query || query.length < 3) {
            $('#steam_game_results').html('');
            return;
        }

        $('#steam_game_results').html('<div style="text-align: center; padding: 20px; color: #666;">Buscando...</div>');

        $.post(steamGameMeta.ajax_url, {
            action: 'search_steam_game',
            query: query
        }, function(response) {
            if (response.success) {
                let currentSelectedId = $('#steam_game_id').val();
                let html = '<div class="steam-results-grid">';
                response.data.forEach(function(game) {
                    let isSelected = (currentSelectedId == game.id);
                    let selectedClass = isSelected ? ' selected' : '';
                    let buttonText = isSelected ? 'Ya seleccionado' : 'Seleccionar';
                    let buttonClass = isSelected ? 'button-secondary' : 'button-primary';
                    let buttonDisabled = isSelected ? ' disabled' : '';
                    
                    html += '<div class="steam-search-result' + selectedClass + '">';
                    html += '<img src="' + game.header_image + '" class="steam-game-image">';
                    html += '<div class="steam-game-content">';
                    html += '<div class="steam-game-info">';
                    html += '<p class="steam-game-title">' + game.name + '</p>';
                    html += '<p class="steam-game-id">ID: ' + game.id + '</p>';
                    html += '</div>';
                    html += '<div class="steam-game-actions">';
                    html += '<div class="steam-buttons-container">';
                    html += '<button type="button" class="button ' + buttonClass + ' steam-select-btn"' + buttonDisabled + ' data-id="'+game.id+'" data-name="'+game.name+'" data-image="'+game.header_image+'">' + buttonText + '</button>';
                    html += '<a href="https://store.steampowered.com/app/' + game.id + '" target="_blank" class="button button-secondary steam-view-btn">Ver en Steam</a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                html += '</div>';
                $('#steam_game_results').html(html);
            } else {
                $('#steam_game_results').html('<div style="text-align: center; padding: 20px; color: #666;">No se encontraron resultados</div>');
            }
        }).fail(function() {
            $('#steam_game_results').html('<div style="text-align: center; padding: 20px; color: #d63638;">Error en la búsqueda</div>');
        });
    }

    // Autocomplete con debounce
    $('#steam_game_search').on('input', function() {
        let query = $(this).val().trim();
        
        // Limpiar timeout anterior
        clearTimeout(searchTimeout);
        
        // Si el campo está vacío, limpiar resultados
        if (!query) {
            $('#steam_game_results').html('');
            return;
        }
        
        // Esperar 500ms antes de buscar (debounce)
        searchTimeout = setTimeout(function() {
            performSearch(query);
        }, 500);
    });

    // Mantener el botón de búsqueda como alternativa
    $('#steam_game_btn').on('click', function() {
        let query = $('#steam_game_search').val().trim();
        performSearch(query);
    });

    $(document).on('click', '.steam-select-btn', function(e) {
        e.preventDefault();
        let $this = $(this);
        let id = $this.data('id');
        let name = $this.data('name');
        let headerImage = $this.data('image');
        let price = $this.data('price');
        
        $('#steam_game_id').val(id);
        
        // Mostrar el juego seleccionado sin botón de seleccionar
        let selectedHtml = '<div class="steam-selected">';
        selectedHtml += '<img src="' + headerImage + '" class="steam-selected-image">';
        selectedHtml += '<div class="steam-selected-info">';
        selectedHtml += '<p class="steam-selected-title">' + name + '</p>';
        selectedHtml += '<p class="steam-selected-id">Steam ID: ' + id + '</p>';
        selectedHtml += '<div class="steam-selected-actions">';
        selectedHtml += '<a href="https://store.steampowered.com/app/' + id + '" target="_blank" class="button button-secondary steam-selected-btn">Ver en Steam</a>';
        selectedHtml += '<button type="button" class="steam-remove-btn" id="steam_remove_game">Borrar juego</button>';
        selectedHtml += '</div>';
        selectedHtml += '</div>';
        selectedHtml += '</div>';
        
        $('#steam_game_results').html(selectedHtml);
    });

    // Manejar botón de borrar juego
    $(document).on('click', '#steam_remove_game', function() {
        if (!confirm('¿Estás seguro de que quieres borrar el juego seleccionado?')) {
            return;
        }

        // Limpiar el campo hidden
        $('#steam_game_id').val('');
        
        // Limpiar los resultados
        $('#steam_game_results').html('');
        
        // Limpiar el campo de búsqueda
        $('#steam_game_search').val('');
    });

    // Manejar botón de limpiar cache
    $('#steam_clear_cache_btn').on('click', function() {
        if (!confirm('¿Estás seguro de que quieres limpiar el cache de Steam? Esto forzará nuevas consultas a la API.')) {
            return;
        }

        let $btn = $(this);
        let originalText = $btn.text();
        $btn.text('Limpiando...').prop('disabled', true);

        $.post(steamGameMeta.ajax_url, {
            action: 'clear_steam_cache'
        }, function(response) {
            if (response.success) {
                alert('Cache limpiado correctamente');
            } else {
                alert('Error al limpiar cache: ' + (response.data || 'Error desconocido'));
            }
        }).always(function() {
            $btn.text(originalText).prop('disabled', false);
        });
    });
});