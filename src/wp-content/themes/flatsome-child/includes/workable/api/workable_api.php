<?php

use GuzzleHttp\Client;

function get_workable_jobs_epos()
{
    $encrypted_key = get_workable_api_key();
    $client = new Client([
        'base_uri' => 'https://www.workable.com/',
        'headers' => [
            'Authorization' => 'Bearer ' . $encrypted_key,
            'Accept' => 'application/json',
        ],
    ]);

    try {
        $response = $client->get('api/accounts/' . WORKABLE_SUBDOMAIN . '');
        $data = json_decode($response->getBody(), true);
        return $data['jobs'] ?? [];
    } catch (Exception $e) {
        error_log('Workable API (epos) error: ' . $e->getMessage());
        return [];
    }
}
function get_workable_location_epos()
{
    $encrypted_key = get_workable_api_key();
    $client = new Client([
        'base_uri' => 'https://www.workable.com/',
        'headers' => [
            'Authorization' => 'Bearer ' . $encrypted_key,
            'Accept' => 'application/json',
        ],
    ]);

    try {
        $response = $client->get('api/accounts/' . WORKABLE_SUBDOMAIN . '/locations');
        $data = json_decode($response->getBody(), true);
        if (is_array($data)) {
            return $data;
        }
    } catch (Exception $e) {
        error_log('Workable API (epos) error: ' . $e->getMessage());
        return [];
    }
}
