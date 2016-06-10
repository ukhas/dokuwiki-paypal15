<?php
/**
 * paypal button for ukhas16
 */

if(!defined('DOKU_INC')) die();

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_paypal16 extends DokuWiki_Syntax_Plugin {
    function getType(){ return 'substition'; }
    function getSort(){ return 999; }

    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<PAYPAL16>', $mode, 'plugin_paypal16');
    }

    function handle($match, $state, $pos, &$handler){
        return array();
    }

    function render($mode, &$renderer, $data) {
        if($mode == 'xhtml'){
            $renderer->doc .= "
            <form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
              <input type='hidden' name='cmd' value='_s-xclick'>
              <input type='hidden' name='hosted_button_id' value='57GPACN4QL4TS'>
              <input type='hidden' name='currency_code' value='GBP'>
              <input type='image' src='https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal – The safer, easier way to pay online!'>
            </form>
            ";
            return true;
        }
        return false;
    }
}
