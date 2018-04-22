<?php namespace Jc91715\Youzan;

use Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;
use jc91715\Youzan\Models\Settings;

/**
 * youzan Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'youzan',
            'description' => 'No description provided yet...',
            'author'      => 'jc91715',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('youzan',function (){
            return new \Hanson\Youzan\Youzan([
                'client_id' => Settings::get('app_id'),
                'client_secret' => Settings::get('app_secret'),
                'type' => \Hanson\Youzan\Youzan::PERSONAL, // 自用型应用
                'debug' => true, // 调试模式
                'kdt_id' => Settings::get('kdt_id'), // 店铺ID
                'log' => [
                    'name' => 'youzan',
                    'file' => __DIR__.'/youzan.log',
                    'level'      => 'debug',
                    'permission' => 0777,
                ]
            ]);

        });

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Jc91715\Youzan\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'jc91715.youzan.some_permission' => [
                'tab' => 'youzan',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'youzan' => [
                'label'       => 'youzan',
                'url'         => Backend::url('jc91715/youzan/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['jc91715.youzan.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'location' => [
                'label'       => '有赞云',
                'description' => '有赞云自建型应用配置.',
                'category'    => SettingsManager::CATEGORY_SYSTEM,
                'icon'        => 'icon-globe',
                'class'       => 'Jc91715\Youzan\Models\Settings',
                'order'       => 500,
                'keywords'    => '有赞'
            ]
        ];
    }
}
