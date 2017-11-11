<div class="page-header">
    <h2><?= t('Add interval') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to add interval (30 minutes) to this task: "%s"?', $this->text->e($task['title'])) ?>
    </p>

    <?= $this->modal->confirmButtons(
        'TaskIntervalController',
        'addInterval',
        array('plugin' => 'TaskIntervalButton', 'task_id' => $task['id'], 'project_id' => $task['project_id'])
    ) ?>
</div>