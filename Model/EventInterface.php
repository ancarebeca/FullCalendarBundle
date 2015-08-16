<?php

namespace AncaRebeca\FullCalendarBundle\Model;

interface EventInterface
{
    /**
     * @param string $title
     * @param \DateTime $start
     */
    public function __construct($title, \DateTime $start);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return boolean
     */
    public function isAllDay();

    /**
     * @param boolean $allDay
     */
    public function setAllDay($allDay);

    /**
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * @param \DateTime $start
     */
    public function setStartDate(\DateTime $start);

    /**
     * @return \DateTime
     */
    public function getEndDate();

    /**
     * @param \DateTime $end
     */
    public function setEndDate(\DateTime $end);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     */
    public function setUrl($url);

    /**
     * @return string
     */
    public function getClassName();

    /**
     * @param string $className
     */
    public function setClassName($className);

    /**
     * @return boolean
     */
    public function isEditable();

    /**
     * @param boolean $editable
     */
    public function setEditable($editable);

    /**
     * @return boolean
     */
    public function isStartEditable();

    /**
     * @param boolean $startEditable
     */
    public function setStartEditable($startEditable);

    /**
     * @return boolean
     */
    public function isDurationEditable();

    /**
     * @param boolean $durationEditable
     */
    public function setDurationEditable($durationEditable);

    /**
     * @return string
     */
    public function getRendering();

    /**
     * @param string $rendering
     */
    public function setRendering($rendering);

    /**
     * @return boolean
     */
    public function isOverlap();

    /**
     * @param boolean $overlap
     */
    public function setOverlap($overlap);

    /**
     * @return int
     */
    public function getConstraint();

    /**
     * @param int $constraint
     */
    public function setConstraint($constraint);

    /**
     * @return string
     */
    public function getSource();

    /**
     * @param string $source
     */
    public function setSource($source);

    /**
     * @return string
     */
    public function getColor();

    /**
     * @param string $color
     */
    public function setColor($color);

    /**
     * @return string
     */
    public function getBackgroundColor();

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor($backgroundColor);

    /**
     * @return string
     */
    public function getTextColor();

    /**
     * @param string $textColor
     */
    public function setTextColor($textColor);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function setCustomField($name, $value);

    /**
     * @param $name
     *
     * @return mixed
     */
    public function getCustomFieldValue($name);

    /**
     * @return mixed
     */
    public function getCustomFields();

    /**
     * @param $name
     *
     * @return mixed
     */
    public function removeCustomField($name);
}