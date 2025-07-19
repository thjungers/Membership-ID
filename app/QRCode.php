<?php

namespace App;

class QRCode
{
    /**
     * Generate a QR code that points to the given URL
     * 
     * @param url: The URL to redirect to
     */
    static function generate_url($url)
    {
        $options = new \chillerlan\QRCode\QROptions;
        $options->outputType = \chillerlan\QRCode\Output\QROutputInterface::IMAGICK;
        $options->outputBase64 = false;
        $options->addQuietzone = false;

        $qrcode = (new \chillerlan\QRCode\QRCode($options))->render($url);
        return $qrcode;
    }
}
