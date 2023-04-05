<?php

namespace Hametuha\HamePub\Parser;

/**
 * Parse setting JSON file and ensure it has all required keys.
 */
trait SettingParser
{
    /**
     * Get setting from file.
     *
     * @param string $file_path Path to setting file.
     * @return array
     * @throws \Exception
     */
    public function getSettingFromFile($file_path = './setting.json')
    {
        if (! file_exists($file_path)) {
            throw new \Exception('Setting file not found.');
        }
        $setting = json_decode(file_get_contents($file_path), true);
        if (! is_array($setting)) {
            throw new \Exception('Setting file is not valid JSON.');
        }
        $setting = array_replace_recursive($this->defaultSetting(), $setting);
        // Validate if isbn is not set.
        if (empty($setting['id'])) {
            throw new \Exception('id fields must not be empty: ' . $setting['id']);
        }
        // Validate if published is not set.
        if (! preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z$/u', $setting['published' ])) {
            throw new \Exception('published field is malformed. Should be GMT in ISO8601 e.g. "2000-01-01T00:00:00Z": ' . $setting['published']);
        }
        // Validate if author is set.
        if (empty($setting['author'])) {
            throw new \Exception('At least 1 author should be set.');
        }
        return $setting;
    }

    /**
     * Default setting.
     *
     * @return array
     */
    public function defaultSetting()
    {
        return [
            'lang'      => 'en',
            'id'        => '',
            'isbn'      => '',
            'title'     => '',
            'author'    => '',
            'published' => '',
            'root'      => './dist/',
            'header'    => [
                'max_level' => 3,
                'depth'     => 2,
            ],
            'toc'       => 'Table of Contents',
            'url_base'  => '#\./#u',
            'target'    => './tmp',
            'direction' => 'default',
            'hidden'    => [ 'toc' ],
            'cover'     => '',
        ];
    }
}
