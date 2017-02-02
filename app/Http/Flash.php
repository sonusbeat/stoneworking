<?php

namespace Stoneworking\Http;

class Flash
{
    /**
     * Set a flash message to session variable
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @param string $level The message type: 'info', 'success', 'warning', 'error'
     * @return void
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title'   => $title,
            'message' => $message,
            'level'   => $level
        ]);
    }

    /**
     * Set the message
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @return void
     */
    public function message($title, $message)
    {
       return $this->create($title, $message, 'info');
    }

    /**
     * Set the success message
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @return void
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * Set the warning message
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @return void
     */
    public function warning($title, $message)
    {
        return $this->create($title, $message, 'warning');
    }

    /**
     * Set the error message
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @return void
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * Set the overlay message
     *
     * @param string $title The title of the message
     * @param string $message The content of the message
     * @param string $level Example: 'info', 'success', 'warning', 'error'
     * @return void
     */
    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }
}