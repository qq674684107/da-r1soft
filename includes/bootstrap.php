<?php

global $_POST, $_GET;

$servers = [
    'live' => 'https://acme-v01.api.letsencrypt.org/directory',
    'staging' => 'https://acme-staging.api.letsencrypt.org/directory'
];