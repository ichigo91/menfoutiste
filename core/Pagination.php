<?php
class Pagination{

	public $controller;

	public function __construct($controller){
		$this->controller = $controller;
	}

	public function pagination($current,$total){

		$html = '<nav aria-label="..."><ul class="pagination justify-content-center"><li class="page-item';
		if($current == 1){
			$html .= ' disabled';
		}
		$html .= '"><a class="page-link" href="';
		if($current!=1){
			$prev = $current - 1;
			$html .= '?page='.$prev;
		}
		$html .= '" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
		for($i=1; $i <= $total; $i++){
			$html .= '<li class="page-item';
			if($i == $current){
				$html .= ' active';
			}
			$html .= '"><a class="page-link" href="?page='.$i.'">'.$i;
			if($i == $current){
				$html .= '<span class="sr-only">(current)</span>';
			}
			$html .= '</a></li>';
		}
		$html .= '<li class="page-item';
		if($current == $total){
			$html .= ' disabled';
		}
		$html .= '"><a class="page-link" href="';
		if($current!=$total){
			$next = $current + 1;
			$html .= '?page='.$next;
		}
		$html .= '" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li></ul></nav>';

		return $html;
	}
}
?>