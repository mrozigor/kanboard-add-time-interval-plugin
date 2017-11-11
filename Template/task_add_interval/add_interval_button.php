<?php if ($task['is_active'] == 1): ?>
<li>
<?= $this->modal->confirm('clock-o', t('Add time interval'), 'TaskIntervalController', 'confirm', array('plugin' => 'TaskIntervalButton', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
</li>
<?php endif ?>