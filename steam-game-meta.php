<?php
/*
Plugin Name: Steam Game Meta
Description: Permite buscar juegos en Steam y guardar su steamID en los posts.
Version: 1.0
Author: Jesus Arrioja
*/

if (!defined('ABSPATH')) exit; // seguridad

class Steam_Game_Meta
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_metabox']);
        add_action('save_post', [$this, 'save_metabox']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('wp_ajax_search_steam_game', [$this, 'search_steam_game']);
        add_action('wp_ajax_clear_steam_cache', [$this, 'clear_steam_cache']);
    }

    public function add_metabox()
    {
        add_meta_box(
            'steam_game_meta',
            'Steam Game',
            [$this, 'render_metabox'],
            'post',
            'normal'
        );
    }

    public function render_metabox($post)
    {
        $steamID = get_post_meta($post->ID, '_steam_game_id', true);
?>
        <input type="hidden" name="steam_game_id" id="steam_game_id" value="<?php echo esc_attr($steamID); ?>">

        <div class="steam-search-container">
            <input type="text" id="steam_game_search" class="steam-search-input" placeholder="Escribe para buscar juegos...">
            <button type="button" class="button button-primary" id="steam_game_btn">Buscar</button>
            <button type="button" class="button button-secondary" id="steam_clear_cache_btn">Limpiar Cache</button>
        </div>

        <div id="steam_game_results" style="margin-top:10px;">
            <?php
            if ($steamID) {
                $game = $this->get_game_details($steamID);
                if ($game) {
                    echo '<div class="steam-selected">';
                    echo '<img src="' . esc_url($game['header_image']) . '" class="steam-selected-image">';
                    echo '<div class="steam-selected-info">';
                    echo '<p class="steam-selected-title">' . esc_html($game['name']) . '</p>';
                    echo '<p class="steam-selected-id">Steam ID: ' . esc_html($steamID) . '</p>';
                    echo '<div class="steam-selected-actions">';
                    echo '<a href="https://store.steampowered.com/app/' . $steamID . '" target="_blank" class="button button-secondary steam-selected-btn">Ver en Steam</a>';
                    echo '<button type="button" class="steam-remove-btn" id="steam_remove_game">Borrar juego</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
<?php


    }

    private function get_game_details($steamID)
    {
        // Crear clave única para el transient
        $cache_key = 'steam_game_' . intval($steamID);

        // Intentar obtener datos del cache
        $cached_data = get_transient($cache_key);
        if ($cached_data !== false) {
            return $cached_data;
        }

        // Si no está en cache, hacer la llamada a la API
        $url = "https://store.steampowered.com/api/appdetails?appids=" . intval($steamID) . "&cc=us&l=es";
        $response = wp_remote_get($url);
        if (is_wp_error($response)) return null;

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data[$steamID]['success']) && $data[$steamID]['success']) {
            $game_data = $data[$steamID]['data'];

            // Guardar en cache por 24 horas (86400 segundos)
            set_transient($cache_key, $game_data, 24 * HOUR_IN_SECONDS);

            return $game_data;
        }
        return null;
    }


    public function save_metabox($post_id)
    {
        if (isset($_POST['steam_game_id'])) {
            update_post_meta($post_id, '_steam_game_id', sanitize_text_field($_POST['steam_game_id']));
        }
    }

    public function enqueue_assets($hook)
    {
        if ($hook === 'post.php' || $hook === 'post-new.php') {
            wp_enqueue_style('steam-game-meta', plugin_dir_url(__FILE__) . 'steam-game-meta.css', [], '1.0.1');
            wp_enqueue_script('steam-game-meta', plugin_dir_url(__FILE__) . 'steam-game.js', ['jquery'], '1.0.1', true);
            wp_localize_script('steam-game-meta', 'steamGameMeta', [
                'ajax_url' => admin_url('admin-ajax.php')
            ]);
        }
    }

    public function search_steam_game()
    {
        if (!isset($_POST['query'])) wp_send_json_error();

        $query = sanitize_text_field($_POST['query']);

        // Crear clave única para el cache de búsqueda
        $search_cache_key = 'steam_search_' . md5($query);

        // Intentar obtener resultados del cache
        $cached_results = get_transient($search_cache_key);
        if ($cached_results !== false) {
            wp_send_json_success($cached_results);
        }

        // API de Steam (ejemplo con Store)
        $url = "https://store.steampowered.com/api/storesearch/?term=" . urlencode($query) . "&cc=us";

        $response = wp_remote_get($url);
        if (is_wp_error($response)) wp_send_json_error();

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (!$data || empty($data['items'])) wp_send_json_error();

        $results = [];
        foreach ($data['items'] as $item) {
            // Obtener detalles completos del juego (ya usa cache internamente)
            $game_details = $this->get_game_details($item['id']);
            if ($game_details) {
                $results[] = [
                    'id' => $item['id'],
                    'name' => $game_details['name'],
                    'header_image' => $game_details['header_image'],
                    'price_overview' => isset($game_details['price_overview']) ? $game_details['price_overview'] : null
                ];
            }
        }

        // Guardar resultados de búsqueda en cache por 1 hora
        set_transient($search_cache_key, $results, HOUR_IN_SECONDS);

        wp_send_json_success($results);
    }

    public function clear_steam_cache()
    {
        // Verificar permisos de administrador
        if (!current_user_can('manage_options')) {
            wp_send_json_error('No tienes permisos para realizar esta acción');
        }

        global $wpdb;

        // Eliminar todos los transients relacionados con Steam
        $wpdb->query(
            "DELETE FROM {$wpdb->options} 
             WHERE option_name LIKE '_transient_steam_game_%' 
             OR option_name LIKE '_transient_timeout_steam_game_%'
             OR option_name LIKE '_transient_steam_search_%' 
             OR option_name LIKE '_transient_timeout_steam_search_%'"
        );

        wp_send_json_success('Cache de Steam limpiado correctamente');
    }
}

new Steam_Game_Meta();
