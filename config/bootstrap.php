<?php
use Cake\Core\Configure;
use Cake\Core\Plugin;

require ROOT . DS . 'plugins' . DS . 'Restful' . DS . 'vendor' . DS . "autoload.php";
//a little hack to add plugins of plugin to the plugin array.
$pluginsOfPlugin = include ROOT . DS . 'plugins' . DS . 'Restful' . DS . 'vendor' . DS . 'restful-plugins.php';
$appPlguins = Configure::read(['plugins']);
$allPlugins = array_merge($appPlguins, $pluginsOfPlugin['plugins']);

Configure::write(['plugins' => $allPlugins]);

Plugin::load('Crud');
Plugin::load('ADmad/JwtAuth');
