<?php

namespace AdamWathan\BootForms\Elements;

use AdamWathan\Form\Elements\Element;
use AdamWathan\Form\Elements\Label;

/**
 * Description of YesNoGroup
 *
 * @author Ceddy
 */
class YesNoGroup extends Element
{
    protected $oLabel;
    protected $oLabelYes;
    protected $oLabelNo;

    public function __construct(Label $oLabel, Label $oLabelYes, Label $oLabelNo)
    {
        $this->oLabel       = $oLabel;
        $this->oLabelYes    = $oLabelYes;
        $this->oLabelNo     = $oLabelNo;
        
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
        $html .= $this->oLabelYes;
        $html .= $this->oLabelNo;
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
