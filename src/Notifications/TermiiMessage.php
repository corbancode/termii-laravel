<?php

namespace Corbancode\TermiiLaravel\Notifications;

class TermiiMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * The sender ID.
     *
     * @var string
     */
    public $from;

    /**
     * The channel to use.
     *
     * @var string
     */
    public $channel;

    /**
     * The media for whatsapp messages.
     *
     * @var array
     */
    public $media;

    /**
     * @param  string $content
     *
     * @return static
     */
    public static function create($content = '')
    {
        return new static($content);
    }

    /**
     * @param  string  $content
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param string $content
     *
     * @return $this
     */
    public function content(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the sender ID the message should be sent from.
     *
     * @param string $from
     *
     * @return $this
     */
    public function from(string $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set the channel the message should be sent through.
     *
     * @param string $channel
     *
     * @return $this
     */
    public function channel(string $channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Set the medi for the message. Works only for whatsapp channels
     *
     * @param array $media
     *
     * @return $this
     */
    public function media(?array $media)
    {
        $this->media = $media;

        return $this;
    }
}
