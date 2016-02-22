<?php

namespace AppBundle\Services;

use Symfony\Component\Templating\EngineInterface;

class PixelTrackingService
{
    /**
     * Array containing pixels defined in the app/config/offer/pixel_tracking.yml file.
     *
     *  $pixels['provider_name.pixel_name'] = [
     *      'template' => 'provider.pixel.html.twig',
     *      'variables' => [
     *          'variable_name' => [
     *              'options' => [],
     *              'default' => '',
     *              'value' => null,
     *              'required' => true | false,
     *          ]
     *      ]
     *  ]
     *
     * @var array $pixels
     */
    private $pixels;

    /**
     * @var EngineInterface $twig
     */
    private $twig;

    public function __construct(array $pixels, EngineInterface $twig)
    {
        $this->pixels = $this->initPixelArray($pixels);
        $this->twig = $twig;
    }

    /**
     * Reforms configurations variables into a cleaner array and sets their values to their
     * default configured values.
     *
     * @param $pixelConfigArray
     * @return array
     */
    private function initPixelArray($pixelConfigArray)
    {
        $newPixels = array();
        foreach($pixelConfigArray as $providerName => $pixels) {
            foreach($pixels as $pixelName => $pixelConfig) {
                $pixelName = $providerName.".".$pixelName;
                $pixelTemplate = isset($pixelConfig['template'])
                    ? $pixelConfig['template']
                    : $pixelName.".html.twig";
                $newVariables = [];

                foreach($pixelConfig['variables'] as $key => $variableOptions) {
                    $variable = [
                        'options' => isset($variableOptions['options'])
                            ? $variableOptions['options']
                            : null,
                        'default' => isset($variableOptions['default'])
                            ? $variableOptions['default']
                            : null,
                        'value' => isset($variableOptions['default'])
                            ? $variableOptions['default']
                            : null,
                        'required' => isset($variableOptions['required'])
                            ? $variableOptions['required']
                            : null,
                    ];
                    $newVariables[$key] = $variable;
                }

                $newPixels[$pixelName]['template'] = $pixelTemplate;
                $newPixels[$pixelName]['variables'] = $newVariables;
            }
        }

        return $newPixels;
    }

    public function getPixels()
    {
        return $this->pixels;
    }

    public function renderPixel($pixelName, $pixelVariables = array())
    {

    }

    public function setPixelVariable($pixelName, $variableName, $newValue)
    {

    }

    /**
     * Updates pixel variable values with new values passed in array. Any variables
     * not specified in $newValues array are left untouched.
     *
     * @param string $pixelName
     * @param array $newValues
     */
    public function setPixelVariables($pixelName, array $newValues)
    {

    }
}
