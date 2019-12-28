<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var int random color hue integer
     */
    private $hue;

    public function __construct()
    {
        $this->hue = random_int(0, 360);
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('darkColor', [$this, 'darkColor']),
            new TwigFunction('lightColor', [$this, 'lightColor']),
            new TwigFunction('hue', [$this, 'hue']),
        ];
    }

    public function darkColor(float $alpha = 1)
    {
        return "hsla($this->hue, 20%, 45%, $alpha)";
    }

    public function lightColor(float $alpha = 1)
    {
        return "hsla($this->hue, 20%, 95%, $alpha)";
    }

    public function hue()
    {
        return $this->hue;
    }
}
