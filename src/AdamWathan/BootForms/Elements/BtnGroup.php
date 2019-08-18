<?php

namespace AdamWathan\BootForms\Elements;

use AdamWathan\Form\Elements\Element;
use AdamWathan\Form\Elements\Label;

/**
 * Description of YesNoGroup
 *
 * @author Ceddy
 */
class BtnGroup extends Element
{
    protected $oLabel;
    protected $aList;

    public function __construct(Label $oLabel, array $aList)
    {
        $this->oLabel   = $oLabel;
        $this->aList    = $aList;
        
        $this->addClass('form-group');
    }

    public function render()
    {
        $html = '<div';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->oLabel;
        $html .= '<br />';
        $html .= '<div class="btn-group" data-toggle="buttons">';
        
        foreach ($this->aList as $oLabel)
        {
            $html .= $oLabel;
        }
        
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
