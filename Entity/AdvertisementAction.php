<?php
/**
 * @name        AdvertisementAction
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
use BiberLtd\Core\CoreEntity;
/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="advertisement_action",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_advertisement_action_id", columns={"id"})}
 * )
 */
class AdvertisementAction extends  CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=15)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $action;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", onDelete="SET NULL")
     */
    private $member;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\LogBundle\Entity\Session")
     * @ORM\JoinColumn(name="session", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $session;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Core\Bundles\AdManagementBundle\Entity\Advertisement",
     *     inversedBy="advertisement_actions"
     * )
     * @ORM\JoinColumn(name="advertisement", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $advertisement;
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
     * @name                  setAction ()
     *                                  Sets the action property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $action
     *
     * @return          object                $this
     */
    public function setAction($action) {
        if(!$this->setModified('action', $action)->isModified()) {
            return $this;
        }
        $this->action = $action;
		return $this;
    }

    /**
     * @name            getAction ()
     *                            Returns the value of action property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->action
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @name                  setAdvertisement ()
     *                                         Sets the advertisement property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $advertisement
     *
     * @return          object                $this
     */
    public function setAdvertisement($advertisement) {
        if(!$this->setModified('advertisement', $advertisement)->isModified()) {
            return $this;
        }
        $this->advertisement = $advertisement;
		return $this;
    }

    /**
     * @name            getAdvertisement ()
     *                                   Returns the value of advertisement property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->advertisement
     */
    public function getAdvertisement() {
        return $this->advertisement;
    }

    /**
     * @name                  setMember ()
     *                                  Sets the member property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $member
     *
     * @return          object                $this
     */
    public function setMember($member) {
        if(!$this->setModified('member', $member)->isModified()) {
            return $this;
        }
        $this->member = $member;
		return $this;
    }

    /**
     * @name            getMember ()
     *                            Returns the value of member property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->member
     */
    public function getMember() {
        return $this->member;
    }

    /**
     * @name                  setSession ()
     *                                   Sets the session property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $session
     *
     * @return          object                $this
     */
    public function setSession($session) {
        if(!$this->setModified('session', $session)->isModified()) {
            return $this;
        }
        $this->session = $session;
		return $this;
    }

    /**
     * @name            getSession ()
     *                             Returns the value of session property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->session
     */
    public function getSession() {
        return $this->session;
    }

}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getAction()
 * A getAdvertisement()
 * A getId()
 * A getMember()
 * A getSession()
 *
 * A set_adction()
 * A setAdvertisement()
 * A setMember()
 * A setSession()
 *
 */