<?php
/**
 * @name        Advertisement
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
 *     name="advertisement",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={
 *         @ORM\Index(name="idx_u_advertisement_url_key", columns={"url_key","site"}),
 *         @ORM\Index(name="idx_n_advertisement_date_created", columns={"date_created"}),
 *         @ORM\Index(name="idx_n_advertisement_date_published", columns={"date_published"}),
 *         @ORM\Index(name="idx_n_advertisement_date_unpublished", columns={"date_unpublished"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_advertisement_id", columns={"id"})}
 * )
 */
class Advertisement extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=155, nullable=false)
     */
    private $title;

    /** 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_key;

    /** 
     * @ORM\Column(type="text", nullable=false)
     */
    private $content;

    /** 
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $type;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_created;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_published;

    /** 
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_unpublished;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_view;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_view_u;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_click;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_click_u;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $max_view;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $max_view_u;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $max_click;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $max_click_u;

    /** 
     * @ORM\Column(type="decimal", length=2, nullable=false)
     */
    private $priority;

    /** 
     * @ORM\Column(type="decimal", length=7, nullable=false)
     */
    private $cost_max;

    /** 
     * @ORM\Column(type="decimal", length=7, nullable=false)
     */
    private $cost_total;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\AdvertisementAction",
     *     mappedBy="advertisement"
     * )
     */
    private $advertisement_actions;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\MultiLanguageSupportBundle\Entity\Language")
     * @ORM\JoinColumn(name="language", referencedColumnName="id", nullable=false)
     */
    private $language;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\SiteManagementBundle\Entity\Site")
     * @ORM\JoinColumn(name="site", referencedColumnName="id")
     */
    private $site;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\AdvertisementSize",
     *     inversedBy="advertisements"
     * )
     * @ORM\JoinColumn(name="size", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $advertisement_size;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Bundle\AdManagementBundle\Entity\AdvertisementPublisher",
     *     inversedBy="advertisements"
     * )
     * @ORM\JoinColumn(name="publisher", referencedColumnName="id", nullable=false, onDelete="RESTRICT")
     */
    private $advertisement_publisher;
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
     * @name                  setDatePublished ()
     *                                         Sets the date_published property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_published
     *
     * @return          object                $this
     */
    public function setDatePublished($date_published) {
        if(!$this->setModified('date_published', $date_published)->isModified()) {
            return $this;
        }
        $this->date_published = $date_published;
		return $this;
    }

    /**
     * @name            getDatePublished ()
     *                                   Returns the value of date_published property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_published
     */
    public function getDatePublished() {
        return $this->date_published;
    }

    /**
     * @name                  setAdvertisementActions ()
     *                                                Sets the advertisement_actions property.
     *                                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $advertisement_actions
     *
     * @return          object                $this
     */
    public function setAdvertisementActions($advertisement_actions) {
        if(!$this->setModified('advertisement_actions', $advertisement_actions)->isModified()) {
            return $this;
        }
        $this->advertisement_actions = $advertisement_actions;
		return $this;
    }

    /**
     * @name            getAdvertisementActions ()
     *                                          Returns the value of advertisement_actions property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->advertisement_actions
     */
    public function getAdvertisementActions() {
        return $this->advertisement_actions;
    }

    /**
     * @name                  setAdvertisementPublisher ()
     *                                                  Sets the advertisement_publisher property.
     *                                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $advertisement_publisher
     *
     * @return          object                $this
     */
    public function setAdvertisementPublisher($advertisement_publisher) {
        if(!$this->setModified('advertisement_publisher', $advertisement_publisher)->isModified()) {
            return $this;
        }
        $this->advertisement_publisher = $advertisement_publisher;
		return $this;
    }

    /**
     * @name            getAdvertisementPublisher ()
     *                                            Returns the value of advertisement_publisher property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->advertisement_publisher
     */
    public function getAdvertisementPublisher() {
        return $this->advertisement_publisher;
    }

    /**
     * @name                  setAdvertisementSize ()
     *                                             Sets the advertisement_size property.
     *                                             Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $advertisement_size
     *
     * @return          object                $this
     */
    public function setAdvertisementSize($advertisement_size) {
        if(!$this->setModified('advertisement_size', $advertisement_size)->isModified()) {
            return $this;
        }
        $this->advertisement_size = $advertisement_size;
		return $this;
    }

    /**
     * @name            getAdvertisementSize ()
     *                                       Returns the value of advertisement_size property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->advertisement_size
     */
    public function getAdvertisementSize() {
        return $this->advertisement_size;
    }

    /**
     * @name                  setContent ()
     *                                   Sets the content property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $content
     *
     * @return          object                $this
     */
    public function setContent($content) {
        if(!$this->setModified('content', $content)->isModified()) {
            return $this;
        }
        $this->content = $content;
		return $this;
    }

    /**
     * @name            getContent ()
     *                             Returns the value of content property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->content
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @name                  setCostMax ()
     *                                   Sets the cost_max property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $cost_max
     *
     * @return          object                $this
     */
    public function setCostMax($cost_max) {
        if(!$this->setModified('cost_max', $cost_max)->isModified()) {
            return $this;
        }
        $this->cost_max = $cost_max;
		return $this;
    }

    /**
     * @name            getCostMax ()
     *                             Returns the value of cost_max property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->cost_max
     */
    public function getCostMax() {
        return $this->cost_max;
    }

    /**
     * @name                  setCostTotal ()
     *                                     Sets the cost_total property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $cost_total
     *
     * @return          object                $this
     */
    public function setCostTotal($cost_total) {
        if(!$this->setModified('cost_total', $cost_total)->isModified()) {
            return $this;
        }
        $this->cost_total = $cost_total;
		return $this;
    }

    /**
     * @name            getCostTotal ()
     *                               Returns the value of cost_total property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->cost_total
     */
    public function getCostTotal() {
        return $this->cost_total;
    }

    /**
     * @name                  setCountClick ()
     *                                      Sets the count_click property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_click
     *
     * @return          object                $this
     */
    public function setCountClick($count_click) {
        if(!$this->setModified('count_click', $count_click)->isModified()) {
            return $this;
        }
        $this->count_click = $count_click;
		return $this;
    }

    /**
     * @name            getCountClick ()
     *                                Returns the value of count_click property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_click
     */
    public function getCountClick() {
        return $this->count_click;
    }

    /**
     * @name                  setCountClickU ()
     *                                       Sets the count_click_u property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_click_u
     *
     * @return          object                $this
     */
    public function setCountClickU($count_click_u) {
        if(!$this->setModified('count_click_u', $count_click_u)->isModified()) {
            return $this;
        }
        $this->count_click_u = $count_click_u;
		return $this;
    }

    /**
     * @name            getCountClickU ()
     *                                 Returns the value of count_click_u property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_click_u
     */
    public function getCountClickU() {
        return $this->count_click_u;
    }

    /**
     * @name                  setCountView ()
     *                                     Sets the count_view property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_view
     *
     * @return          object                $this
     */
    public function setCountView($count_view) {
        if(!$this->setModified('count_view', $count_view)->isModified()) {
            return $this;
        }
        $this->count_view = $count_view;
		return $this;
    }

    /**
     * @name            getCountView ()
     *                               Returns the value of count_view property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_view
     */
    public function getCountView() {
        return $this->count_view;
    }

    /**
     * @name                  setCountViewU ()
     *                                      Sets the count_view_u property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_view_u
     *
     * @return          object                $this
     */
    public function setCountViewU($count_view_u) {
        if(!$this->setModified('count_view_u', $count_view_u)->isModified()) {
            return $this;
        }
        $this->count_view_u = $count_view_u;
		return $this;
    }

    /**
     * @name            getCountViewU ()
     *                                Returns the value of count_view_u property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_view_u
     */
    public function getCountViewU() {
        return $this->count_view_u;
    }

    /**
     * @name                  setDateCreated ()
     *                                       Sets the date_created property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_created
     *
     * @return          object                $this
     */
    public function setDateCreated($date_created) {
        if(!$this->setModified('date_created', $date_created)->isModified()) {
            return $this;
        }
        $this->date_created = $date_created;
		return $this;
    }

    /**
     * @name            getDateCreated ()
     *                                 Returns the value of date_created property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_created
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * @name                  setDateUnpublished ()
     *                                           Sets the date_unpublished property.
     *                                           Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_unpublished
     *
     * @return          object                $this
     */
    public function setDateUnpublished($date_unpublished) {
        if(!$this->setModified('date_unpublished', $date_unpublished)->isModified()) {
            return $this;
        }
        $this->date_unpublished = $date_unpublished;
		return $this;
    }

    /**
     * @name            getDateUnpublished ()
     *                                     Returns the value of date_unpublished property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_unpublished
     */
    public function getDateUnpublished() {
        return $this->date_unpublished;
    }

    /**
     * @name                  setLanguage ()
     *                                    Sets the language property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $language
     *
     * @return          object                $this
     */
    public function setLanguage($language) {
        if(!$this->setModified('language', $language)->isModified()) {
            return $this;
        }
        $this->language = $language;
		return $this;
    }

    /**
     * @name            getLanguage ()
     *                              Returns the value of language property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->language
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @name                  setMaxClick ()
     *                                    Sets the max_click property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $max_click
     *
     * @return          object                $this
     */
    public function setMaxClick($max_click) {
        if(!$this->setModified('max_click', $max_click)->isModified()) {
            return $this;
        }
        $this->max_click = $max_click;
		return $this;
    }

    /**
     * @name            getMaxClick ()
     *                              Returns the value of max_click property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->max_click
     */
    public function getMaxClick() {
        return $this->max_click;
    }

    /**
     * @name                  setMaxClickU ()
     *                                     Sets the max_click_u property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $max_click_u
     *
     * @return          object                $this
     */
    public function setMaxClickU($max_click_u) {
        if(!$this->setModified('max_click_u', $max_click_u)->isModified()) {
            return $this;
        }
        $this->max_click_u = $max_click_u;
		return $this;
    }

    /**
     * @name            getMaxClickU ()
     *                               Returns the value of max_click_u property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->max_click_u
     */
    public function getMaxClickU() {
        return $this->max_click_u;
    }

    /**
     * @name                  setMaxView ()
     *                                   Sets the max_view property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $max_view
     *
     * @return          object                $this
     */
    public function setMaxView($max_view) {
        if(!$this->setModified('max_view', $max_view)->isModified()) {
            return $this;
        }
        $this->max_view = $max_view;
		return $this;
    }

    /**
     * @name            getMaxView ()
     *                             Returns the value of max_view property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->max_view
     */
    public function getMaxView() {
        return $this->max_view;
    }

    /**
     * @name                  setMaxViewU ()
     *                                    Sets the max_view_u property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $max_view_u
     *
     * @return          object                $this
     */
    public function setMaxViewU($max_view_u) {
        if(!$this->setModified('max_view_u', $max_view_u)->isModified()) {
            return $this;
        }
        $this->max_view_u = $max_view_u;
		return $this;
    }

    /**
     * @name            getMaxViewU ()
     *                              Returns the value of max_view_u property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->max_view_u
     */
    public function getMaxViewU() {
        return $this->max_view_u;
    }

    /**
     * @name                  setPriority ()
     *                                    Sets the priority property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $priority
     *
     * @return          object                $this
     */
    public function setPriority($priority) {
        if(!$this->setModified('priority', $priority)->isModified()) {
            return $this;
        }
        $this->priority = $priority;
		return $this;
    }

    /**
     * @name            getPriority ()
     *                              Returns the value of priority property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->priority
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * @name                  setSite ()
     *                                Sets the site property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $site
     *
     * @return          object                $this
     */
    public function setSite($site) {
        if(!$this->setModified('site', $site)->isModified()) {
            return $this;
        }
        $this->site = $site;
		return $this;
    }

    /**
     * @name            getSite ()
     *                          Returns the value of site property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->site
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * @name                  setTitle ()
     *                                 Sets the title property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $title
     *
     * @return          object                $this
     */
    public function setTitle($title) {
        if(!$this->setModified('title', $title)->isModified()) {
            return $this;
        }
        $this->title = $title;
		return $this;
    }

    /**
     * @name            getTitle ()
     *                           Returns the value of title property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @name                  setType ()
     *                                Sets the type property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $type
     *
     * @return          object                $this
     */
    public function setType($type) {
        if(!$this->setModified('type', $type)->isModified()) {
            return $this;
        }
        $this->type = $type;
		return $this;
    }

    /**
     * @name            getType ()
     *                          Returns the value of type property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @name                  setUrlKey ()
     *                                  Sets the url_key property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $url_key
     *
     * @return          object                $this
     */
    public function setUrlKey($url_key) {
        if(!$this->setModified('url_key', $url_key)->isModified()) {
            return $this;
        }
        $this->url_key = $url_key;
		return $this;
    }

    /**
     * @name            getUrlKey ()
     *                            Returns the value of url_key property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->url_key
     */
    public function getUrlKey() {
        return $this->url_key;
    }


}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getAdvertisementActions()
 * A getAdvertisementPublisher()
 * A getAdvertisementSize()
 * A getContent()
 * A getCostMax()
 * A getCostTotal()
 * A getCountClick()
 * A getCountClickU()
 * A getCountView()
 * A getCountViewU()
 * A getDateCreated()
 * A getDatePublished()
 * A get_unpublished()
 * A getId()
 * A getLanguage()
 * A getMaxClick()
 * A getMaxClickU()
 * A getMaxView()
 * A getMaxViewU()
 * A getPriority()
 * A getSite()
 * A getTitle()
 * A getType()
 * A getUrlKey()
 *
 * A setAdvertisementActions()
 * A setAdvertisementPublisher()
 * A setAdvertisementSize()
 * A setContent()
 * A setCostMax()
 * A setCostTotal()
 * A setCostTotal()
 * A setCountClick()
 * A setCountClickU()
 * A setCountView()
 * A setCountViewU()
 * A setDateCreated()
 * A setDatePublished()
 * A set_unpublished()
 * A setLanguage()
 * A setMaxClick()
 * A setMaxClickU()
 * A setMaxView()
 * A setMaxViewU()
 * A setPriority()
 * A setSite()
 * A setTitle()
 * A setType()
 * A setUrlKey()
 *
 */