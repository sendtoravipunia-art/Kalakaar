<?php

declare(strict_types=1);

/**
 * Kalakaar code generator.
 *
 * For every entity declared in $entities below this emits a full vertical slice:
 *   Model, Repository, Service, Controller, Request, migration SQL, seeder,
 *   index/show/create/edit/_form views, a unit test, and resourceful routes.
 *
 * Run:  php scripts/scaffold.php
 * It only writes files that do not exist yet, so it is safe to re-run.
 */

define('BASE_PATH', dirname(__DIR__));

/* ----------------------------------------------------------------------------
 |  Entity definitions — the domain model of Kalakaar.
 |  field: [name, sql, null, rules, input, sample[]]
 * ------------------------------------------------------------------------- */
$entities = [
    [
        'name' => 'Category', 'table' => 'categories', 'plural' => 'categories',
        'route' => 'categories', 'title' => 'Categories', 'singular' => 'Category', 'label' => 'name',
        'fields' => [
            ['name' => 'name', 'sql' => 'VARCHAR(80)', 'null' => false, 'rules' => 'required|max:80', 'input' => 'text', 'sample' => ['Music', 'Dance', 'Acting', 'Photography', 'Painting']],
            ['name' => 'slug', 'sql' => 'VARCHAR(100)', 'null' => false, 'rules' => 'required|max:100', 'input' => 'text', 'sample' => ['music', 'dance', 'acting', 'photography', 'painting']],
            ['name' => 'icon', 'sql' => 'VARCHAR(16)', 'null' => true, 'rules' => 'max:16', 'input' => 'text', 'sample' => ['🎵', '💃', '🎭', '📷', '🎨']],
        ],
    ],
    [
        'name' => 'Skill', 'table' => 'skills', 'plural' => 'skills',
        'route' => 'skills', 'title' => 'Skills', 'singular' => 'Skill', 'label' => 'name',
        'fields' => [
            ['name' => 'name', 'sql' => 'VARCHAR(80)', 'null' => false, 'rules' => 'required|max:80', 'input' => 'text', 'sample' => ['Vocals', 'Choreography', 'Improv', 'Lighting', 'Editing']],
            ['name' => 'category_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 2, 3, 4, 5]],
        ],
    ],
    [
        'name' => 'ArtistProfile', 'table' => 'artist_profiles', 'plural' => 'artist_profiles',
        'route' => 'artist-profiles', 'title' => 'Artist Profiles', 'singular' => 'Artist Profile', 'label' => 'headline',
        'fields' => [
            ['name' => 'user_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'category_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 2, 3]],
            ['name' => 'headline', 'sql' => 'VARCHAR(140)', 'null' => false, 'rules' => 'required|max:140', 'input' => 'text', 'sample' => ['Playback singer & composer', 'Contemporary dancer', 'Theatre & film actor']],
            ['name' => 'bio', 'sql' => 'TEXT', 'null' => true, 'rules' => 'max:2000', 'input' => 'textarea', 'sample' => ['10 years on stage.', 'Trained in Kathak and contemporary.', 'NSD alumnus.']],
            ['name' => 'city', 'sql' => 'VARCHAR(80)', 'null' => true, 'rules' => 'max:80', 'input' => 'text', 'sample' => ['Mumbai', 'Delhi', 'Pune']],
            ['name' => 'hourly_rate', 'sql' => 'DECIMAL(10,2)', 'null' => true, 'rules' => 'numeric', 'input' => 'number', 'sample' => [1500, 1200, 2000]],
            ['name' => 'experience_years', 'sql' => 'INT', 'null' => true, 'rules' => 'numeric', 'input' => 'number', 'sample' => [10, 5, 8]],
            ['name' => 'available', 'sql' => 'TINYINT(1)', 'null' => false, 'rules' => 'numeric', 'input' => 'number', 'sample' => [1, 1, 0]],
        ],
    ],
    [
        'name' => 'ProducerProfile', 'table' => 'producer_profiles', 'plural' => 'producer_profiles',
        'route' => 'producer-profiles', 'title' => 'Producer Profiles', 'singular' => 'Producer Profile', 'label' => 'company',
        'fields' => [
            ['name' => 'user_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'company', 'sql' => 'VARCHAR(120)', 'null' => false, 'rules' => 'required|max:120', 'input' => 'text', 'sample' => ['Dream Films', 'StageWorks', 'Indie Beats']],
            ['name' => 'bio', 'sql' => 'TEXT', 'null' => true, 'rules' => 'max:2000', 'input' => 'textarea', 'sample' => ['Feature film house.', 'Live event producers.', 'Music label.']],
            ['name' => 'city', 'sql' => 'VARCHAR(80)', 'null' => true, 'rules' => 'max:80', 'input' => 'text', 'sample' => ['Mumbai', 'Bengaluru', 'Goa']],
            ['name' => 'website', 'sql' => 'VARCHAR(160)', 'null' => true, 'rules' => 'max:160', 'input' => 'text', 'sample' => ['dreamfilms.example', 'stageworks.example', 'indiebeats.example']],
        ],
    ],
    [
        'name' => 'PortfolioItem', 'table' => 'portfolio_items', 'plural' => 'portfolio_items',
        'route' => 'portfolio', 'title' => 'Portfolio', 'singular' => 'Portfolio Item', 'label' => 'title',
        'fields' => [
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'title', 'sql' => 'VARCHAR(140)', 'null' => false, 'rules' => 'required|max:140', 'input' => 'text', 'sample' => ['Live at NCPA', 'Showreel 2025', 'Album cover shoot']],
            ['name' => 'media_type', 'sql' => 'VARCHAR(20)', 'null' => false, 'rules' => 'required|in:audio,video,image,link', 'input' => 'text', 'sample' => ['video', 'video', 'image']],
            ['name' => 'url', 'sql' => 'VARCHAR(255)', 'null' => false, 'rules' => 'required|max:255', 'input' => 'text', 'sample' => ['https://x.example/1', 'https://x.example/2', 'https://x.example/3']],
            ['name' => 'description', 'sql' => 'TEXT', 'null' => true, 'rules' => 'max:1000', 'input' => 'textarea', 'sample' => ['', '', '']],
        ],
    ],
    [
        'name' => 'HireRequest', 'table' => 'hire_requests', 'plural' => 'hire_requests',
        'route' => 'hire-requests', 'title' => 'Hire Requests', 'singular' => 'Hire Request', 'label' => 'title',
        'fields' => [
            ['name' => 'producer_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'title', 'sql' => 'VARCHAR(140)', 'null' => false, 'rules' => 'required|max:140', 'input' => 'text', 'sample' => ['Wedding gig', 'Short film lead', 'Studio session']],
            ['name' => 'message', 'sql' => 'TEXT', 'null' => true, 'rules' => 'max:2000', 'input' => 'textarea', 'sample' => ['Are you available?', 'Audition next week.', 'Need a vocalist.']],
            ['name' => 'budget', 'sql' => 'DECIMAL(10,2)', 'null' => true, 'rules' => 'numeric', 'input' => 'number', 'sample' => [25000, 50000, 8000]],
            ['name' => 'status', 'sql' => "VARCHAR(20)", 'null' => false, 'rules' => 'required|in:pending,accepted,declined,completed', 'input' => 'text', 'sample' => ['pending', 'accepted', 'completed']],
        ],
    ],
    [
        'name' => 'Review', 'table' => 'reviews', 'plural' => 'reviews',
        'route' => 'reviews', 'title' => 'Reviews', 'singular' => 'Review', 'label' => 'comment',
        'fields' => [
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'producer_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'rating', 'sql' => 'TINYINT', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [5, 4, 5]],
            ['name' => 'comment', 'sql' => 'TEXT', 'null' => true, 'rules' => 'max:1000', 'input' => 'textarea', 'sample' => ['Brilliant!', 'Very professional.', 'Highly recommend.']],
        ],
    ],
    [
        'name' => 'Conversation', 'table' => 'conversations', 'plural' => 'conversations',
        'route' => 'conversations', 'title' => 'Conversations', 'singular' => 'Conversation', 'label' => 'subject',
        'fields' => [
            ['name' => 'producer_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'subject', 'sql' => 'VARCHAR(140)', 'null' => true, 'rules' => 'max:140', 'input' => 'text', 'sample' => ['Project enquiry', 'Booking', 'Collaboration']],
        ],
    ],
    [
        'name' => 'Message', 'table' => 'messages', 'plural' => 'messages',
        'route' => 'messages', 'title' => 'Messages', 'singular' => 'Message', 'label' => 'body',
        'fields' => [
            ['name' => 'conversation_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'sender_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'body', 'sql' => 'TEXT', 'null' => false, 'rules' => 'required|max:2000', 'input' => 'textarea', 'sample' => ['Hi there!', 'When are you free?', 'Sounds good.']],
        ],
    ],
    [
        'name' => 'Notification', 'table' => 'notifications', 'plural' => 'notifications',
        'route' => 'notifications', 'title' => 'Notifications', 'singular' => 'Notification', 'label' => 'message',
        'fields' => [
            ['name' => 'user_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'type', 'sql' => 'VARCHAR(40)', 'null' => false, 'rules' => 'required|max:40', 'input' => 'text', 'sample' => ['hire', 'review', 'message']],
            ['name' => 'message', 'sql' => 'VARCHAR(255)', 'null' => false, 'rules' => 'required|max:255', 'input' => 'text', 'sample' => ['You have a new hire request', 'New review received', 'New message']],
        ],
    ],
    [
        'name' => 'Booking', 'table' => 'bookings', 'plural' => 'bookings',
        'route' => 'bookings', 'title' => 'Bookings', 'singular' => 'Booking', 'label' => 'status',
        'fields' => [
            ['name' => 'hire_request_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 2, 3]],
            ['name' => 'start_date', 'sql' => 'DATE', 'null' => true, 'rules' => '', 'input' => 'text', 'sample' => ['2026-07-01', '2026-07-10', '2026-08-01']],
            ['name' => 'end_date', 'sql' => 'DATE', 'null' => true, 'rules' => '', 'input' => 'text', 'sample' => ['2026-07-02', '2026-07-12', '2026-08-03']],
            ['name' => 'status', 'sql' => 'VARCHAR(20)', 'null' => false, 'rules' => 'required|in:scheduled,done,cancelled', 'input' => 'text', 'sample' => ['scheduled', 'done', 'scheduled']],
        ],
    ],
    [
        'name' => 'Tag', 'table' => 'tags', 'plural' => 'tags',
        'route' => 'tags', 'title' => 'Tags', 'singular' => 'Tag', 'label' => 'name',
        'fields' => [
            ['name' => 'name', 'sql' => 'VARCHAR(50)', 'null' => false, 'rules' => 'required|max:50', 'input' => 'text', 'sample' => ['Bollywood', 'Classical', 'Indie', 'Folk', 'Jazz']],
        ],
    ],
    [
        'name' => 'ArtistSkill', 'table' => 'artist_skills', 'plural' => 'artist_skills',
        'route' => 'artist-skills', 'title' => 'Artist Skills', 'singular' => 'Artist Skill', 'label' => 'artist_id',
        'fields' => [
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 2]],
            ['name' => 'skill_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 2, 3]],
        ],
    ],
    [
        'name' => 'SavedArtist', 'table' => 'saved_artists', 'plural' => 'saved_artists',
        'route' => 'saved-artists', 'title' => 'Saved Artists', 'singular' => 'Saved Artist', 'label' => 'producer_id',
        'fields' => [
            ['name' => 'producer_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'artist_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 2, 3]],
        ],
    ],
    [
        'name' => 'Report', 'table' => 'reports', 'plural' => 'reports',
        'route' => 'reports', 'title' => 'Reports', 'singular' => 'Report', 'label' => 'reason',
        'fields' => [
            ['name' => 'reporter_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [1, 1, 1]],
            ['name' => 'target_type', 'sql' => 'VARCHAR(40)', 'null' => false, 'rules' => 'required|max:40', 'input' => 'text', 'sample' => ['artist', 'review', 'message']],
            ['name' => 'target_id', 'sql' => 'INT UNSIGNED', 'null' => false, 'rules' => 'required|numeric', 'input' => 'number', 'sample' => [2, 3, 4]],
            ['name' => 'reason', 'sql' => 'VARCHAR(255)', 'null' => false, 'rules' => 'required|max:255', 'input' => 'text', 'sample' => ['Spam', 'Inappropriate', 'Fake profile']],
        ],
    ],
];

/* ----------------------------------------------------------------------------
 |  Helpers
 * ------------------------------------------------------------------------- */
$written = 0;
$skipped = 0;

function put(string $relative, string $contents): void
{
    global $written, $skipped;
    $path = BASE_PATH . '/' . $relative;
    if (is_file($path)) {
        $skipped++;
        return;
    }
    @mkdir(dirname($path), 0777, true);
    file_put_contents($path, $contents);
    $written++;
}

function tpl(string $template, array $vars): string
{
    return strtr($template, $vars);
}

/* ----------------------------------------------------------------------------
 |  Templates (NOWDOC so $ stays literal; placeholders are {{TOKENS}})
 * ------------------------------------------------------------------------- */
$T = require __DIR__ . '/scaffold_templates.php';

$routeLines = [];
$routeUses = [];

foreach ($entities as $e) {
    $fields = $e['fields'];
    $fieldNames = array_map(static fn ($f) => $f['name'], $fields);

    $fillable = implode(', ', array_map(static fn ($n) => "'{$n}'", $fieldNames));
    $fieldKeys = $fillable;

    $rules = [];
    foreach ($fields as $f) {
        if ($f['rules'] !== '') {
            $rules[] = "            '{$f['name']}' => '{$f['rules']}',";
        }
    }
    $rulesBlock = implode("\n", $rules);

    // Migration columns + indexes
    $cols = [];
    $indexes = [];
    foreach ($fields as $f) {
        $nullSql = $f['null'] ? 'NULL' : 'NOT NULL';
        $cols[] = "    {$f['name']} {$f['sql']} {$nullSql},";
        if (str_ends_with($f['name'], '_id')) {
            $indexes[] = ",\n    KEY idx_{$e['table']}_{$f['name']} ({$f['name']})";
        }
    }
    $columnsBlock = implode("\n", $cols);
    $indexBlock = implode('', $indexes);

    // Seeder rows
    $count = 0;
    foreach ($fields as $f) {
        $count = max($count, count($f['sample']));
    }
    $count = max($count, 1);
    $rows = [];
    for ($i = 0; $i < $count; $i++) {
        $row = [];
        foreach ($fields as $f) {
            $samples = $f['sample'];
            $row[$f['name']] = $samples[$i % max(count($samples), 1)] ?? '';
        }
        $rows[] = $row;
    }
    $rowsExport = var_export($rows, true);

    // Form fields HTML
    $formFields = [];
    foreach ($fields as $f) {
        $label = ucwords(str_replace('_', ' ', $f['name']));
        if ($f['input'] === 'textarea') {
            $formFields[] = "        <div class=\"field\">\n            <label for=\"{$f['name']}\">{$label}</label>\n            <textarea id=\"{$f['name']}\" name=\"{$f['name']}\"><?= e((string) (\$item?->{$f['name']} ?? old('{$f['name']}'))) ?></textarea>\n        </div>";
        } else {
            $formFields[] = "        <div class=\"field\">\n            <label for=\"{$f['name']}\">{$label}</label>\n            <input type=\"{$f['input']}\" id=\"{$f['name']}\" name=\"{$f['name']}\" value=\"<?= e((string) (\$item?->{$f['name']} ?? old('{$f['name']}'))) ?>\">\n        </div>";
        }
    }
    $formFieldsBlock = implode("\n", $formFields);

    $vars = [
        '{{NAME}}'            => $e['name'],
        '{{TABLE}}'           => $e['table'],
        '{{PLURAL}}'          => $e['plural'],
        '{{ROUTE}}'           => $e['route'],
        '{{TITLE}}'           => $e['title'],
        '{{SINGULAR}}'        => $e['singular'],
        '{{LABEL}}'           => $e['label'],
        '{{FILLABLE}}'        => $fillable,
        '{{FIELD_KEYS}}'      => $fieldKeys,
        '{{RULES}}'           => $rulesBlock,
        '{{COLUMNS}}'         => $columnsBlock,
        '{{INDEXES}}'         => $indexBlock,
        '{{ROWS}}'            => $rowsExport,
        '{{FORM_FIELDS}}'     => $formFieldsBlock,
    ];

    put("app/Models/{$e['name']}.php", tpl($T['model'], $vars));
    put("app/Repositories/{$e['name']}Repository.php", tpl($T['repository'], $vars));
    put("app/Services/{$e['name']}Service.php", tpl($T['service'], $vars));
    put("app/Controllers/{$e['name']}Controller.php", tpl($T['controller'], $vars));
    put("app/Requests/{$e['name']}Request.php", tpl($T['request'], $vars));
    put("resources/views/{$e['plural']}/index.php", tpl($T['view_index'], $vars));
    put("resources/views/{$e['plural']}/show.php", tpl($T['view_show'], $vars));
    put("resources/views/{$e['plural']}/_form.php", tpl($T['view_form'], $vars));
    put("resources/views/{$e['plural']}/create.php", tpl($T['view_create'], $vars));
    put("resources/views/{$e['plural']}/edit.php", tpl($T['view_edit'], $vars));
    put("database/seeders/{$e['name']}Seeder.php", tpl($T['seeder'], $vars));
    put("tests/Unit/{$e['name']}Test.php", tpl($T['test'], $vars));

    $seq = str_pad((string) (array_search($e, $entities, true) + 2), 3, '0', STR_PAD_LEFT);
    put("database/migrations/{$seq}_create_{$e['table']}_table.sql", tpl($T['migration'], $vars));

    $routeUses[] = "use App\\Controllers\\{$e['name']}Controller;";
    $routeLines[] = tpl($T['routes'], $vars);
}

// Resourceful routes file
$routesContent = "<?php\n\ndeclare(strict_types=1);\n\nuse App\\Core\\Router;\nuse App\\Middleware\\AuthMiddleware;\n"
    . implode("\n", $routeUses)
    . "\n\n/** @var Router \$router */\n\n"
    . implode("\n", $routeLines)
    . "\n";
$rp = BASE_PATH . '/routes/resources.php';
if (!is_file($rp)) {
    file_put_contents($rp, $routesContent);
    $written++;
} else {
    $skipped++;
}

echo "Scaffold complete. Written: {$written}, skipped (existing): {$skipped}.\n";
