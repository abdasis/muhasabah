<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'text' => null,
        'cancelButtonText' => 'Batal',
        'confirmButtonText' => 'Ya!',
        'showCancelButton' => false,
        'showConfirmButton' => true,
        'customClass' => [
            'container' => '',
            'popup' => '',
            'header' => '',
            'title' => '',
            'closeButton' => '',
            'icon' => '',
            'image' => '',
            'content' => '',
            'htmlContainer' => '',
            'input' => '',
            'inputLabel' => '',
            'validationMessage' => '',
            'actions' => '',
            'confirmButton' => 'btn btn-primary btn-sm w-md',
            'denyButton' => '',
            'cancelButton' => '',
            'loader' => '',
            'footer' => ''
        ],
    ],

    'confirm' => [
        'icon' => 'warning',
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'cancelButtonText' => 'Tidak',
        'customClass' => [
            'container' => '',
            'popup' => '',
            'header' => '',
            'title' => '',
            'closeButton' => '',
            'icon' => '',
            'image' => '',
            'content' => '',
            'htmlContainer' => '',
            'input' => '',
            'inputLabel' => '',
            'validationMessage' => '',
            'actions' => '',
            'confirmButton' => 'btn btn-primary w-md',
            'denyButton' => 'btn btn-danger w-md',
            'cancelButton' => 'btn btn-danger bg-danger w-md',
            'loader' => '',
            'footer' => ''
        ],
    ],


];
