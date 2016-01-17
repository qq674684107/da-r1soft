<?php

namespace DirectAdmin\R1Soft\Lib\Utility;

/**
 * Class StorageTrait
 *
 * @method string getStoragePath
 *
 * @package DirectAdmin\R1Soft\Lib\Utility
 */
trait StorageTrait {

    /**
     * Write to the storage, always overwrites files
     *
     * @param $fileName
     * @param $content
     */
    public function writeToStorage($fileName, $content) {
        $path = $this->getStoragePath();

        if (!file_exists($path)) {
            mkdir($path);
        }

        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }

    /**
     * Get from storage
     *
     * @param $fileName
     *
     * @return string
     */
    public function getFromStorage($fileName) {
        return file_get_contents($this->getStoragePath() . DIRECTORY_SEPARATOR . $fileName);
    }

    /**
     * Check if a file or folder exists
     *
     * @param $fileName
     *
     * @return string
     */
    public function existsInStorage($fileName) {
        return file_exists($this->getStoragePath() . DIRECTORY_SEPARATOR . $fileName);
    }

    /**
     * Remove the storage
     *
     * @return bool
     */
    public function clearStorage($path = null) {
        if ($path == null) {
            $path = $this->getStoragePath();
        }

        foreach(scandir($path) as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            if (is_dir($path . DIRECTORY_SEPARATOR . $file)) {
                $this->clearStorage($path . DIRECTORY_SEPARATOR . $file);
            } else {
                unlink($path . DIRECTORY_SEPARATOR . $file);
            }
        }

        rmdir($path);
    }
}