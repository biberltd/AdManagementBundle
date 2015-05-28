<?php
/**
 * @name        AdvertisementPublisher
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
 * @ORM\Table(
 *     name="advertisement_publisher",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_advertisement_publisher_id", columns={"id"})}
 * )
 */
class AdvertisementPublisher extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_ads;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_ads_active;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\Advertisement",
     *     mappedBy="advertisement_publisher"
     * )
     */
    private $advertisements;
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
     * @name                  setCountAds ()
     *                                    Sets the count_ads property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_ads
     *
     * @return          object                $this
     */
    public function setCountAds($count_ads) {
        if(!$this->setModified('count_ads', $count_ads)->isModified()) {
            return $this;
        }
        $this->count_ads = $count_ads;
		return $this;
    }

    /**
     * @name            getCountAds ()
     *                              Returns the value of count_ads property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_ads
     */
    public function getCountAds() {
        return $this->count_ads;
    }

    /**
     * @name                  setCountAdsActive ()
     *                                          Sets the count_ads_active property.
     *                                          Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_ads_active
     *
     * @return          object                $this
     */
    public function setCountAdsActive($count_ads_active) {
        if(!$this->setModified('count_ads_active', $count_ads_active)->isModified()) {
            return $this;
        }
        $this->count_ads_active = $count_ads_active;
		return $this;
    }

    /**
     * @name            getCountAdsActive ()
     *                                    Returns the value of count_ads_active property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_ads_active
     */
    public function getCountAdsActive() {
        return $this->count_ads_active;
    }

    /**
     * @name                  setName ()
     *                                Sets the name property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $name
     *
     * @return          object                $this
     */
    public function setName($name) {
        if(!$this->setModified('name', $name)->isModified()) {
            return $this;
        }
        $this->name = $name;
		return $this;
    }

    /**
     * @name            getName ()
     *                          Returns the value of name property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->name
     */
    public function getName() {
        return $this->name;
    }

}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getAdvertisements()
 * A getCountAds()
 * A getCountAdsActive()
 * A getId()
 * A getName()
 *
 * A setAdvertisements()
 * A setCountAds()
 * A setCountAdsActive()
 * A setName()
 *
 */