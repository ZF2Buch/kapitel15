<?php
/**
 * ZF2 Buch Kapitel 15
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Application\Filter;

use Zend\Filter\AbstractFilter;
use \HTMLPurifier;
use \HTMLPurifier_Bootstrap;
use \HTMLPurifier_Config;

/**
 * String HtmlPurifier filter
 * 
 * Filters text with HTMLPurifier
 * 
 * @package    Application
 */
class StringHtmlPurifier extends AbstractFilter
{
    /**
     * HTMLPurifier instance
     *
     * @var \HTMLPurifier
     */
    protected $htmlPurifer = null;

    /**
     * Setup for HTMLPurifier
     *
     * @param  string $delimiter
     * @return void
     */
    public function __construct()
    {
        if (!class_exists('HTMLPurifier_Bootstrap', false)) {
            spl_autoload_register(array('HTMLPurifier_Bootstrap', 'autoload'));
        }
        $config = HTMLPurifier_Config::createDefault();
        $config->set(
            'Cache.SerializerPath', LUIGI_ROOT . '/data/htmlpurifier'
        );
        $def = $config->getHTMLDefinition(true);
        $this->htmlPurifer = new HTMLPurifier($config);
    }
 
    /**
     * Filter the text
     *
     * @param  string $value
     * @return string
     */
    public function filter($value)
    {
        return $this->htmlPurifer->purify($value);
    }
}
