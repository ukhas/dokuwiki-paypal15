<?php
/**
 * paypal button for ukhas15
 */

if(!defined('DOKU_INC')) die();

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_paypal15 extends DokuWiki_Syntax_Plugin {
    function getType(){ return 'substition'; }
    function getSort(){ return 999; }

    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<PAYPAL15>', $mode, 'plugin_paypal15');
    }

    function handle($match, $state, $pos, &$handler){
        return array();
    }

    function render($mode, &$renderer, $data) {
        if($mode == 'xhtml'){
            $renderer->doc .= "
            <form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
                <input type='hidden' name='cmd' value='_s-xclick'>
                <input type='hidden' name='hosted_button_id' value='EFG7FVYXTPP4C'>
                <table>
                <tr><td>
                    <input type='hidden' name='on0' value='Conference Ticket'>Conference Ticket
                </td></tr>
                <tr><td>
                    <select name='os0'>
                    <option value='Full Ticket'>Full Ticket £30.00 GBP</option>
                    <option value='Student Concessionary ticket'>Student Concessionary ticket £20.00 GBP</option>
                    </select>
                </td></tr>
                </table>
                <input type='hidden' name='currency_code' value='GBP'>
                <input type='image' src='https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal'>
            </form>          
            ";
            return true;
        }
        return false;
    }
}
