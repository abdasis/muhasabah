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

//breadcrumbs untuk login
Breadcrumbs::for('login', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Login', route('login'));
});

//bradcurmbs untuk chart of account
Breadcrumbs::for('chart-of-account.index', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Daftar Akun', route('chart-of-account.index'));
});

Breadcrumbs::for('chart-of-account.create', function (BreadcrumbTrail $trail){
    $trail->parent('chart-of-account.index');
    $trail->push('Tambah Akun Baru', route('chart-of-account.create'));
});

Breadcrumbs::for('chart-of-account.edit', function (BreadcrumbTrail $trail, $id){
    $trail->parent('chart-of-account.index');
    $trail->push('Sunting Akun', route('chart-of-account.edit', $id));
});

Breadcrumbs::for('chart-of-account.show', function (BreadcrumbTrail $trail, $id){
    $trail->parent('chart-of-account.index');
    $trail->push('Detail Akun', route('chart-of-account.show', $id));
});

//breadcrumbs untuk product
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Daftar Produk', route('products.index'));
});

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail){
    $trail->parent('products.index');
    $trail->push('Tambah Produk', route('products.create'));
});

Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $id){
    $trail->parent('products.index');
    $trail->push('Detail Produk', route('products.show', $id));
});

Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail, $id){
    $trail->parent('products.index');
    $trail->push('Sunting Produk', route('products.edit', $id));
});

