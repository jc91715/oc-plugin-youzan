<?php namespace Jc91715\Youzan\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'jc91715_youzan_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
