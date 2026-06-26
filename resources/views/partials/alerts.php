<?php
use App\Core\Session;

$errors  = Session::flashGet('_errors', []);
$success = Session::flashGet('_success');
?>
<?php if ($success): ?>
    <div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-error">
        <ul>
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ((array) $fieldErrors as $message): ?>
                    <li><?= e($message) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
