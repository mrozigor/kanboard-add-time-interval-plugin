<?php

namespace Kanboard\Plugin\TaskIntervalButton;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->projectAccessMap->add('TaskIntervalController', array("confirm", "addInterval"), Role::PROJECT_MEMBER);
        $this->template->hook->attach('template:task:sidebar:actions', 'TaskIntervalButton:task_add_interval/add_interval_button');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'Task Interval Button';
    }

    public function getPluginDescription()
    {
        return t('Simple plugins which adds button to incrementally change time spent on task.');
    }

    public function getPluginAuthor()
    {
        return 'Igor Mroz';
    }

    public function getPluginVersion()
    {
        return '0.9.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/mrozigor/kanboard-add-time-interval-plugin';
    }
}

