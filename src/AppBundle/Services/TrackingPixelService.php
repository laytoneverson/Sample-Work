<?php

namespace AppBundle\Services;

use AppBundle\Model\PixelModel;
use Symfony\Component\Templating\EngineInterface;

class TrackingPixelService
{
    /**
     * Array containing pixels defined in the app/config/offer/pixel_tracking.yml file.
     *
     * @var array $pixels
     */
    private $applicationPixels;

    /**
     * @var EngineInterface $twig
     */
    private $twig;

    public function __construct(array $pixelConfig, EngineInterface $twig)
    {
        $this->applicationPixels = $this->initPixelConfiguration($pixelConfig);
        $this->twig = $twig;
    }

    /**
     * Reforms configurations variables into a cleaner array and sets their values to their
     * default configured values.
     *
     * @param $pixelConfigArray
     * @return array
     */
    private function initPixelConfiguration($pixelConfigArray)
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

    /**
     * Get html markup of a pixel rendered with values passed through the $pixelVariables
     * array.
     *
     * @param string $pixelName
     * @param array $pixelVariables
     * @return string
     */
    public function renderPixel($pixelName, $pixelVariables = array())
    {
        $pixelMarkup = '';

        return $pixelMarkup;
    }

    /**
     * Create and decorate a tracking pixel to prepare it for rendering.
     *
     * @param $pixelName
     * @param array $configValues
     * @return PixelModel
     */
    public function decoratePixel($pixelName, array $configValues)
    {
        if(empty($pixelConfig = $this->applicationPixels[$pixelName])) {
            throw new \RuntimeException("Pixel configuration not found");
        }

        $pixel = new PixelModel();
        $pixel->setPixelTemplate($pixelConfig['template']);
        $pixel->setPixelName($pixelName);

        foreach ($pixelConfig['variables'] as $variableName => $variableConfig) {
            if (isset($configValues[$variableName])) {
                if (
                    isset($variableConfig['options'])
                    && count($variableConfig['options']) >= 1
                    && !in_array($configValues[$variableName], $variableConfig['options'])
                ) {
                    throw new \RuntimeException('The value being set for $variableName on the $pixelName pixel is invalid');
                }
                $pixel->addPixelVar($variableName, $configValues[$variableName]);
            } else {
                if (!empty($variableConfig['default'])) {
                    $pixel->addPixelVar($variableName, $variableConfig['default']);
                } else {
                    if ($variableConfig['required']) {
                        throw new \RuntimeException("The $variableName is required for the $pixelName pixel");
                    }
                }
            }
        }

        return $pixel;
    }
}
