<?php

namespace Kanboard\Plugin\TaskIntervalButton\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;

class TaskIntervalController extends BaseController
{
    public function confirm()
    {
        $task = $this->getTask();
        $user = $this->getUser();

        if ($user['username'] !== $task["assignee_username"]) {
            throw new AccessForbiddenException();
        }

        $this->response->html($this->template->render('TaskIntervalButton:task_add_interval/add_interval_confirm', array(
            'task' => $task,
            'user' => $user
        )));
    }

    public function addInterval()
    {
        $task = $this->getTask();
        $user = $this->getUser();
        $this->checkCSRFParam();

        if ($user['username'] !== $task["assignee_username"]) {
            throw new AccessForbiddenException();
        }

        $values = array('id' => $task['id'], 'time_spent' => $task['time_spent'] + 0.5);

        if ($this->taskModificationModel->update($values, false)) {
            $this->flash->success(t("Interval added."));
        } else {
            $this->flash->failure(t("Unable to add interval."));
        }

        return $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])), true);
    }
}