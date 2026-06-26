<?php

declare(strict_types=1);

/**
 * Templates for scaffold.php. NOWDOC keeps $ and <?php literal; {{TOKENS}}
 * are replaced by the generator with strtr().
 */

return [

'model' => <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class {{NAME}} extends Model
{
    protected string $table = '{{TABLE}}';

    protected array $fillable = [{{FILLABLE}}];
}

PHP,

'repository' => <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\{{NAME}};

final class {{NAME}}Repository extends Repository
{
    protected string $table = '{{TABLE}}';
    protected string $model = {{NAME}}::class;
}

PHP,

'service' => <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Model;
use App\Repositories\{{NAME}}Repository;

final class {{NAME}}Service
{
    public function __construct(
        private readonly {{NAME}}Repository $repository = new {{NAME}}Repository(),
    ) {
    }

    /** @return array<int, Model> */
    public function all(): array
    {
        return $this->repository->all();
    }

    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function count(): int
    {
        return $this->repository->count();
    }
}

PHP,

'controller' => <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\{{NAME}}Request;
use App\Services\{{NAME}}Service;

final class {{NAME}}Controller extends Controller
{
    public function __construct(
        private readonly {{NAME}}Service $service = new {{NAME}}Service(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('{{PLURAL}}.index', [
            'title' => '{{TITLE}}',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, '{{SINGULAR}} not found');
        }
        return $this->view('{{PLURAL}}.show', ['title' => '{{SINGULAR}}', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('{{PLURAL}}.create', ['title' => 'New {{SINGULAR}}']);
    }

    public function store(Request $request): string
    {
        $data = $request->only([{{FIELD_KEYS}}]);
        $validator = {{NAME}}Request::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/{{ROUTE}}/create');
        }
        $this->service->create($data);
        Session::flash('_success', '{{SINGULAR}} created.');
        return $this->redirect('/{{ROUTE}}');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, '{{SINGULAR}} not found');
        }
        return $this->view('{{PLURAL}}.edit', ['title' => 'Edit {{SINGULAR}}', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only([{{FIELD_KEYS}}]);
        $validator = {{NAME}}Request::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/{{ROUTE}}/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', '{{SINGULAR}} updated.');
        return $this->redirect('/{{ROUTE}}');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', '{{SINGULAR}} deleted.');
        return $this->redirect('/{{ROUTE}}');
    }
}

PHP,

'request' => <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Requests;

use App\Core\Validator;

final class {{NAME}}Request
{
    public static function rules(): array
    {
        return [
{{RULES}}
        ];
    }

    public static function validate(array $data): Validator
    {
        return Validator::make($data, self::rules());
    }
}

PHP,

'migration' => <<<'SQL'
-- {{TITLE}}
CREATE TABLE IF NOT EXISTS {{TABLE}} (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
{{COLUMNS}}
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id){{INDEXES}}
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SQL,

'seeder' => <<<'PHP'
<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Seeder;

final class {{NAME}}Seeder extends Seeder
{
    public function run(): void
    {
        $rows = {{ROWS}};

        foreach ($rows as $row) {
            $this->insert('{{TABLE}}', $row);
        }
    }
}

PHP,

'test' => <<<'PHP'
<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\{{NAME}};

final class {{NAME}}Test extends TestCase
{
    public function run(): void
    {
        $model = new {{NAME}}(['{{LABEL}}' => 'sample']);

        $this->assertEquals('{{TABLE}}', $model->getTable());
        $this->assertEquals('sample', (string) $model->{{LABEL}});
        $this->assertTrue(in_array('{{LABEL}}', $model->getFillable(), true));
    }
}

PHP,

'view_index' => <<<'PHP'
<?php /** @var array $items */ ?>
<section class="container" style="padding:30px 0">
    <?= partial('partials.alerts') ?>
    <div style="display:flex;justify-content:space-between;align-items:center;gap:16px">
        <h1>{{TITLE}}</h1>
        <a class="btn btn-primary btn-sm" href="/{{ROUTE}}/create">New {{SINGULAR}}</a>
    </div>
    <?php if (empty($items)): ?>
        <p class="muted" style="margin-top:18px">Nothing here yet.</p>
    <?php else: ?>
        <div class="artist-grid">
            <?php foreach ($items as $item): ?>
                <div class="artist-card">
                    <h3><?= e((string) ($item->{{LABEL}} ?? ('#' . $item->id))) ?></h3>
                    <a class="btn btn-ghost btn-sm" href="/{{ROUTE}}/<?= e((string) $item->id) ?>">View</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

PHP,

'view_show' => <<<'PHP'
<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <p><a href="/{{ROUTE}}">&larr; Back to {{TITLE}}</a></p>
    <h1><?= e((string) ($item->{{LABEL}} ?? ('#' . $item->id))) ?></h1>
    <div class="card">
        <?php foreach ($item->toArray() as $key => $value): ?>
            <p><strong><?= e((string) $key) ?>:</strong> <?= e((string) $value) ?></p>
        <?php endforeach; ?>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px">
        <a class="btn btn-ghost btn-sm" href="/{{ROUTE}}/<?= e((string) $item->id) ?>/edit">Edit</a>
        <form action="/{{ROUTE}}/<?= e((string) $item->id) ?>/delete" method="post" onsubmit="return confirm('Delete this {{SINGULAR}}?')">
            <?= csrf_field() ?>
            <button class="btn btn-ghost btn-sm" type="submit">Delete</button>
        </form>
    </div>
</section>

PHP,

'view_form' => <<<'PHP'
<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
{{FORM_FIELDS}}

PHP,

'view_create' => <<<'PHP'
<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New {{SINGULAR}}</h1>
        <?= partial('partials.alerts') ?>
        <form action="/{{ROUTE}}" method="post">
            <?= csrf_field() ?>
            <?= partial('{{PLURAL}}._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>

PHP,

'view_edit' => <<<'PHP'
<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>Edit {{SINGULAR}}</h1>
        <?= partial('partials.alerts') ?>
        <form action="/{{ROUTE}}/<?= e((string) $item->id) ?>/update" method="post">
            <?= csrf_field() ?>
            <?= partial('{{PLURAL}}._form', ['item' => $item]) ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Update</button>
        </form>
    </div>
</section>

PHP,

'routes' => <<<'PHP'
$router->get('/{{ROUTE}}', [{{NAME}}Controller::class, 'index']);
$router->get('/{{ROUTE}}/create', [{{NAME}}Controller::class, 'create'], [AuthMiddleware::class]);
$router->post('/{{ROUTE}}', [{{NAME}}Controller::class, 'store'], [AuthMiddleware::class]);
$router->get('/{{ROUTE}}/{id}', [{{NAME}}Controller::class, 'show']);
$router->get('/{{ROUTE}}/{id}/edit', [{{NAME}}Controller::class, 'edit'], [AuthMiddleware::class]);
$router->post('/{{ROUTE}}/{id}/update', [{{NAME}}Controller::class, 'update'], [AuthMiddleware::class]);
$router->post('/{{ROUTE}}/{id}/delete', [{{NAME}}Controller::class, 'destroy'], [AuthMiddleware::class]);

PHP,

];
