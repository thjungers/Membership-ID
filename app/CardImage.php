<?php

namespace App;

class CardImage
{
    // Properties defined to place elements at the correct place of the card template
    const QRCODE_SIZE = 170;
    const QRCODE_X = 408;
    const QRCODE_Y = 195;

    const NAME_MAX_WIDTH = 330;
    const NAME_BASE_SIZE = 32;
    const NAME_MIN_SIZE = 24;
    const NAME_X = 159; // From center because of GRAVITY_CENTER
    const NAME_Y = -67;

    const SEASON_SIZE = 28;
    const SEASON_X = 160;
    const SEASON_Y = -116;
    
    /**
     * Generate an image of the member card
     * 
     * @param member: The member to generate the card for
     * @param season: The season to generate the card for
     */
    static function generate($member, $season)
    {
        // Generate QR code
        $url = route('card.show', ['member' => $member]);
        $qrcode_bin = QRCode::generate_url($url);
        $qrcode = new \Imagick;
        $qrcode->readImageBlob($qrcode_bin);

        // Load the (empty) image template
        $template = new \Imagick(resource_path("card_template.png"));

        // Add the QR code
        $qrcode->scaleImage(self::QRCODE_SIZE, self::QRCODE_SIZE);
        $template->compositeImage(
            $qrcode,
            \Imagick::COMPOSITE_DEFAULT,
            self::QRCODE_X,
            self::QRCODE_Y
        );

        // Add the name of the member
        $settings = new \ImagickDraw;
        $settings->setFont(resource_path("fonts/Kallisto-Bold.otf"));
        $settings->setFontSize(self::NAME_BASE_SIZE);
        $settings->setGravity(\Imagick::GRAVITY_CENTER);

        $name_one_line = $member->first_name ." ". $member->last_name;
        $name_two_lines = $member->first_name ."\n". $member->last_name;
        $name = $name_one_line;

        // Check if the name needs to be resized
        $baseFontMetrics = $template->queryFontMetrics($settings, $name_one_line);
        if($baseFontMetrics["textWidth"] > self::NAME_MAX_WIDTH) {
            // Compute the required new font size
            $currentToDesiredRatio = $baseFontMetrics["textWidth"] / self::NAME_MAX_WIDTH;
            $newFontSize = self::NAME_BASE_SIZE / $currentToDesiredRatio;

            // Check if the new size is big enough
            if($newFontSize < self::NAME_MIN_SIZE) {
                // Display on two lines
                $name = $name_two_lines;

                $baseFontMetrics = $template->queryFontMetrics($settings, $name_two_lines);
                $currentToDesiredRatio = $baseFontMetrics["textWidth"] / self::NAME_MAX_WIDTH;
                $newFontSize = self::NAME_BASE_SIZE / $currentToDesiredRatio;
            }

            $settings->setFontSize($newFontSize);
        }
        $template->annotateImage(
            $settings,
            self::NAME_X,
            self::NAME_Y,
            0,
            $name
        );

        // Add the season
        $settings = new \ImagickDraw;
        $settings->setFont(resource_path("fonts/Kallisto-Medium-Italic.otf"));
        $settings->setFontSize(self::SEASON_SIZE);
        $settings->setGravity(\Imagick::GRAVITY_CENTER);
        $template->annotateImage(
            $settings,
            self::SEASON_X,
            self::SEASON_Y,
            0,
            "saison ". $season
        );

        // Save to file
        $path = self::getPath($member);
        $template->writeImage(public_path($path));

        $template->destroy();
        $qrcode->destroy();

        return $path;
    }

    /**
     * Get the path to the card for a given member
     * 
     * @param member: The member to get the card path for
     */
    static public function getPath($member)
    {
        return "/cards/". $member->qr_key .".pdf";
    }
}
