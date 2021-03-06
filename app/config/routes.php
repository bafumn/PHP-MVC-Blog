<?php
return [
    // article
    'post/(?P<id>[0-9]+)' => ['controller' => 'post', 'action' => 'view'],
    'articles/(?P<page>[0-9]+)' => ['controller' => 'post', 'action' => 'index'],
    'articles' => ['controller' => 'post', 'action' => 'index'],
    // category
    'category/(?P<name>[a-z]+|[0-9]+)' => ['controller' => 'category', 'action' => 'view'],
    'category/(?P<name>[a-z]+|[0-9]+)/(?P<page>[0-9]+)' => ['controller' => 'category', 'action' => 'view'],
    'categories' => ['controller' => 'category','action' => 'index'],
    // article control
    'admin/post/add' => ['controller' => 'post', 'action' => 'add', 'prefix' => 'admin'],
    'admin/post/edit/(?P<id>[0-9]+)' => ['controller' => 'post', 'action' => 'edit', 'prefix' => 'admin'],
    'admin/post/delete/(?P<id>[0-9]+)' => ['controller' => 'post', 'action' => 'delete', 'prefix' => 'admin'],
    'admin/posts/(?P<page>[0-9]+)' => ['controller' => 'post', 'action' => 'index', 'prefix' => 'admin'],
    'admin/posts' => ['controller' => 'post', 'action' => 'index', 'prefix' => 'admin'],
    // category control
    'admin/category/add' => ['controller' => 'category', 'action' => 'add', 'prefix' => 'admin'],
    'admin/category/edit/(?P<id>[0-9]+)' => ['controller' => 'category', 'action' => 'edit', 'prefix' => 'admin'],
    'admin/category/delete/(?P<id>[0-9]+)' => ['controller' => 'category', 'action' => 'delete', 'prefix' => 'admin'],
    'admin/categories' => ['controller' => 'category', 'action' => 'index', 'prefix' => 'admin'],
    // user control
    'admin/user/add' => ['controller' => 'user', 'action' => 'add', 'prefix' => 'admin'],
    'admin/user/edit/(?P<id>[0-9]+)' => ['controller' => 'user', 'action' => 'edit', 'prefix' => 'admin'],
    'admin/user/delete/(?P<id>[0-9]+)' => ['controller' => 'user', 'action' => 'delete', 'prefix' => 'admin'],
    'admin/profile/(?P<id>[0-9]+)' => ['controller' => 'user', 'action' => 'profile', 'prefix' => 'admin'],
    'admin/login' => ['controller' => 'user', 'action' => 'login', 'prefix' => 'admin'],
    'admin/logout' => ['controller' => 'user', 'action' => 'logout', 'prefix' => 'admin'],
    // admin panel
    'admin' => ['controller' => 'main', 'action' => 'index', 'prefix' => 'admin'],
    // main part
    'about' => ['controller' => 'main', 'action' => 'about'],
    'contact' => ['controller' => 'main', 'action' => 'contact'],
    '' => ['controller' => 'main', 'action' => 'index'],
];