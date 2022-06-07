<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

//Contact
Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Semua Contact', route('contact.index'));
});

Breadcrumbs::for('contact.create', function (BreadcrumbTrail $trail){
    $trail->parent('contact.index');
    $trail->push('Tambah Contact', route('contact.create'));
});

Breadcrumbs::for('contact.edit', function (BreadcrumbTrail $trail, $id){
    $trail->parent('contact.index');
    $trail->push('Sunting Contact', route('contact.edit', $id));
});

Breadcrumbs::for('contact.show', function (BreadcrumbTrail $trail, $id){
    $trail->parent('contact.index');
    $trail->push('Detail Contact', route('contact.show', $id));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Login', route('login'));
});
