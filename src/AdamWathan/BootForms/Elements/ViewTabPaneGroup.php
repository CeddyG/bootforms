<?php

namespace AdamWathan\BootForms\Elements;

use Illuminate\Support\Str;
use AdamWathan\Form\Elements\Element;

/**
 * Description of viewTabPaneGroup
 *
 * @author Ceddy
 */
class ViewTabPaneGroup extends Element
{
    protected $sView    = '';
    protected $aTab     = [];
    protected $sId      = '';
    
    public function __construct($sView, $aTab)
    {
        $this->sView    = $sView;
        $this->aTab     = $aTab;
        $this->sId      = Str::random(10);
        
        $this->addClass('nav-tabs-custom');
    }

    public function render()
    {
        $sNav       = '';
        $sContent   = '';
        $bFirstIter = true;
        foreach ($this->aTab as $iIdTab => $sNameTab)
        {
            $sNav       .= $this->buildNav($iIdTab, $sNameTab, $bFirstIter);
            $sContent   .= $this->buildContent($iIdTab, $bFirstIter);
            
            if ($bFirstIter)
            {
                $bFirstIter = false;
            }
        }
        
        $html = '<div';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->wrapNav($sNav);
        $html .= $this->wrapContent($sContent);
        $html .= '</div>';

        return $html;
    }
    
    protected function buildNav($iIdTab, $sNameTab, $bFirstIter)
    {
        $sClass = $bFirstIter ? 'active' : '';
        return '<li class="'.$sClass.'"><a href="#'.$this->sId.'-'.$iIdTab.'" data-toggle="tab" aria-expanded="true">'.$sNameTab.'</a></li>';
    }
    
    protected function buildContent($iIdTab, $bFirstIter)
    {
        $sClass = $bFirstIter ? ' active' : '';
        return '<div id="'.$this->sId.'-'.$iIdTab.'" class="tab-pane'.$sClass.'">'.view($this->sView, ['iIdView' => $iIdTab]).'</div>';
    }
    
    protected function wrapNav($sText)
    {
        return '<ul class="nav nav-tabs">'.$sText.'</ul>';
    }
    
    protected function wrapContent($sText)
    {
        return '<div class="tab-content">'.$sText.'</div>';
    }
}
