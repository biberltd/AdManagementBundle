<?php
/**
 * @name        AdvertisementSize
 * @package		BiberLtd\Core\AdManagementBundle
 *
 * @author		Murat Ünal
 *
 * @version     1.0.0
 * @date        20.09.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Core\Bundles\AdManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Bundle\CoreBundle\CoreEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="advertisement_size", options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"})
 */
class AdvertisementSize extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=5)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $width;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $height;

    /** 
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $price_per_view;

    /** 
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $price_per_click;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\Advertisement",
     *     mappedBy="advertisement_size"
     * )
     */
    private $advertisements;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\AdvertisementSizeLocalization",
     *     mappedBy="advertisement_size"
     * )
     */
    protected $localizations;

    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

    /**
     * @name            getId()
     *  				Gets $id property.
     * .
     * @author          Murat Ünal
     * @since			1.0.0
     * @version         1.0.0
     *
     * @return          string          $this->id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @name                  setAdvertisements ()
     *                                          Sets the advertisements property.
     *                                          Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $advertisements
     *
     * @return          object                $this
     */
    public function setAdvertisements($advertisements) {
        if(!$this->setModified('advertisements', $advertisements)->isModified()) {
            return $this;
        }
        $this->advertisements = $advertisements;
		return $this;
    }

    /**
     * @name            getAdvertisements ()
     *                                    Returns the value of advertisements property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->advertisements
     */
    public function getAdvertisements() {
        return $this->advertisements;
    }

    /**
     * @name                  setHeight ()
     *                                  Sets the height property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $height
     *
     * @return          object                $this
     */
    public function setHeight($height) {
        if(!$this->setModified('height', $height)->isModified()) {
            return $this;
        }
        $this->height = $height;
		return $this;
    }

    /**
     * @name            getHeight ()
     *                            Returns the value of height property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->height
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @name                  setPricePerClick ()
     *                                         Sets the price_per_click property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $price_per_click
     *
     * @return          object                $this
     */
    public function setPricePerClick($price_per_click) {
        if(!$this->setModified('price_per_click', $price_per_click)->isModified()) {
            return $this;
        }
        $this->price_per_click = $price_per_click;
		return $this;
    }

    /**
     * @name            getPricePerClick ()
     *                                   Returns the value of price_per_click property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->price_per_click
     */
    public function getPricePerClick() {
        return $this->price_per_click;
    }

    /**
     * @name                  setPricePerView ()
     *                                        Sets the price_per_view property.
     *                                        Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $price_per_view
     *
     * @return          object                $this
     */
    public function setPricePerView($price_per_view) {
        if(!$this->setModified('price_per_view', $price_per_view)->isModified()) {
            return $this;
        }
        $this->price_per_view = $price_per_view;
		return $this;
    }

    /**
     * @name            getPricePerView ()
     *                                  Returns the value of price_per_view property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->price_per_view
     */
    public function getPricePerView() {
        return $this->price_per_view;
    }

    /**
     * @name                  setWidth ()
     *                                 Sets the width property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $width
     *
     * @return          object                $this
     */
    public function setWidth($width) {
        if(!$this->setModified('width', $width)->isModified()) {
            return $this;
        }
        $this->width = $width;
		return $this;
    }

    /**
     * @name            getWidth ()
     *                           Returns the value of width property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->width
     */
    public function getWidth() {
        return $this->width;
    }

}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getLocalizations()
 * A getAdvertisements()
 * A getHeight()
 * A getId()
 * A getPricePerClick()
 * A getPricePerView()
 * A getWidth()
 *
 * A setLocalizations()
 * A setAdvertisements()
 * A setHeight()
 * A setPricePerClick()
 * A setWidth()
 *
 */