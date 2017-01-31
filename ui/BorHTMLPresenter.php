<?php
    namespace ui;

    require_once "../model/Bor.php";

    use \model\Bor as Bor;

    class BorHTMLPresenter {

        private $borArray = [];

        public function __construct($borArray){
            $this->borArray = $borArray;
        }

         public function createTable($cssClass = null, $header = ['Bor neve', 'Típus', 'Palackozva', 'Műveletek']){

            $html = "<table class='$cssClass'>";

            if($header && is_array($header)) {
                $head = "<tr>";
                foreach($header as $column){
                    $head.="<th>$column</th>";
                }

                $head.= "</tr>";

                $html.=$head;
            }

            $tableBody = "";

            foreach($this->borArray as $bor){
            $tableBody.="<tr>";
                $tableBody.="<td>{$bor->getBorNev()}</td>";
                $tableBody.="<td>{$bor->getBorTipus()}</td>";
                $tableBody.="<td>{$bor->getBorPalackozva()}</td>";
                $tableBody.="<td>{$bor->getLink()}</td>";
            $tableBody.="</tr>";
            }

            $html.=$tableBody;
            $html.="</table>";

            return $html;
        }
    }



?>
