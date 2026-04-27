<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('rb_auto_seo_escape')) {
    function rb_auto_seo_escape($value)
    {
        return htmlspecialchars(trim((string) $value), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('rb_auto_seo_plain_text')) {
    function rb_auto_seo_plain_text($html)
    {
        $text = preg_replace('/<script\b[^>]*>.*?<\/script>/is', ' ', (string) $html);
        $text = preg_replace('/<style\b[^>]*>.*?<\/style>/is', ' ', $text);
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        $text = preg_replace('/\[[^\]]+\]/u', ' ', $text);
        $text = preg_replace('/https?:\/\/\S+/i', ' ', $text);
        $text = preg_replace('/\s+/u', ' ', $text);

        return trim($text);
    }
}

if (!function_exists('rb_auto_seo_excerpt')) {
    function rb_auto_seo_excerpt($text, $limit = 155)
    {
        $text = rb_auto_seo_plain_text($text);
        if (function_exists('cut_str')) {
            return trim(cut_str($text, $limit, ''));
        }

        return function_exists('mb_substr') ? trim(mb_substr($text, 0, $limit, 'UTF-8')) : trim(substr($text, 0, $limit));
    }
}

if (!function_exists('rb_auto_seo_abs_url')) {
    function rb_auto_seo_abs_url($url)
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '';
        }

        if (preg_match('#^https?://#i', $url)) {
            return $url;
        }

        if (strpos($url, '//') === 0) {
            return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https:' : 'http:') . $url;
        }

        return G5_URL . '/' . ltrim($url, '/');
    }
}

if (!function_exists('rb_auto_seo_first_image')) {
    function rb_auto_seo_first_image($bo_table, $wr_id, $content)
    {
        global $g5;

        if (!empty($g5['board_file_table'])) {
            $file = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '".sql_escape_string($bo_table)."' and wr_id = '".(int) $wr_id."' and bf_type between 1 and 3 and bf_file <> '' order by bf_no asc limit 1 ");
            if (!empty($file['bf_file'])) {
                return G5_DATA_URL . '/file/' . rawurlencode($bo_table) . '/' . rawurlencode($file['bf_file']);
            }
        }

        if (preg_match('/<img[^>]+src=["\']?([^"\'>\s]+)/i', (string) $content, $matches)) {
            return rb_auto_seo_abs_url($matches[1]);
        }

        return '';
    }
}

if (!function_exists('rb_auto_seo_keywords')) {
    function rb_auto_seo_keywords($title, $category, $content, $limit = 15)
    {
        $source = trim($title . ' ' . $category . ' ' . rb_auto_seo_plain_text($content));
        preg_match_all('/[\p{L}\p{N}][\p{L}\p{N}\-]{1,}/u', $source, $matches);

        $stopwords = array_flip(array(
            '그리고', '하지만', '또는', '에서', '으로', '에게', '대한', '관련', '있는', '합니다',
            '입니다', '합니다', '대한', '그는', '그녀', '이것', '저것', 'the', 'and', 'for', 'with',
        ));

        $keywords = array();
        foreach ($matches[0] as $word) {
            $word = trim($word, "- \t\n\r\0\x0B");
            $key = function_exists('mb_strtolower') ? mb_strtolower($word, 'UTF-8') : strtolower($word);
            if ($word === '' || isset($stopwords[$key])) {
                continue;
            }
            if (!isset($keywords[$key])) {
                $keywords[$key] = $word;
            }
            if (count($keywords) >= $limit) {
                break;
            }
        }

        return implode(', ', array_values($keywords));
    }
}

if (!function_exists('rb_auto_seo_filter_extra_meta')) {
    function rb_auto_seo_filter_extra_meta($html)
    {
        if (trim((string) $html) === '') {
            return '';
        }

        $html = preg_replace('/<meta\b[^>]*\bname=["\']?(title|description|keywords|robots|twitter:card|twitter:title|twitter:description|twitter:image)["\']?[^>]*>\s*/i', '', $html);
        $html = preg_replace('/<meta\b[^>]*\bproperty=["\']?(og:type|og:url|og:title|og:description|og:image|og:site_name)["\']?[^>]*>\s*/i', '', $html);
        $html = preg_replace('/<link\b[^>]*\brel=["\']?canonical["\']?[^>]*>\s*/i', '', $html);

        return trim($html);
    }
}

if (!function_exists('rb_auto_board_seo_meta')) {
    function rb_auto_board_seo_meta()
    {
        global $bo_table, $wr_id, $write, $board, $config;

        if (empty($bo_table) || empty($wr_id) || empty($write['wr_id']) || !empty($write['wr_is_comment'])) {
            return null;
        }

        $title = rb_auto_seo_plain_text($write['wr_subject']);
        $category = !empty($write['ca_name']) ? rb_auto_seo_plain_text($write['ca_name']) : '';
        $content = isset($write['wr_content']) ? $write['wr_content'] : '';
        $description = rb_auto_seo_excerpt($content, 155);

        if ($description === '') {
            $description = $title;
        }

        $canonical = function_exists('get_pretty_url')
            ? get_pretty_url($bo_table, $wr_id)
            : G5_BBS_URL . '/board.php?bo_table=' . urlencode($bo_table) . '&wr_id=' . (int) $wr_id;

        $site_name = !empty($config['cf_title']) ? $config['cf_title'] : '';
        $image = rb_auto_seo_first_image($bo_table, $wr_id, $content);

        return array(
            'title' => $title,
            'description' => $description,
            'keywords' => rb_auto_seo_keywords($title, $category, $content),
            'canonical' => rb_auto_seo_abs_url($canonical),
            'image' => $image,
            'site_name' => $site_name,
        );
    }
}
?>
