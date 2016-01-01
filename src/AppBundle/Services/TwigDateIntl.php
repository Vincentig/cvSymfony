<?php

namespace AppBundle\Services;

/**
 * Description of Extrait
 *
 * @author hb
 */
class TwigDateIntl extends \Twig_Extension {





    public function dateIntlFunction(\Datetime $datetime, $lang = 'de_DE', $pattern = 'd. MMMM Y')
    {
        $formatter = new \IntlDateFormatter($lang, \IntlDateFormatter::LONG, \IntlDateFormatter::LONG);
        $formatter->setPattern($pattern);
        return $formatter->format($datetime);
    }


    /*
     * Retourne le nom de la classe
     */

    public function getName() {
        return 'TwigDateIntl';
    }

    /*
     * retourne un tableau avec le nom comment va s'appeler la fouction dans twig.
     */

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('dateIntl', array($this, 'dateIntlFunction'))
        );

    }

}
